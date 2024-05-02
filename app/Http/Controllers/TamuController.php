<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function tamu_tampil(Request $request, $tanggal = null){
        $guestDates = Guest::selectRaw('DATE(created_at) as date')
        ->distinct()
        ->pluck('date');

        $guests = Guest::paginate(10);
        $searchTerm = $request->query('q');

        $getOperatorStr = substr($searchTerm, 0, 1);
        $getOperator = urldecode($getOperatorStr);

        $isExcludingSearch = $getOperatorStr === '!';
        $isNameSearch = $getOperator === '@';

        $operator = $isExcludingSearch ? 'NOT LIKE' : 'LIKE';
        $searchType = $isNameSearch ? 'nama' : 'instansi';

        $searchValue =  '%'.($isExcludingSearch || $isNameSearch ? substr($searchTerm, 1) : $searchTerm).'%';

        if(!$tanggal && isset($searchTerm)) {
            $guests = Guest::orderByRaw('created_at')
                ->where($searchType, $operator, $searchValue)
                ->paginate(10);

            return view('admin.tamu.tamu', compact('guests','guestDates', 'tanggal'));
        }

        if(!$tanggal){
            return view('admin.tamu.tamu', compact('guests','guestDates'));
        }

        if(isset($searchTerm)) {
            $guests = Guest::orderByRaw('created_at')
                ->whereDate('created_at', '=', $tanggal)
                ->where($searchType, $operator, $searchValue)
                ->paginate(10);

            return view('admin.tamu.tamu', compact('guests','guestDates', 'tanggal'));
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
