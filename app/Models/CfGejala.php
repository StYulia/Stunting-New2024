<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CfGejala extends Model
{
    use HasFactory;

    protected  $fillable = [
        'cf_id'  , 'gejala_id' , 'bobot'
    ];


    protected $table = 'cf_gejala';


    public function cf(){
        return $this->belongsTo(CfUser::class,"cf_id","id");
    }

    public function gejala(){
        return $this->belongsTo(Gejala::class,"gejala_id","id");
    }
    public function nilai_bobot()
    {
        $cf = $this->bobot;
        if ($cf == 0) {
            return 'Tidak Tahu';
        } elseif ($cf == 0.2) {
            return 'Hampir Mungkin';
        } elseif ($cf == 0.4) {
            return 'Mungkin';
        } elseif ($cf == 0.6) {
            return 'Kemungkinan Besar';
        } elseif ($cf == 0.8) {
            return 'Hampir Pasti';
        } elseif ($cf == 1) {
            return 'Pasti Ya';
        } else {
            return 'Nilai tidak valid';
        }
    }

}
