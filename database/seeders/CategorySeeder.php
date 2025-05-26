<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Alat za šišanje'
        ]);
        Category::create([
            'name' => 'Šampon'
        ]);
        Category::create([
            'name' => 'Češalj'
        ]);
        Category::create([
            'name' => 'Fen za kosu'
        ]);
        Category::create([
            'name' => 'Stolice'
        ]);
        
    }
}
