<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => "Product A",
                'description' => "This is Product A",
                'price' => 1000
            ],
            [
                'name' => "Product B",
                'description' => "This is Product B",
                'price' => 2000
            ],
            [
                'name' => "Product C",
                'description' => "This is Product C",
                'price' => 3000
            ],
            [
                'name' => "Product D",
                'description' => "This is Product D",
                'price' => 4000
            ],
            [
                'name' => "Product E",
                'description' => "This is Product E",
                'price' => 5000
            ]
        ];

        foreach($products as $product)
        {
            Product::create($product);
        }
    }
}
