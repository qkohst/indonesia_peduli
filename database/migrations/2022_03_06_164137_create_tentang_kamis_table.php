<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentangKamisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id();
            $table->string('deksripsi_singkat', 100);
            $table->string('deksripsi_footer');
            $table->longText('deksripsi');
            $table->string('gambar_utama');
            $table->string('alamat', 150);
            $table->string('email', 50);
            $table->string('nomor_hp', 13);
            $table->string('facebook', 50);
            $table->string('twitter', 50);
            $table->string('instagram', 50);
            $table->string('youtube', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentang_kami');
    }
}
