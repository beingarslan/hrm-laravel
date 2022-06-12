<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryType;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // inventory_types
        $inventory_types = [
            [
                'name' => 'Inventory Type 1',
                'slug' => 'inventory-type-1',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 2',
                'slug' => 'inventory-type-2',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 3',
                'slug' => 'inventory-type-3',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 4',
                'slug' => 'inventory-type-4',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 5',
                'slug' => 'inventory-type-5',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 6',
                'slug' => 'inventory-type-6',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 7',
                'slug' => 'inventory-type-7',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Type 8',
                'slug' => 'inventory-type-8',
                'description' => $faker->text,
            ],
        ];

        $types = InventoryType::insert($inventory_types);
    }
}
