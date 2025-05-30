<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ujian_id')->index();
            $table->string('no_pendaftaran')->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->datetime('tanggal_lahir');
            $table->string('nik')->unique();
            $table->string('alamat_asal');
            $table->string('alamat_sekarang');
            $table->string('foto_ktp');
            $table->string('foto_ktm');
            $table->enum('status', ['Verified', 'Non Verified']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
