<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hidroponik_id',
        'tanggal',
        'jumlah',
        'volume',
        'larutan',
        'ppm',
        'kondisi',
    ];

    public function hidroponik(){
        return $this->belongsTo(Hidroponik::class, 'hidroponik_id');
    }
}
