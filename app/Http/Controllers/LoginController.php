<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Log as LogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function __invoke(Request $request){
        try {
            LogModel::create([
                'ip' => $request->ip(),
                'tag' => 'INFO',
                'message' => 'Accessed the website'
            ]);

            if(auth('admin')->check()) {
                return redirect('/admin');
            }

            Admin::first()->update(['status' => 'inactive']);
            return view('login.login');
        } catch (\Throwable $th) {
            $errorMessage = "
                {$th->getMessage()}\n
                On File: {$th->getFile()}\n
                At Line: {$th->getLine()}\n
                Stack Trace:\n
                {$th->getTraceAsString()}";

            Log::error($errorMessage);

            // Please show the error message to the user
            return view('login.login', ['error' => $errorMessage]);
        }
    }
}
