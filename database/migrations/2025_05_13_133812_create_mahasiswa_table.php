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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('mahasiswa_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('nim')->unique();
            $table->string('mahasiswa_nama');
            $table->string('no_telp');
            $table->unsignedBigInteger('prodi_id')->index();
            $table->enum('status', ['Aktif', 'Alumni'])->default('Aktif');
            $table->string('angkatan');
            $table->unsignedBigInteger('kampus_id')->index();
            $table->boolean('daftar_ujian')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->onDelete('cascade');
            $table->foreign('kampus_id')->references('kampus_id')->on('kampus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
