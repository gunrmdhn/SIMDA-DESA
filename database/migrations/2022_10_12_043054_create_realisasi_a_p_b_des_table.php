<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_realisasi_apbdes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->string('jumlah_salur_add');
            $table->string('realisasi_belanja_add');
            $table->string('sisa_add');
            $table->string('jumlah_salur_dana_desa');
            $table->string('realisasi_belanja_dana_desa');
            $table->string('sisa_dana_desa');
            $table->text('baliho');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_realisasi_apbdes');
    }
};
