<?php

namespace Database\Seeders;

use App\Models\CategoryProducts;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        CategoryProducts::factory()
            ->count(5)->hasProducts(5)
            ->create();
    }
}
