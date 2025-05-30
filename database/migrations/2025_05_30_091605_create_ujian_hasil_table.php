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
        Schema::create('ujian_hasil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hasil_ujian');
            $table->date('waktu_ujian');
            $table->time('jam_ujian');
            $table->integer('kuota');
            $table->enum('status', ['Sudah Dilaksanakan', 'Belum Dilaksanakan'])->default('Belum Dilaksanakan');
            $table->unsignedBigInteger('admin_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian_hasil');
    }
};
