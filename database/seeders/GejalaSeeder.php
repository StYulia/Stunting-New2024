<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $gejalas = [
            [
                'name' => 'Pertumbuhan gigi anak melambat',
                'kode' => 'G01',
                'bobot' => 1.0,
            ],
            [
                'name' => 'Wajah terlihat lebih muda dari usianya',
                'kode' => 'G02',
                'bobot' => 1.0,
            ],
            [
                'name' => 'Pertumbuhan melambat',
                'kode' => 'G03',
                'bobot' => 0.8,
            ],
            [
                'name' => 'BB balita cenderung menurun',
                'kode' => 'G04',
                'bobot' => 0.8,
            ],
            [
                'name' => 'Kesulitan fokus dan daya ingat buruk saat belajar',
                'kode' => 'G05',
                'bobot' => 1.0,
            ],
            [
                'name' => 'Tinggi badan dibawah rata ukuran normal',
                'kode' => 'G06',
                'bobot' => 1.0,
            ],
            [
                'name' => 'Anak mudah terserang penyakit infeksi',
                'kode' => 'G07',
                'bobot' => 1.0,
            ],
            [
                'name' => 'Tidak aktif bermain',
                'kode' => 'G08',
                'bobot' => 0.8,
            ],
            [
                'name' => 'Sering lemas',
                'kode' => 'G09',
                'bobot' => 0.6,
            ],
            [
                'name' => 'Sesak nafas',
                'kode' => 'G10',
                'bobot' => 0.2,
            ],
            [
                'name' => 'Balita tidak dapat menyusu dengan baik',
                'kode' => 'G11',
                'bobot' => 0.4,
            ],
            [
                'name' => 'Mudah Sakit',
                'kode' => 'G12',
                'bobot' => 0.6,
            ],
            [
                'name' => 'Aktif bergerak',
                'kode' => 'G13',
                'bobot' => 0.0,
            ],
            [
                'name' => 'Bisa beradaptasi dengan cepat',
                'kode' => 'G14',
                'bobot' => 0.0,
            ],
            [
                'name' => 'Nafsu makan yang baik',
                'kode' => 'G15',
                'bobot' => 0.0,
            ],
            [
                'name' => 'Postur tubuh yang baik',
                'kode' => 'G16',
                'bobot' => 0.0,
            ],
            [
                'name' => 'Otot dan tulang yang kuat',
                'kode' => 'G17',
                'bobot' => 0.0,
            ],
        ];

        DB::table('gejalas')->insert($gejalas);
    }
}
