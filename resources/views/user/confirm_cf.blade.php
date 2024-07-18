@extends('layouts.landing.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Konfirmasi Hasil Konsultasi</h1>
        </div>
        <div class="card-body">
            <h4 class="text-center">Hasil deteksi anak anda: <strong>{{ $cfCombine * 100 }}%</strong></h4>
            <p class="text-center"> Berdasarkan hasil deteksi anak anda dikatakan:
                <strong class="h5">
                    @if ($cfCombine <= 0.6)
                    Normal
                    @elseif ($cfCombine <= 0.79)
                    Kemungkinan besar stunting
                    @else
                    Stunting
                    @endif
                </strong>
            <form method="POST" action="{{ route('cf.confirm') }}">
                @csrf
                <div class="text-center mt-5">
                    <p class="font-weight-bold">Apakah Anda ingin menyimpan data konsultasi ini?</p>
                    <button type="submit" name="action" value="commit" class="btn btn-success btn-lg mr-3">Ya</button>
                    <button type="submit" name="action" value="rollback" class="btn btn-danger btn-lg">Tidak</button>
                </div>

            </form>
        </div>
</div>
</div>
@endsection