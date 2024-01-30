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
        Schema::create('surat_royas', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat_depan');
            $table->string('no_surat');
            $table->date('tanggal_pelunasan');
            $table->char('kota_bpn');
            $table->string('lokasi_kepala_bpn');
            $table->string('no_agunan');
            $table->char('kecamatan');
            $table->char('kelurahan');
            $table->string('no_surat_ukur');
            $table->string('nib');
            $table->integer('luas');
            $table->string('pemilik');
            $table->integer('peringkat_sht');
            $table->string('no_sht');
            $table->date('tanggal_sht');
            $table->foreignId('debitur_id')->constrained();

            $table->unsignedBigInteger('bast_peminjaman_id');
            $table->foreign('bast_peminjaman_id')->references('id')->on('bast_peminjaman');
            $table->foreign('kota_bpn')->references('id')->on('regencies');
            $table->foreign('kecamatan')->references('id')->on('districts');
            $table->foreign('kelurahan')->references('id')->on('villages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_royas');
    }
};
