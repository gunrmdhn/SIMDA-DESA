<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_penyaluran_operasional_triwulan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->text('surat_pengantar_camat');
            $table->text('surat_permohonan_penyaluran');
            $table->text('perdes_apbdes_lampiran');
            $table->text('perkades_penjabaran_apbdes_lampiran');
            $table->text('berita_acara_keputusan_bpd');
            $table->text('dpa');
            $table->text('rak');
            $table->text('rka');
            $table->text('sk_ppkd');
            $table->text('sptjm');
            $table->text('pakta_integritas');
            $table->text('daftar_kp_bpjs');
            $table->text('laporan_realisasi_add');
            $table->text('daftar_pagu_siltap_tunjangan');
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
        Schema::dropIfExists('tabel_penyaluran_operasional_triwulan');
    }
};
