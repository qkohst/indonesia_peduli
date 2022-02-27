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
            'nama_kategori'    => 'Program Donasi Utama',
        ]);
    }
}
