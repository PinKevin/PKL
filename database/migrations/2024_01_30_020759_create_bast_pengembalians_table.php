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
        Schema::create('bast_pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerima');
            $table->unsignedBigInteger('peminjam');
            $table->unsignedBigInteger('debitur');
            $table->text('pendukung');
            $table->text('keperluan');
            $table->date('tanggal_kembali');

            $table->foreign('penerima')->references('id')->on('users');
            $table->foreign('peminjam')->references('id')->on('staff_notaris');
            $table->foreign('debitur')->references('id')->on('debiturs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bast_pengembalians');
    }
};
