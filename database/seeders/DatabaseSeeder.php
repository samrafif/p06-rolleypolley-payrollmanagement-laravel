<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Pookie',
            'email' => 'admin@rumputabdul.com',
            'password' => bcrypt('qwertyuiop'),
            'is_admin' => True,
        ]);

        CompanySetting::factory()->create([
            'name' => 'PT Rumput Abdullah Jaya Abadi',
            'description' => 'Abdullah Yasir\'s very successful feed business',
            'address' => 'Balls st, Bollocks ave, 1298',
            'phone' => '+62 23028398289392',
        ]);
    }
}
