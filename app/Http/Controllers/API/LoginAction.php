<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class LoginAction extends Controller
{
    public function __invoke(Request $request) {
        try {
            $request->validate([
                "username" => "required",
                "password" => "required"
            ]);

            $credentials = $request->only("username","password");
            $canAttempt = RateLimiter::attempt(
                "username:{$request->username}",
                5,
                function () use ($credentials) {
                    return Auth::guard('admin')->attempt($credentials);
                },
                decaySeconds: 300
            );

            if(!$canAttempt) {
                return back()->withErrors(["error" => "Too many attempts"]);
            }

            if(!Auth::guard('admin')->attempt($credentials)) {
                return back()->withErrors(["error" => "username or password are invalid"]);
            }

            $request->session()->regenerate();

            return redirect('/admin')->with('success', 'Login Successful');
        } catch (\Throwable $th) {
            $errorMessage = "
                {$th->getMessage()}\n
                On File: {$th->getFile()}\n
                At Line: {$th->getLine()}\n
                Stack Trace:\n
                {$th->getTraceAsString()}";

            Log::error($errorMessage);

            // Please show this error in the frontend
            return back()->with('error', $th->getMessage());
        }
    }
}
