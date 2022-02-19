<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = [
        'user_id',
        'program_donasi_id',
        'komentar'
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
