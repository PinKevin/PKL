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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bast_peminjaman_id');
            $table->foreign('bast_peminjaman_id')->references('id')->on('bast_peminjaman');

            $table->unsignedBigInteger('peminjaman_id');
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman');

            $table->unsignedBigInteger('bast_pengembalian_id');
            $table->foreign('bast_pengembalian_id')->references('id')->on('bast_pengembalians');

            $table->foreignId('dokumen_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
