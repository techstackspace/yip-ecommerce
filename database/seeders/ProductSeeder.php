<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ THIS stays at the top, outside the class
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 🚨 Truncate table before inserting to avoid duplicate/old images
        DB::table('products')->truncate();

        Product::insert([
            [
                'name' => 'Laravel Shirt',
                'description' => 'Comfortable Laravel-branded shirt.',
                'price' => 5000,
                'image' => 'images/laravel-shirt.jpg'
            ],
            [
                'name' => 'PHP Mug',
                'description' => 'Ceramic mug for developers.',
                'price' => 2500,
                'image' => 'images/php-mug.webp'
            ],
            [
                'name' => 'Framework Stickers',
                'description' => 'Sticker set for your laptop.',
                'price' => 1500,
                'image' => 'images/framework-stickers.webp'
            ],
        ]);
    }
}
