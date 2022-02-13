<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';
    protected $fillable = [
        'user_id',
        'program_donasi_id',
        'doa',

        'transaction_id',
        'order_id',
        'gross_amount',
        'payment_type',
        'transaction_status',
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
