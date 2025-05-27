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
        Schema::table('mahasiswa', function (Blueprint $table) {
            // First drop the foreign key constraint
            $table->dropForeign(['kampus_id']);
            // Then drop the column
            $table->dropColumn('kampus_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->unsignedBigInteger('kampus_id')->index();
            $table->foreign('kampus_id')->references('id')->on('kampus')->onDelete('cascade');
        });
    }
};
