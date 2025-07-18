<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
