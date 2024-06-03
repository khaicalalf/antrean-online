<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('polis', function (Blueprint $table) {
            $table->id();
            $table->string('Kode');
            $table->string('Nama_Poli');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('polis');
    }
};