<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->integer('Nomor_Antrian');
            $table->integer('Nomor_Antrian_Poli'); // Nomor antrian per poli
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->foreignId('poli_id')->constrained('polis');
            $table->date('Tanggal_Antrian');
            $table->timestamp('Waktu_Daftar')->useCurrent();
            $table->enum('Status', ['Menunggu', 'Diperiksa', 'Selesai', 'Dibatalkan'])->default('Menunggu');
            $table->string('random');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('antrians');
    }
};
