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
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@mail.com'
        ]);
        User::factory(50)->create();
        $users = User::all()->take(20)->shuffle();
        for ($x = 0; $x < 20; $x++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all()->shuffle();

        for ($x = 0; $x < 50; $x++) {
            JobListing::factory()->create([
                "employer_id" => $employers->random()->id
            ]);
        }
    }
}
