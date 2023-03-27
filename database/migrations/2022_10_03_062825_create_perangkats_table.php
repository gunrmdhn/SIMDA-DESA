<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_perangkat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nomor_sk');
            $table->string('tanggal_sk');
            $table->string('tanggal_pelantikan');
            $table->string('periode_jabatan');
            $table->text('file_sk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_perangkat');
    }
};
