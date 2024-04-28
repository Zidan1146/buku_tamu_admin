@extends('admin.layout.master')
@section('content')
<div class="mb-3">
    <h3 class="text-dark">Petugas Dashboard</h3>
</div>
<div class="row" style="height: 200px;">
    <div class="col-12 col-md-4 d-flex">
        <div class="card flex-fill border-0 illustration">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9 p-3 d-flex flex-column w-100">
                        <span>data tamu kemarin</span>
                        <span class="w-100 h-100 d-flex justify-content-center align-items-center fs-1">{{ $yesterdayGuestCount ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 d-flex">
        <div class="card flex-fill border-0">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9 p-3 d-flex flex-column w-100">
                        <span>data tamu hari ini</span>
                        <span class="w-100 h-100 d-flex justify-content-center align-items-center fs-1">
                            {{ $todayGuestCount ?? '-' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 d-flex">
        <div class="card flex-fill border-0">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9 p-3 d-flex flex-column w-100">
                        <span>Total data tamu</span>
                        <span class="w-100 h-100 d-flex justify-content-center align-items-center fs-1">{{ $totalGuestCount ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="height: 300px;">
    <div class="col-12 col-md-12 d-flex">
        <div class="card flex-fill border-0">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9 p-3 d-flex flex-column">
                        <span>Log</span>
                        <div class="d-flex flex-column">
                            @foreach ($logs as $log)
                                <span>{{ $log->created_at }} [{{ $log->ip }} | <b>{{ $log->tag }}</b>]: {{ $log->message }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SWEETALERT untuk Login Berhasil --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = {!! json_encode(session('success')) !!};
        if (successMessage) {
            Swal.fire({
                title: 'Success!',
                text: successMessage,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2000
            }).then((result) => {
                if (result.isConfirmed) {
                    @php session()->forget('success'); @endphp
                }
            });
        }
    });
</script>
@endsection
