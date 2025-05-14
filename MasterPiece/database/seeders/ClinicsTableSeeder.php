<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('clinics')->truncate();

        DB::table('clinics')->insert([
            [
                'name' => 'Laboratory Services',
                'contact_number' => '077 012 3456',
                'facilities' => 'Various laboratory tests and procedures',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Laboratory services for various health checks.',
                'deleted_at' => null,
                'icon' => 'icofont-laboratory'
            ],
            [
                'name' => 'Heart Disease',
                'contact_number' => '077 023 4567',
                'facilities' => 'Cardiology tests and procedures',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Cardiac care and disease prevention services.',
                'deleted_at' => null,
                'icon' => 'icofont-heart-beat-alt'
            ],
            [
                'name' => 'Dental Care',
                'contact_number' => '077 034 5678',
                'facilities' => 'General dentistry and cosmetic dentistry',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'General and cosmetic dental treatments and procedures.',
                'deleted_at' => null,
                'icon' => 'icofont-tooth'
            ],
            [
                'name' => 'Body Surgery',
                'contact_number' => '077 045 6789',
                'facilities' => 'Surgical procedures for body enhancement and reconstruction',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Surgical operations for improving body functions and aesthetics.',
                'deleted_at' => null,
                'icon' => 'icofont-crutch'
            ],
            [
                'name' => 'Neurological Surgery',
                'contact_number' => '077 056 7890',
                'facilities' => 'Neurological surgeries and consultations',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Surgical treatment for neurological conditions.',
                'deleted_at' => null,
                'icon' => 'icofont-brain-alt'
            ],
            [
                'name' => 'Gynecology',
                'contact_number' => '077 067 8901',
                'facilities' => 'Women’s health and gynecological care',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Comprehensive women’s health services, including reproductive health.',
                'deleted_at' => null,
                'icon' => 'icofont-dna-alt-1'
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
