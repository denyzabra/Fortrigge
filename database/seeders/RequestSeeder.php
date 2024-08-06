<?php

// database/seeders/RequestSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Request;

class RequestSeeder extends Seeder
{
    public function run()
    {
        Request::factory()->count(10)->create();
    }
}
