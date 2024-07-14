@extends('layouts.app')

@section('title', 'Data Kader & Admin')

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
                <h1>Data Kader & Admin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Layout</a></div>
                    <div class="breadcrumb-item">Data Kader dan Admin</div>
                </div>
            </div>
            <div class="section-body">
                @include('components.alert')
                <div class="card">
                    <div class="card-header">
                        <h4>List of Users</h4>
                        <a class="btn btn-primary" href="{{ route('users.create') }}">Add User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
