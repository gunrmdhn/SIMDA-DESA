<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna')->unique();
            $table->string('peran');
            $table->string('kode_kecamatan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kode_desa')->nullable();
            $table->string('desa')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
