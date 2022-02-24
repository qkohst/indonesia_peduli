<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranDanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran_dana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('program_donasi_id')->unsigned();
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('program_donasi_id')->references('id')->on('program_donasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyaluran_dana');
    }
}
