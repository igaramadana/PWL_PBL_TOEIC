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
        Schema::create('tendik', function (Blueprint $table) {
            $table->id('tendik_id');
            $table->string('nip')->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('tendik_nama');
            $table->string('no_telp');
            $table->unsignedBigInteger('kampus_id')->index();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('kampus_id')->references('kampus_id')->on('kampus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tendik');
    }
};
