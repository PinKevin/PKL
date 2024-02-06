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
        Schema::create('bast_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemberi');
            $table->unsignedBigInteger('peminjam');
            $table->unsignedBigInteger('peminta');
            $table->unsignedBigInteger('debitur');
            $table->text('pendukung');
            $table->text('keperluan');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_jatuh_tempo');

            $table->foreign('pemberi')->references('id')->on('users');
            $table->foreign('peminjam')->references('id')->on('staff_notaris');
            $table->foreign('peminta')->references('id')->on('staff_cabangs');
            $table->foreign('debitur')->references('id')->on('debiturs');

            $table->foreignId('surat_roya_id')->nullable()->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bast_peminjaman');
    }
};
