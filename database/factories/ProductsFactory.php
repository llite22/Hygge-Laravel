<?php

namespace Database\Factories;

use App\Models\CategoryProducts;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('ru_RU');
        return [
            'category_id' => CategoryProducts::factory(),
            'name' => $faker->word(),
            'description' => $faker->paragraph(),
            'price' => $faker->randomFloat(2, 10, 20000),
            'image' => $faker->imageUrl(640, 480, 'product', true, 'Faker'),
            'quantity' => $faker->numberBetween(1, 500),
            'available' => $faker->boolean(),
            'delivery_date' => $faker->dateTimeBetween('now', '+30 days'),
        ];
    }
}
