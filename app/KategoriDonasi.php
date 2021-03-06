<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDonasi extends Model
{
    protected $table = 'kategori_donasi';
    protected $fillable = [
        'nama_kategori'
    ];

    public function program_donasi()
    {
        return $this->hasMany('App\ProgramDonasi');
    }
}
