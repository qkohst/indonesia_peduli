<?php

use App\ProgramDonasi;
use Illuminate\Database\Seeder;

class ProgramDonasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Donasi Utama 
        ProgramDonasi::create([
            'id' => 1,
            'user_id' => 1,
            'judul' => 'Aceng Badru',
            'kategori_donasi_id' => 1,
            'deskripsi' => 'Derita Kelainan Pergerakan, Pak Ustad Aceng Butuh Pertolonganmu Segera!',
            'kebutuhan_dana' => 15000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1648995324.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
        ProgramDonasi::create([
            'id' => 2,
            'user_id' => 1,
            'judul' => 'An Naura Eka Putri',
            'kategori_donasi_id' => 1,
            'deskripsi' => 'Mari Bantu Adik Naura Sembuh dari Penyakit Lumpuh Otak!',
            'kebutuhan_dana' => 20000000,
            'batas_akhir_donasi' => '2022-04-25',
            'gambar' => '1648995563.jpg',
            'kisah' => 'Sejak bayi, Naura (8) terindikasi mengalami kelainan. Kakinya terlilit usus saat dalam kandungan yang menyebabkan pertumbuhan fisiknya terhambat. Naura divonis dokter mengidap penyakit microcephali dan cerebral palsy yang membuat ukuran kepalanya lebih kecil dari ukuran normal. Kondisinya semakin hari semakin memprihatinkan. Pasalnya, anak tunggal dari Bu Dewi dan Pak Indra (37) harus selalu diberi asupan nutrisi dari susu tiap 2 jam sekali. Ia bisa menghabiskan 7 kg susu per minggunya. Dulu, sudah 2 tahun lebih Naura menjalani fisioterapi. Segala macam pengobatan yang direkomendasikan pasti selalu dicoba demi kesembuhan Naura. Namun, karena kondisi ekonomi yang serba sulit, Naura berhenti berobat. Saat ini ia hanya bisa terbaring kaku di kasur dan lemah tak berdaya.',
        ]);
        ProgramDonasi::create([
            'id' => 3,
            'user_id' => 1,
            'judul' => 'Sri Rahayu',
            'kategori_donasi_id' => 1,
            'deskripsi' => 'Yuk Bantu Ibu Sri Lawan Kanker Serviks!',
            'kebutuhan_dana' => 15000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1648996042.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);

        // Donasi Lain 
        ProgramDonasi::create([
            'id' => 4,
            'user_id' => 1,
            'judul' => 'Suracmat',
            'kategori_donasi_id' => 2,
            'deskripsi' => 'Yuk Ulurkan Tanganmu untuk Pak Suracmat agar Sembuh dari Penyakit Kanker Usus!',
            'kebutuhan_dana' => 25000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1648995955.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
        ProgramDonasi::create([
            'id' => 5,
            'user_id' => 1,
            'judul' => 'Muhamad Rayyan Dzaky Winata',
            'kategori_donasi_id' => 2,
            'deskripsi' => 'Derita Lumpuh Otak Hingga Penyakit Jantung, Rayyan Butuh Pertolonganmu Segera!',
            'kebutuhan_dana' => 30000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1648995393.png',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
        ProgramDonasi::create([
            'id' => 6,
            'user_id' => 1,
            'judul' => 'Jihan Aisyah Fadhila',
            'kategori_donasi_id' => 2,
            'deskripsi' => 'Jihan Bocah 2 tahun Alami Keterlambatan Tumbuh Kembang dan Gangguan Pendengaran, Bantuanmu sangat diharapkan',
            'kebutuhan_dana' => 50000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1646558673.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
        ProgramDonasi::create([
            'id' => 7,
            'user_id' => 1,
            'judul' => 'Ferisetiawan',
            'kategori_donasi_id' => 2,
            'deskripsi' => 'Masa Remajanya Terenggut Akibat Tumor Tulang, Feri Mengharapkan Bantuanmu',
            'kebutuhan_dana' => 11000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1645977191.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
        ProgramDonasi::create([
            'id' => 8,
            'user_id' => 1,
            'judul' => 'Rakha Putra Gunawan',
            'kategori_donasi_id' => 2,
            'deskripsi' => 'Lahir Tanpa Lubang Anus, Adik Putra Butuh Biaya untuk Operasi Lanjutan',
            'kebutuhan_dana' => 8000000,
            'batas_akhir_donasi' => '2022-06-25',
            'gambar' => '1645977056.jpg',
            'kisah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt blanditiis quod animi rem culpa laborum modi! Facere error doloremque nisi adipisci ab, eveniet blanditiis debitis facilis, magni at voluptatem nemo?',
        ]);
    }
}
