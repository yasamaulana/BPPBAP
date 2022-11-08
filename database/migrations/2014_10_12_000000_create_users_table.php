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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('jabatan')->nullable();
            // $table->string('email');
            $table->string('type');
            // $table->string('password');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('nomor')->nullable();
            $table->string('api_token')->nullable();
            $table->string('umur')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('email');
            $table->string('username')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}