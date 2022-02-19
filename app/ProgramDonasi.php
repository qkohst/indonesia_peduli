<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramDonasi extends Model
{
    protected $table = 'program_donasi';
    protected $fillable = [
        'user_id',
        'judul',
        'kategori_donasi_id',
        'deskripsi',
        'kebutuhan_dana',
        'batas_akhir_donasi',
        'gambar',
        'kisah'
    ];
    protected $dates = ['batas_akhir_donasi'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kategori_donasi()
    {
        return $this->belongsTo('App\KategoriDonasi');
    }

    public function donasi()
    {
        return $this->hasMany('App\Donasi');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
