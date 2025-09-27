<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Lead;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $leadIds = Lead::pluck('id');
        $productIds = Product::pluck('id');

        if ($leadIds->isEmpty() || $productIds->isEmpty()) {
            $this->command->warn('No leads or products found. Skipping OrderSeeder.');
            return;
        }

        foreach (range(1, 30) as $i) {
            DB::table('orders')->insert([
                'lead_id' => $faker->randomElement($leadIds),
                'productId' => $faker->randomElement($productIds),
                'qty' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
