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
        // Schema::create('berkas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama_debitur');
        //     $table->string('no_debitur');
        //     $table->date('tanggal_pengambilan');
        //     $table->string('file_bukti')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
