<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobListing;
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
        User::factory(5000)->create();
        $users = User::all()->take(100)->shuffle();
        for ($x = 0; $x <= 100; $x++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all()->shuffle();

        for ($x = 0; $x <= 700; $x++) {
            JobListing::factory()->create([
                "employer_id" => $employers->random()->id
            ]);
        }

        JobListing::factory(500)->create();
    }
}
