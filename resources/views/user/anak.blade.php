@extends('layouts.landing.app')

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mb-4">Lakukan Pemeriksaan Dan Lihat History</h3>
            @foreach ($anaks as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Name :{{$item->name}}</h5>
                    <p class="card-title">Nik : {{$item->nik}}</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tinggi:</strong> {{$item->tinggi}} cm</li>
                        <li class="list-group-item"><strong>Berat:</strong> {{$item->berat}} kg</li>
                    </ul>
                    <div class="mt-3">
                        <a href="{{ route('periksa.anak', ['id'=>$item->id]) }}" class="btn btn-primary">Konsultasi Stunting</a>
                        <a href="{{ route('anak.show', ['id'=>$item->id]) }}" class="btn btn-outline-success">Lihat History Konsultasi</a>
                        <a href="{{ route('anak.edit', ['id'=>$item->id]) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE') 
                        <a href="{{ route('anak.destroy', ['id'=>$item->id]) }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
