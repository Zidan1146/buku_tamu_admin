<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log as LogModel;

class LogoutAction extends Controller
{
    public function __invoke(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        Admin::first()->update(['status' => 'inactive']);
        LogModel::create([
            'ip' => $request->ip(),
            'tag' => 'INFO',
            'message' => 'Admin Logged out'
        ]);
        return redirect(route("login"));
    }
}
