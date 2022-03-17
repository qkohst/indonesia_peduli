<?php

use App\TentangKami;
use Illuminate\Database\Seeder;

class TentangKamiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TentangKami::create([
            'deksripsi_singkat'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'deksripsi_footer'    => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque dolores dolorem provident accusamus, ad asperiores officiis minima corporis ipsum dicta laborum quam, laboriosam quae placeat ullam numquam! Placeat, porro quis?',
            'deksripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at voluptatum sapiente vero, accusamus, minima autem repellendus voluptatibus iure corrupti, laudantium inventore fugiat animi itaque incidunt delectus? Debitis, voluptate optio?',
            'gambar_utama' => 'mainImages.png',
            'alamat' => 'Jl.Indonesia Jakarta Timur',
            'email' => 'indonesiapeduli@gmail.com',
            'nomor_hp' => '085232077932',
            'facebook' => 'IndonesiaPeduli',
            'twitter' => '@indonesiaPeduli',
            'instagram' => 'indonesia.peduli',
            'youtube' => 'Indonesia Peduli',
        ]);
    }
}
