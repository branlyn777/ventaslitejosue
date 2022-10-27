<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'LARAVEL Y LIVEWIRE',
            'barcode' => '75010065987',
            'cost' => 200,
            'price' => 350,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);
        Product::create([
            'name' => 'RUNNING NKE',
            'barcode' => '7609872014',
            'cost' => 600,
            'price' => 1500,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'IPHONE 11',
            'cost' => 900,
            'price' => 1400,
            'barcode' => '7709876541',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 3,
            'image' => 'iphone11.png'
        ]);
        Product::create([
            'name' => 'PC GAMMER',
            'barcode' => '790654812',
            'cost' => 790,
            'price' => 1350,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 4,
            'image' => 'pcgamer.png'
        ]);
    }
}
