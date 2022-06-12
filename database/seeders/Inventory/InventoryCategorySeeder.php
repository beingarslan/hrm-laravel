<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // inventory_categories
        $inventory_categories = [];
        for ($i=0; $i < 30; $i++) { 
            $inventory_categories[] = [
                'name' => $faker->word,
                'slug' => $faker->slug,
                'description' => $faker->text,
                'parent_id' => rand(0,1) ? null : ( $i > 1 ? rand( 1, $i ) : null), 
            ];
        }
        InventoryCategory::insert($inventory_categories);
    }
}
