<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Lead;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $leads = Lead::all();
        $products = Product::all();

        if ($leads->count() === 0 || $products->count() === 0) {
            $this->command->info('No leads or products found. Skipping orders seeding.');
            return;
        }

        foreach ($leads as $lead) {
            $numProducts = rand(1, min(5, $products->count())); // <- fixed
            $selectedProducts = $products->random($numProducts);

            foreach ($selectedProducts as $product) {
                Order::create([
                    'lead_id'   => $lead->id,
                    'productId' => $product->id,
                    'qty'       => rand(1, 10),
                    'status'    => ['pending', 'approved', 'rejected'][array_rand(['pending', 'approved', 'rejected'])],
                ]);
            }
        }
    }
}
