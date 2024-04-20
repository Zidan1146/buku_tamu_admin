<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAction extends \App\Http\Controllers\Controller
{
    public function __invoke(Request $request) {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $credentials = $request->only("username","password");

        if(!Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors(["error" => "username or password are invalid"]);
        }

        $request->session()->regenerate();

        return redirect('/admin')->with('success', 'Login Successful');
    }
}
