<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $order = new Order();
        $order -> delivery_address = 'Cra 52';
        $order -> description = 'Piso 2"';
        $order -> total = '8000';
        $order -> user_id = 1;
        $order -> product_id = 1;

        $order -> save();
    }
}
