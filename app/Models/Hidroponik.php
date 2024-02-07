<?php

namespace App\Models;

use App\Models\Ppm;
use App\Models\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hidroponik extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'ppm_id',
    ];

    public function data(){
        return $this->hasMany(Data::class);
    }

    public function ppm(){
        return $this->belongsTo(Ppm::class, 'ppm_id');
    }
}
