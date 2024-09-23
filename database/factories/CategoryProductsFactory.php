<?php

namespace Database\Factories;

use App\Models\CategoryProducts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
class CategoryProductsFactory extends Factory
{
    protected $model = CategoryProducts::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('ru_RU');
        return [
            'name' => $faker->name(),
        ];
    }
}
