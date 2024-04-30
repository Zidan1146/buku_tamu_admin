<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class RootAuthCheck extends Controller
{
    public function __invoke() {
        try {
            if(auth("admin")->check()) {
                return redirect('/admin');
            }

            Admin::first()->update(['status' => 'inactive']);
            return redirect('/login');
        } catch (\Throwable $th) {

            $errorMessage = "
                {$th->getMessage()}\n
                On File: {$th->getFile()}\n
                At Line: {$th->getLine()}\n
                Stack Trace:\n
                {$th->getTraceAsString()}";

            Log::error($errorMessage);

            // Please show the error message to the user
            return redirect('/login')->with('error', $th->getMessage());
        }
    }
}
