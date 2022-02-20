<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeBalasKomentar extends Model
{
    protected $table = 'like_balas_komentar';
    protected $fillable = [
        'user_id',
        'balas_komentar_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function balas_komentar()
    {
        return $this->belongsTo('App\BalasKomentar');
    }
}
