<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('program_donasi_id')->unsigned();
            $table->string('doa');

            $table->string('transaction_id');
            $table->string('order_id');
            $table->integer('gross_amount');
            $table->string('payment_type');
            $table->string('transaction_status');
            
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
        Schema::dropIfExists('donasi');
    }
}
