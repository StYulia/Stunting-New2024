@extends('layouts.landing.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4 class="text-center">Pilih indikator dan isi nilai sesuai dengan kondisi anak saat ini</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('calculate.cf', ['id'=>$anak->id]) }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tbody>
                                @foreach ($gejalas as $item)
                                <tr>
                                    <td>{{$item->kode}}</td>
                                    <td>
                                        {{$item->name}}
                                        @if ($item->name === 'Apakah tinggi badan anak Anda masih di bawah rata-rata dibandingkan anak seusianya?')
                                            <br>
                                            <a href="https://www.alodokter.com/tinggi-badan-anak-yang-ideal-dan-cara-memaksimalkan-pertumbuhannya" target="_blank">Lihat tinggi badan ideal anak disini!</a>
                                        @elseif ($item->name === 'Apakah kondisi wajah anak Anda saat ini tampak lebih kecil dengan kondisi kulit lebih tipis dan halus?')
                                            <br>
                                            <a href="https://morinaga.id/id/milestone/memahami-ukuran-lingkar-kepala-anak-usia-0-10-tahun" target="_blank">Lihat lingkar kepala normal disini!</a>
                                        @endif
                                    </td>
                                        <td>
                                            <select name="gejala[]" id="" class="form-control">
                                                <option value="0" selected>Tidak</option>
                                                <option value="0.2" >Hampir Mungkin</option>
                                                <option value="0.4" >Mungkin</option>
                                                <option value="0.6" >Kemungkinan Besar</option>
                                                <option value="0.8" >Hampir Pasti</option>
                                                <option value="1.0" >Pasti Ya</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>
                                        <button class="btn btn-primary">Submit</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
