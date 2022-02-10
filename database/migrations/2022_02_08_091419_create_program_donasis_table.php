<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('judul', 50);
            $table->unsignedBigInteger('kategori_donasi_id')->unsigned();
            $table->string('deskripsi', 150);
            $table->integer('kebutuhan_dana');
            $table->date('batas_akhir_donasi');
            $table->string('gambar');
            $table->longText('kisah');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('kategori_donasi_id')->references('id')->on('kategori_donasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_donasi');
    }
}
