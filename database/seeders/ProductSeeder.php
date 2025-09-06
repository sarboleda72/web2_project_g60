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
        $product = new Product;
        $product -> name = "Papas de limón";
        $product -> price = "8000";
        $product -> description = "Margarita";
        $product -> available = true;

        $product -> save();
    }
}
