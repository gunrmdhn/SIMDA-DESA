<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_pagu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->text('pagu_add');
            $table->text('pagu_dana_desa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_pagu');
    }
};
