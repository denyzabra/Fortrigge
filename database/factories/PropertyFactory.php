<?php

// database/factories/PropertyFactory.php
namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'housing_type_id' => 1, // Use actual housing type IDs or create a factory for housing type
            'land_type_id' => 1, // Use actual land type IDs or create a factory for land type
            'location' => $this->faker->address,
            'address' => $this->faker->streetAddress,
            'thumbnail_image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
