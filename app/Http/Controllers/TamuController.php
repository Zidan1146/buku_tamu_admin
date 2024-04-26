<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function tamu_tampil(){
        return view('admin.tamu.tamu');
    }

    public function laporan_tampil(){
        return view ('admin.tamu.laporan');
    }
}
