<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();

        if (!$category) {
            $category = Category::create(['name' => 'Umum']);
        }

        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Produk ' . $i,
                'description' => 'Deskripsi untuk Produk ' . $i,
                'price' => rand(10000, 100000),
                'category_id' => $category->id,
                'is_publish' => true,
                'published_at' => now(),
            ]);
        }
    }
}