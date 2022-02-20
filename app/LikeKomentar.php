<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeKomentar extends Model
{
    protected $table = 'like_komentar';
    protected $fillable = [
        'user_id',
        'komentar_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function komentar()
    {
        return $this->belongsTo('App\Komentar');
    }
}
