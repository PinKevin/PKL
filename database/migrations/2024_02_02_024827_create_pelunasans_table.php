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
        Schema::create('pelunasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bast_pengambilan_id')->constrained();
            $table->foreignId('debitur_id')->constrained();
            $table->string('file_bast');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelunasans');
    }
};
