<?php

namespace App\Models;

use App\Models\Hidroponik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ppm extends Model
{
    use HasFactory;

    protected $fillable = [
        'hidroponik',
        'min',
        'max'
    ];

    public function hidroponik(){
        return $this->hasMany(Hidroponik::class);
    }
}
