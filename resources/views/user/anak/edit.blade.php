@extends('layouts.landing.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Edit Anak</h5>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('anak.update', $anak->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="">Nik/No KK</label>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Anak / No KK" required value="{{ old('nik', $anak->nik) }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label for="">Nama Anak</label>

                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anak" required value="{{ old('name', $anak->name) }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir Anak" required value="{{ old('tanggal_lahir', $anak->tanggal_lahir) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mt-3">
                            <label for="">Jenis Kelamin</label>
                            <select name="jk" id="jenis_kelamin" class="form-select" required>
                                <option value="" disabled selected>Jenis Kelamin Anak</option>
                                <option value="Laki-laki" {{ old('jk', $anak->jk) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jk', $anak->jk) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <label for="">Nomor Hp Orang Tua</label>

                            <input type="tel" class="form-control" name="nohp_orangtua" id="telepon_orang_tua" placeholder="Nomor Telepon Orang Tua" required value="{{ old('nohp_orangtua', $anak->nohp_orangtua) }}">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <label for="">Tinggi Badan (Cm)</label>

                            <input type="number" name="tinggi" class="form-control" id="tinggi_badan" placeholder="Tinggi Badan Anak (cm)" required value="{{ old('tinggi', $anak->tinggi) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group mt-3">
                            <label for="">
                                Berat Badan (kg)
                            </label>
                            <input type="number" name="berat" class="form-control" id="berat_badan" placeholder="Berat Badan Anak (kg)" required value="{{ old('berat', $anak->berat) }}">
                        </div>
                    </div>
                    <div class="my-4">
                        <button class="btn btn-primary" type="submit">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
