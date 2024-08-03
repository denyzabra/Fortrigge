<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class HousingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('housing_types')->insert([
                ['type' => 1, 'name' => 'Apartment'],
                ['type' => 2, 'name' => 'Townhouse'],
                ['type' => 3, 'name' => 'Bungalow'],
        ]);
    }
}
