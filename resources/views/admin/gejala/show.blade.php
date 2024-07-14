@extends('layouts.app')

@section('title', 'Show Gejala')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Show Gejala</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Gejala</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $gejala->name }}
                        </div>
                        <div class="form-group">
                            <strong>Kode:</strong>
                            {{ $gejala->kode }}
                        </div>
                        <div class="form-group">
                            <strong>Bobot:</strong>
                            {{ $gejala->bobot }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('gejala.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
