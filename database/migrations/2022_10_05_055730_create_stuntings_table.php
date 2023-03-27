<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabel_stunting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kode');
            $table->string('info_lokus_stunting');
            $table->text('sk_bupati');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_stunting');
    }
};
