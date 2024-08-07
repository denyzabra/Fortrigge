<?php

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
            'housing_type_id' => 1, // Replace with actual housing type IDs
            'land_type_id' => 1, // Replace with actual land type IDs
            'location' => $this->faker->address,
            'address' => $this->faker->streetAddress,
            'owner_name' => $this->faker->name,
            'owner_email' => $this->faker->safeEmail,
            'owner_phone_number' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
