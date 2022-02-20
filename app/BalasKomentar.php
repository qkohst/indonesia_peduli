<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalasKomentar extends Model
{
    protected $table = 'balas_komentar';
    protected $fillable = [
        'user_id',
        'komentar_id',
        'komentar_balas'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function komentar()
    {
        return $this->belongsTo('App\Komentar');
    }

    public function like_balas_komentar()
    {
        return $this->hasMany('App\LikeBalasKomentar');
    }
}
