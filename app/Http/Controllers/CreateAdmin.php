<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CreateAdmin extends Controller
{
    public function __invoke() {
        $faker = Faker::Create();
        $randomId = Str::random(3);

        $existingAdmin = null;
        $newUsername = "RPL_$randomId";
        $newPassword = $faker->password(8, 16);

        if(Admin::count() > 0) $existingAdmin = Admin::first();

        return view('login.create-admin', compact('existingAdmin', 'newUsername', 'newPassword'));
    }
}
