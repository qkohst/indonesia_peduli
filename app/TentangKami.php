<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kami';
    protected $fillable = [
        'deksripsi_singkat',
        'deksripsi_footer',
        'deksripsi',
        'gambar_utama',
        'alamat',
        'email',
        'nomor_hp',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];
}
