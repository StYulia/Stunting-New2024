<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Gejala extends Model
{
    public function scopeNotArchived(Builder $query)
    {
        return $query->where('is_archived', false);
    }

    
    use HasFactory;

    protected $fillable = [
        'name',
        'kode',
        'bobot',
    ];
    
}
