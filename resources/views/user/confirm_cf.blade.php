@extends('layouts.landing.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Konfirmasi CF</h1>
        </div>
        <div class="card-body">
            <p class="text-center">Nilai CF yang dihitung: <strong>{{ $cfCombine }}</strong></p>
            <form method="POST" action="{{ route('cf.confirm') }}">
                @csrf
                <div class="text-center">
                    <button type="submit" name="action" value="commit" class="btn btn-success mr-2">Ya</button>
                    <button type="submit" name="action" value="rollback" class="btn btn-danger">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
