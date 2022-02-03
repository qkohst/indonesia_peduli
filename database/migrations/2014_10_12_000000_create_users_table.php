<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 50);
            $table->string('email')->unique();
            $table->string('nomor_hp', 13)->unique();
            $table->string('password');
            $table->enum('role', ['1', '2']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('avatar');
            $table->rememberToken();
            $table->timestamps();
        });

        // Role 
        // 1 = Admin 
        // 2 = Member 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
