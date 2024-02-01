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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('no_dokumen');
            $table->date('tanggal_terima');
            $table->date('tanggal_terbit');
            $table->date('tanggal_jatuh_tempo');
            $table->string('file');
            $table->boolean('status_pinjaman');
            $table->boolean('status_keluar');
            $table->foreignId('debitur_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
