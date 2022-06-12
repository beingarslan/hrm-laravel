<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryCategory;
use App\Models\Inventory\InventoryProduct;
use App\Models\Inventory\InventoryType;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $types = InventoryType::all();
        $category = InventoryCategory::all();

        $products = [
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
            [
                'name' => $faker->name,
                'sku' => $faker->word(). $faker->unique()->numberBetween(1, 100),
                'description' => $faker->text,
                'cost_price' => rand(2, 100),
                'sale_price' => rand(2, 100),
                'discount_price' => rand(2, 100),
                'discount_percentage' => $faker->numberBetween(1, 100),
                'product_type_id' => $types->random()->id,
                'product_category_id' => $category->random()->id,
            ],
        ];

        InventoryProduct::insert($products);
    }
}
