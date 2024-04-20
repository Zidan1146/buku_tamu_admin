<?php

namespace App\Http\Controllers\API;

use App\Models\Admin;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CreateAdmin extends \App\Http\Controllers\Controller
{
    public function __invoke(Request $request) {
        try {
            Admin::truncate();

            Admin::create([
                'uuid' => Uuid::uuid4()->toString(),
                'ip' => $request->ip(),
                'username' => $request->input('data-username'),
                'password' => bcrypt($request->input('data-password')),
            ]);

            return redirect('login');
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with('error', $th->getMessage());
        }
    }
}
