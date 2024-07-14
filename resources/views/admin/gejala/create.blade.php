@extends('layouts.app')

@section('title', 'Create Gejala')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Gejala</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Gejala</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gejala.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input id="kode" type="text" class="form-control" name="kode" value="{{ old('kode') }}" required>
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot</label>
                                <input id="bobot" type="number" step="0.01" class="form-control" name="bobot" value="{{ old('bobot') }}" required>
                                @error('bobot')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
