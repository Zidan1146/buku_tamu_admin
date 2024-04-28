<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Carbon\Carbon;
use App\Models\Log as LogModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $yesterday = Carbon::yesterday();
        $today = Carbon::today();

        $yesterdayGuestCount = Guest::whereDate('created_at', '=', $yesterday)->count();
        $todayGuestCount = Guest::whereDate('created_at', '=', $today)->count();
        $totalGuestCount = Guest::count();

        $logs = LogModel::orderByRaw('created_at')->paginate(25);

        return view('admin.admin', compact('yesterdayGuestCount','todayGuestCount','totalGuestCount', 'logs'));
    }
}
