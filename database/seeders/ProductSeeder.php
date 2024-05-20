<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'product1',
            'description' => '',
            'price' => 1000
        ]);
        Product::create([
            'name' => 'product2',
            'description' => '',
            'price' => 10000
        ]);
        Product::create([
            'name' => 'product3',
            'description' => '',
            'price' => 100000
        ]);
    }
}
