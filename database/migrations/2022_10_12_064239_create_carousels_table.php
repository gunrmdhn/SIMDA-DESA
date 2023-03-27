<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_berita', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('judul');
            $table->text('keterangan');
            $table->text('gambar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_berita');
    }
};
