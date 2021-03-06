<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_hp',
        'password',
        'role',
        'jenis_kelamin',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function program_donasi()
    {
        return $this->hasMany('App\ProgramDonasi');
    }

    public function donasi()
    {
        return $this->hasMany('App\Donasi');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }

    public function balas_komentar()
    {
        return $this->hasMany('App\BalasKomentar');
    }

    public function like_program_donasi()
    {
        return $this->hasMany('App\LikeProgramDonasi');
    }

    public function like_komentar()
    {
        return $this->hasMany('App\LikeKomentar');
    }

    public function like_balas_komentar()
    {
        return $this->hasMany('App\LikeBalasKomentar');
    }

    public function penyaluran_dana()
    {
        return $this->hasMany('App\PenyaluranDana');
    }
}
