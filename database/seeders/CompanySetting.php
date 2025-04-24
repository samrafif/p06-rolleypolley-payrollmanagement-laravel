<?php

namespace Database\Seeders;

use App\Models\CompanySetting as ModelsCompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsCompanySetting::factory()->create([
            'name' => 'PT Rumput Abdullah Jaya Abadi',
            'description' => 'Abdullah Yasir\'s very successful feed business',
            'address' => 'Balls st, Bollocks ave, 1298',
            'phone' => '+62 23028398289392',
        ]);
    }
}
