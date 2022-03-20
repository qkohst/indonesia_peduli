<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaraKerja extends Model
{
    protected $table = 'cara_kerja';
    protected $fillable = [
        'tahap',
        'icon',
        'deskripsi'
    ];
}
