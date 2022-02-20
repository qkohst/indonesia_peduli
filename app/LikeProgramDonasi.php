<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeProgramDonasi extends Model
{
    protected $table = 'like_program_donasi';
    protected $fillable = [
        'user_id',
        'program_donasi_id'
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
