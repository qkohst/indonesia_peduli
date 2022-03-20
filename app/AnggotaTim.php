<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaTim extends Model
{
    protected $table = 'anggota_tim';
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'foto',
        'uraian_tugas'
    ];
}
