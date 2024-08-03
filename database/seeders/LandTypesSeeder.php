<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class LandTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('land_types')->insert([
            ['type' => 1, 'name' => 'Farm Land'],
            ['type' => 2, 'name' => 'Commercial Land'],
            ['type' => 3, 'name' => 'Residential Land'],
            
        ]);
    }
}
