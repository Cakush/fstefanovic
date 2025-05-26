<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Makaze',
            'description' => 'Description 1',
            'price' => 100,
            'category_id' => 1,
            'user_id' => 2,
        ]);
        Product::create([
            'name' => "L'Oreal",
            'description' => 'Description 2',
            'price' => 200,
            'category_id' => 2,
            'user_id' => 3,
        ]);
        Product::create([
            'name' => 'Kiepe',
            'description' => 'Description 3',
            'price' => 300,
            'category_id' => 3,
            'user_id' => 4,
        ]);
        Product::create([
            'name' => 'Panasonic',
            'description' => 'Description 4',
            'price' => 400,
            'category_id' => 4,
            'user_id' => 5,
        ]);
        Product::create([
            'name' => 'SPA Natural',
            'description' => 'Description 5',
            'price' => 500,
            'category_id' => 5,
            'user_id' => 1,
        ]);
    }
}
