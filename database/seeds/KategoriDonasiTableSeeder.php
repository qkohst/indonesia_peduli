<?php

use App\KategoriDonasi;
use Illuminate\Database\Seeder;

class KategoriDonasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriDonasi::create([
            'id' => 1,
            'nama_kategori'    => 'Program Donasi Utama',
        ]);
        KategoriDonasi::create([
            'id' => 2,
            'nama_kategori'    => 'Kemanusiaan',
        ]);
    }
}
