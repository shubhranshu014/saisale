<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;

class Leads extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::pluck('id'); // Get all user IDs

        if ($users->isEmpty()) {
            $this->command->warn('No users found. Skipping LeadSeeder.');
            return;
        }

        foreach (range(1, 20) as $index) {
            DB::table('leads')->insert([
                'user_id' => $faker->randomElement($users),
                'date' => $faker->date(),
                'name' => $faker->name,
                'business_name' => $faker->company,
                'mobile' => $faker->phoneNumber,
                'email' => $faker->optional()->safeEmail,
                'address' => $faker->address,
                'status' => $faker->randomElement(['new', 'in_progress', 'closed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
