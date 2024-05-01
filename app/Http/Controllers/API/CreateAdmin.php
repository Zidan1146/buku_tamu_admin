<?php

namespace App\Http\Controllers\API;

use App\Models\Admin;
use App\Models\Log as LogModel;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CreateAdmin extends Controller
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

            LogModel::create([
                'ip' => $request->ip(),
                'tag' => 'INFO',
                'message' => 'New admin created'
            ]);

            return redirect('login');
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
