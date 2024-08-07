<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the UserTableSeeder
        // $this->call();
        $this->call([
            UserTableSeeder::class,
            HousingTypesSeeder::class,
            LandTypesSeeder::class,
            PropertySeeder::class,
            TenantSeeder::class,
            TaskSeeder::class,
        ]);


    }
}
