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
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id('jurusan_id');
            $table->string('jurusan_kode')->unique();
            $table->string('jurusan_nama');
            $table->unsignedBigInteger('kampus_id')->index();
            $table->timestamps();

            $table->foreign('kampus_id')->references('kampus_id')->on('kampus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};
