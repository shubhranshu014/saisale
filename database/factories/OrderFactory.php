<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lead;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition()
    {
        $leads = Lead::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        return [
            'lead_id'   => $this->faker->randomElement($leads),
            'productId' => $this->faker->randomElement($products),
            'qty'       => $this->faker->numberBetween(1, 10),
            'status'    => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
