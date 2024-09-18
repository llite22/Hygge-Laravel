<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = DB::table('category_products')->pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            DB::table('products')->insert([
                'category_id' => $faker->randomElement($categoryIds),
                'name' => $faker->word(),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 10, 20000),
                'image' => $faker->imageUrl(640, 480, 'product', true, 'Faker'),
                'quantity' => $faker->numberBetween(1, 500),
                'available' => $faker->boolean(),
                'delivery_date' => $faker->dateTimeBetween('now', '+30 days'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
