a<?php

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
        Schema::create('cf_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cf_id')->references('id')->on('cf_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('gejala_id')->references('id')->on('gejalas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('bobot')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cf_gejala');
    }
};
