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
        Schema::create('properties', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing unsigned big integer
            $table->string('name');
            $table->text('description')->nullable(); // Changed to text and made nullable
            $table->decimal('price', 15, 2); // Changed to decimal for more accurate price representation
            $table->string('thumbnail_image')->nullable(); // Changed to string for file path or URL
            $table->foreignId('housing_type_id')->constrained('housing_types')->onDelete('cascade'); // Use foreignId and constrained for simplicity
            $table->foreignId('land_type_id')->constrained('land_types')->onDelete('cascade'); // Use foreignId and constrained for simplicity
            $table->timestamps();
            $table->softDeletes(); // For soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
