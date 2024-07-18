@extends('layouts.landing.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Konfirmasi Hasil Deteksi</h1>
        </div>
        <div class="card-body">
            <p class="text-center">Nilai Kepercayaan: <strong>{{ $cfCombine *100 }} %</strong> Dari : <strong>100%</strong></p>

            <div class="d-flex justify-content-center gap-1">
                <h3>Simpan data deteksi? </h3>
                <form method="POST" action="{{ route('cf.confirm') }}" class="d-inline">
                    @csrf
                    <div class="text-center">
                        <button type="submit" name="action" value="commit" class="btn btn-success mr-2">Ya</button>
                        <button type="submit" name="action" value="rollback" class="btn btn-danger">Tidak</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
