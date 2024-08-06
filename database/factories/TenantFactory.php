<?php

// database/factories/TenantFactory.php
namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'property_id' => Property::factory(), 
            'lease_start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'lease_end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

