<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('Nama');
            $table->string('Nomor_Telepon');
            $table->text('Alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('pasiens');
    }
};
