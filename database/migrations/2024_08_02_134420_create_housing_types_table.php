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
        Schema::create('housing_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('1: Apartment, 2: Townhouse, 3: Bungalow');
            $table->string('name')->comment('Type name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housing_types');
    }
};
