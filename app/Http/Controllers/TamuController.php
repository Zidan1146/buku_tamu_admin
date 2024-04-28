<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function tamu_tampil($tanggal = null){
        $guestDates = Guest::selectRaw('DATE(created_at) as date')
        ->distinct()
        ->pluck('date');

        $guests = Guest::paginate(10);

        if(!$tanggal){
            return view('admin.tamu.tamu', compact('guests','guestDates'));
        }

        $guests = Guest::orderByRaw('created_at')->whereDate('created_at', '=', $tanggal)->paginate(10);
        if($guests->isEmpty()){
            return redirect(route('tamu.tampil'));
        }

        return view('admin.tamu.tamu', compact('guests','guestDates', 'tanggal'));
    }

    public function laporan_tampil(){
        return view ('admin.tamu.laporan');
    }
}
