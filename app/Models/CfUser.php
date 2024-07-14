<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CfUser extends Model
{
    use HasFactory;

    protected $table ='cf_user';


    protected  $fillable = [
        'anak_id' , 'user_id' , 'cf'
    ];


    public function anak(){
        return $this->belongsTo(Anak::class,'anak_id');
    }

    public function gejalas(){
        return $this->hasMany(CfGejala::class , 'cf_id');
    }

}
