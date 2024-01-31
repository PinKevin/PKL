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
            $table->foreign('penerima')->references('id')->on('users');

            $table->date('tanggal_kembali');

            // $table->timestamps();
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
