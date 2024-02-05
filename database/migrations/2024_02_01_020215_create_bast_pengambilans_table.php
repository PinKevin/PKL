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
        Schema::create('bast_pengambilans', function (Blueprint $table) {
            $table->id();
            $table->string('no_debitur', 13);
            $table->string('nama_debitur');
            $table->string('no_ktp', 16);
            $table->string('alamat_ktp');
            $table->string('alamat_agunan');
            $table->string('no');
            $table->string('blok');
            $table->string('tanggal_pelunasan');
            $table->unsignedBigInteger('nama_developer');
            $table->string('pengambil');
            $table->string('nama_pengambil');
            $table->string('no_ktp_pengambil');
            $table->string('file_pelunasan');
            $table->foreignId('debitur_id')->constrained();
            $table->foreign('nama_developer')->references('id')->on('developers');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bast_pengambilans');
    }
};
