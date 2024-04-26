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
                    <div class="col-9">
                        data tamu kemarin
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 d-flex">
        <div class="card flex-fill border-0"> 
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9">
                        data tamu hari ini
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 d-flex">
        <div class="card flex-fill border-0"> 
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-9">
                        Total data tamu
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
                    <div class="col-9">
                        Isi content terserah
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