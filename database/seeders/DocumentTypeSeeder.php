<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_types')->insert([
            ['name' => 'Property Documents'],
            ['name' => 'Lease Agreements'],
            ['name' => 'Maintenance Records'],
            ['name' => 'LC letters'],
            ['name' => 'Bio-data: Work Info'],
        ]);
    }
}
