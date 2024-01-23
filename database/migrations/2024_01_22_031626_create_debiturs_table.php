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
        Schema::create('debiturs', function (Blueprint $table) {
            $table->id();
            $table->string('no_debitur', 13);
            $table->string('nama_debitur');
            $table->date('tanggal_realisasi');
            $table->string('jenis_kredit');
            $table->integer('kode_developer');
            $table->string('proyek_perumahan');
            $table->integer('kode_notaris');
            $table->integer('plafon_kredit');
            $table->integer('saldo_pokok');
            $table->string('blok', 4);
            $table->integer('no');
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');

            $table->foreign('kode_notaris')->references('kode_notaris')->on('notaris');
            $table->foreign('kode_developer')->references('kode_developer')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debiturs');
    }
};
