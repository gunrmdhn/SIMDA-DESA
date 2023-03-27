<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_pegawai_dpmpd', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('nomor_ktp');
            $table->string('nomor_sk_jabatan');
            $table->string('tmt_pelantikan');
            $table->string('tmt');
            $table->string('nomor_sk');
            $table->string('npwp');
            $table->text('file_dokumen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_pegawai_dpmpd');
    }
};
