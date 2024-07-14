<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $guarded = ['id'];


    public function orangtua(){
        return $this->belongsTo(User::class , "user_id");   
    }

    public function cf(){
        return $this->hasMany(CfUser::class , "anak_id");
    }

    public function getUsiaDalamBulanAttribute()
    {
        $tanggalLahir = Carbon::parse($this->tanggal_lahir);
        $sekarang = Carbon::now();

        $usiaDalamBulan = $tanggalLahir->diffInMonths($sekarang);

        return $usiaDalamBulan;
    }

    public function getBmiAttribute()
    {
        if ($this->tinggi && $this->berat) {
            $tinggiMeter = $this->tinggi / 100; // Konversi tinggi dari cm ke meter
            $bmi = $this->berat / ($tinggiMeter * $tinggiMeter);
            return round($bmi, 2); // Mengembalikan BMI dengan 2 angka desimal
        }
        return null;
    }

    public function getKategoriBmiAttribute()
    {
        $bmi = $this->bmi;

        if (is_null($bmi)) {
            return 'Data tidak lengkap';
        }

        if ($bmi < 16) {
            return 'Gizi buruk';
        } elseif ($bmi >= 16 && $bmi < 17) {
            return 'Gizi kurang';
        } elseif ($bmi >= 17 && $bmi < 18.5) {
            return 'Berisiko gizi kurang';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return 'Normal';
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 'Kelebihan berat badan';
        } elseif ($bmi >= 30 && $bmi < 35) {
            return 'Obesitas Kelas I';
        } elseif ($bmi >= 35 && $bmi < 40) {
            return 'Obesitas Kelas II';
        } else {
            return 'Obesitas Kelas III';
        }
    }

    

}
