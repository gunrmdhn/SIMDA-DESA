<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_bumdes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->string('nama_bumdes');
            $table->string('tahun_pembentukan');
            $table->string('npp');
            $table->string('nkkpp');
            $table->string('verifikasi_nama');
            $table->string('verifikasi_dokumen');
            $table->string('proses_registrasi_badan_hukum');
            $table->string('tanggal_unggah')->nullable();
            $table->string('tanggal_kedaluwarsa')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nomor_sk')->nullable();
            $table->string('nama_ketua');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('jumlah_pengurus');
            $table->string('jumlah_unit_usaha');
            $table->string('jumlah_omzet');
            $table->string('jumlah_total_pmd');
            $table->string('jumlah_total_pmsl');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_bumdes');
    }
};
