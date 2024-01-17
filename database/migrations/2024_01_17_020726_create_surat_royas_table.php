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
            $table->string('kota_bpn');
            $table->string('lokasi_kepala_bpn');
            $table->string('no_agunan');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('no_surat_ukur');
            $table->string('nib');
            $table->integer('luas');
            $table->string('pemilik');
            $table->integer('peringkat_sht');
            $table->string('no_sht');
            $table->date('tanggal_sht');
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
