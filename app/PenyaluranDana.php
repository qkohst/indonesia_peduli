<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyaluranDana extends Model
{
    protected $table = 'penyaluran_dana';
    protected $fillable = [
        'user_id',
        'program_donasi_id',
        'jumlah',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function program_donasi()
    {
        return $this->belongsTo('App\ProgramDonasi');
    }
}
