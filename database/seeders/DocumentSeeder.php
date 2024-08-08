<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\ServiceProvider;
use Faker\Factory as Faker;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $documentTypes = DocumentType::all();
        $properties = Property::all();
        $tenants = Tenant::all();
        $serviceProviders = ServiceProvider::all();

        foreach ($documentTypes as $documentType) {
            for ($i = 0; $i < 10; $i++) {
                Document::create([
                    'title' => $faker->sentence,
                    'file_path' => 'documents/' . $faker->word . '.pdf', //sample files
                    'document_type_id' => $documentType->id,
                    'property_id' => $properties->random()->id ?? null,
                    'tenant_id' => $tenants->random()->id ?? null,
                    'service_provider_id' => $serviceProviders->random()->id ?? null,
                ]);
            }
        }
    }
}
