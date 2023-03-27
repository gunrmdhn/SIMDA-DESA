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
        Schema::create('tabel_ppa3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->text('surat_pengantar_camat');
            $table->text('surat_permohonan_penyaluran');
            $table->text('laporan_realisasi_bulan');
            $table->text('laporan_realisasi_triwulan');
            $table->text('laporan_realisasi_semester');
            $table->text('presentase_bayar');
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
        Schema::dropIfExists('tabel_ppa3');
    }
};
