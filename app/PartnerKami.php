<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerKami extends Model
{
    protected $table = 'partner_kami';
    protected $fillable = [
        'nama',
        'logo',
        'deksripsi'
    ];
}
