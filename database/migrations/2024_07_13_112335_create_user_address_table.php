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
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->char('province_id', 2)->nullable()->collation('utf8_general_ci');
            $table->char('regency_id', 4)->nullable()->collation('utf8_general_ci');
            $table->char('village_id', 10)->nullable()->collation('utf8_general_ci');
            $table->char('district_id', 6)->nullable()->collation('utf8_general_ci');
            $table->foreign('province_id')->references('id')->on('reg_provinces')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('regency_id')->references('id')->on('reg_regencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('village_id')->references('id')->on('reg_villages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('district_id')->references('id')->on('reg_districts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};
