@extends('admin.layout.master')
@section('content')
    <h1>Daftar Tamu {{ isset($tanggal) ? "Tanggal $tanggal" : '' }}</h1>
    @if ($guestDates->count() > 1)
        <div class="d-flex justify-content-around my-3">
            @foreach ($guestDates as $date)
                <a href="{{route('tamu.tampil').'/'.$date }}" class="btn btn-primary">{{ $date }}</a>
            @endforeach
            <a href="{{route('tamu.tampil')}}" class="btn btn-primary">Semua Data</a>
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Instansi</td>
        </tr>
        @foreach ($guests as $guest)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guest->nama }}</td>
                <td>{{ $guest->instansi }}</td>
            </tr>
        @endforeach
    </table>
    {{ $guests->links('vendor.pagination.bootstrap-5') }}
@endsection
