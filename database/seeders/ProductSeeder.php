<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = DB::table('category_products')->pluck('id')->toArray();;
        $products = [
            [
                'name' => 'Телевизор',
                'category_id' => $categoryIds[0],
                'price' => 11999.99,
                'quantity' => 50,
                'delivery_date' => now()->addDays(7),
            ],
            [
                'name' => 'Пиджак',
                'category_id' => $categoryIds[1],
                'price' => 999.99,
                'quantity' => 100,
                'delivery_date' => now()->addDays(3),
            ]


        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => 'Описание продукта',
                'price' => $product['price'],
                'image' => 'test',
                'quantity' => $product['quantity'],
                'available' => true,
                'delivery_date' => $product['delivery_date'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
