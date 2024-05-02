<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CreateAdmin extends Controller
{
    public function __invoke(Request $request) {
        // if(!$request->ip()) {
        //     return redirect()->route('login')->with('error', 'You are not allowed to create admin account');
        // }

        // if(Admin::count() > 0) {
        //     $isIpMatch = Admin::where('ip', $request->ip())->exists();

        //     if(!$isIpMatch) {
        //         return redirect()->route('login')->with('error', 'You are not allowed to create admin account.');
        //     }
        // }

        $faker = Faker::Create();
        $randomId = Str::random(3);

        $existingAdmin = null;
        $newUsername = "RPL_$randomId";
        $newPassword = $faker->password(8, 16);

        if(Admin::count() > 0) $existingAdmin = Admin::first();

        return view('login.create-admin', compact('existingAdmin', 'newUsername', 'newPassword'));
    }
}
