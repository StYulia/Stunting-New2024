@extends('layouts.app')

@section('title', 'Gejala')

<style>
    /* Pagination Navigation */
nav[role="navigation"] {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    font-family: Arial, sans-serif; /* Menggunakan font family yang lebih umum */
}

/* Pagination Links */
nav a {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    font-size: 14px; /* Ukuran font yang lebih terbaca */
}

nav a:hover {
    background-color: #f0f0f0;
    color: #555;
}

/* Current Page Indicator */
nav a[aria-current="page"] {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Disabled Links */
nav a[aria-disabled="true"] {
    cursor: default;
    color: #999;
    background-color: #f0f0f0;
}

/* Arrow Icons */
nav a svg {
    vertical-align: middle;
    margin-left: 5px;
    width: 12px; /* Ukuran ikon yang lebih kecil */
    height: 12px;
}

svg{
    width: 12px; /* Ukuran ikon yang lebih kecil */
    height: 12px;
}

/* Responsiveness for Small Screens */
@media (max-width: 576px) {
    nav[role="navigation"] {
        flex-direction: column;
        align-items: flex-start;
    }

    nav a {
        margin-bottom: 5px;
    }
}

</style>

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Gejala</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Gejala</div>
                </div>
            </div>
            <div class="section-body">
                <a href="{{ route('gejala.create') }}" class="btn btn-primary mb-3">Add Gejala</a>
                <div class="card">
                    <div class="card-header">
                        <h4>Gejala List</h4>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Kode</th>
                                        <th>Bobot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gejalas as $gejala)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gejala->name }}</td>
                                            <td>{{ $gejala->kode }}</td>
                                            <td>{{ $gejala->bobot }}</td>
                                            <td>
                                                <form action="{{ route('gejala.destroy', $gejala->id) }}" method="POST">
                                                    <a href="{{ route('gejala.show', $gejala->id) }}" class="btn btn-info">Show</a>
                                                    <a href="{{ route('gejala.edit', $gejala->id) }}" class="btn btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $gejalas->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
