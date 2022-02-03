<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_lengkap'    => 'Admin',
            'email'    => 'indonesiapeduli@gmail.com',
            'nomor_hp'    => '085232077931',
            'password'    => bcrypt('123456'),
            'role' => 1,
            'jenis_kelamin' => 'L',
            'avatar' => 'default.png'
        ]);

        User::create([
            'nama_lengkap'    => 'Member',
            'email'    => 'memberpeduli@gmail.com',
            'nomor_hp'    => '085232077932',
            'password'    => bcrypt('123456'),
            'role' => 2,
            'jenis_kelamin' => 'L',
            'avatar' => 'default.png'
        ]);
    }
}
