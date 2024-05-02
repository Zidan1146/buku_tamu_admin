<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use App\Models\Log as LogModel;

class LoginAction extends Controller
{
    public function __invoke(Request $request) {
        try {

            LogModel::create([
                'ip' => $request->ip(),
                'tag' => 'INFO',
                'message' => 'Attempt To login'
            ]);

            // if(!$request->ip()) {
            //     return redirect()->route('login')->with('error', 'You are not allowed logged in, unauthorized.');
            // }

            // if(Admin::count() > 0) {
            //     $isIpMatch = Admin::where('ip', $request->ip())->exists();

            //     if(!$isIpMatch) {
            //         return redirect()->route('login')->with('error', 'You are not allowed logged in, unauthorized.');
            //     }
            // }
            $request->validate([
                "username" => "required",
                "password" => "required"
            ]);

            $credentials = $request->only("username","password");

            if(!Auth::guard('admin')->attempt($credentials)) {
                return back()->with(["error" => "username or password are invalid"]);
            }
            $admin = Admin::where('username', '=', $request->username)->get();

            Admin::first()->update(['status' => 'active']);
            Auth::guard('admin')->login($admin[0]);

            LogModel::create([
                'ip' => $request->ip(),
                'tag' => 'INFO',
                'message' => 'Logged in'
            ]);

            return redirect('/admin')->with('success', 'Login Successful');
        } catch (\Throwable $th) {
            $errorMessage = "
                {$th->getMessage()}\n
                On File: {$th->getFile()}\n
                At Line: {$th->getLine()}\n
                Stack Trace:\n
                {$th->getTraceAsString()}";

            LogModel::create([
                'ip' => $request->ip(),
                'tag' => 'ERROR',
                'message' => $th->getMessage()
            ]);

            Log::error($errorMessage);

            // Please show this error in the frontend
            return back()->with('error', $th->getMessage());
        }
    }
}
