<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('tahun_terima');
            $table->string('bulan_terima');
            $table->string('tanggal_terima');
            $table->string('nomor_surat');
            $table->string('tanggal_surat');
            $table->string('asal_surat');
            $table->string('tujuan_surat');
            $table->string('perihal_surat');
            $table->text('file_surat_masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_surat_masuk');
    }
};
