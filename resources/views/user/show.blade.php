@extends('layouts.landing.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5 class="text-center">Hasil Konsultasi</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center">Data Diri</h4>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                Nama Lengkap
                            </td>
                            <td>
                                {{ $anak->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>
                                {{ $anak->jk }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Usia Dalam Bulam
                            </td>
                            <td>
                                {{ $anak->usia_dalam_bulan }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tinggi Badan
                            </td>
                            <td>
                                {{ $anak->tinggi }} (Cm)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Berat Badan
                            </td>
                            <td>
                                {{ $anak->berat }} (Kg)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                BB/PB
                            </td>
                            <td>
                                {{ $anak->getKategoriBmiAttribute() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat
                            </td>
                            <td>
                                {{ $anak->orangtua->alamat }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    @foreach ($anak->cf as $c)
                        <div>
                            <h4 class="text-center">Gejala Yang Dipilih</h4>
                            <p>Pemeriksaan ke {{ $loop->iteration }}</p>
                            <table class="table table-bordered">
                                @foreach ($c->gejalas as $item)
                                    <tr>
                                        <td>
                                            {{ $item->gejala->kode }}
                                        </td>
                                        <td>
                                            {{ $item->gejala->name }}
                                        </td>
                                        <td>
                                            {{ $item->nilai_bobot() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="card-title">
                <h5 class="text-center">Hasil Konsultasi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pemeriksaan Ke</th>
                                <th>Nama Penyakit</th>
                                <th>Tingkat Kepercayaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak->cf as $item)
                                <tr>
                                    <td>Pemeriksaan ke {{ $loop->iteration }}</td>
                                    <td>Stunting</td>
                                    <td>{{ $item->cf * 100 }} %</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
