<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balas_komentar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('komentar_id')->unsigned();
            $table->string('komentar_balas');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('komentar_id')->references('id')->on('komentar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balas_komentar');
    }
}
