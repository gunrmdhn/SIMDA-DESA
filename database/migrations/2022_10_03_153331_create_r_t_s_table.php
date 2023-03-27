<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_rt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->string('jumlah_rw');
            $table->string('jumlah_rt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_rt');
    }
};
