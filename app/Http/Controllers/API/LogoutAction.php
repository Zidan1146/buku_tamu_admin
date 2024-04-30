<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogoutAction extends Controller
{
    public function __invoke(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        Admin::first()->update(['status' => 'inactive']);
        return redirect(route("login"));
    }
}
