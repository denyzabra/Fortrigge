<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    /**
     * Seed the document_types table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            ['name' => 'property'],
            ['name' => 'lease'],
            ['name' => 'maintenance'],
            ['name' => 'lc'],
            ['name' => 'biodata'],
        ]);
    }
}
