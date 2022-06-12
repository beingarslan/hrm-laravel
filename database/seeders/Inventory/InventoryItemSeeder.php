<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryItem;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // inventory_items
        $inventory_items = [
            [
                'name' => 'Inventory Item 1',
                'slug' => 'inventory-item-1',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 2',
                'slug' => 'inventory-item-2',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 3',
                'slug' => 'inventory-item-3',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 4',
                'slug' => 'inventory-item-4',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 5',
                'slug' => 'inventory-item-5',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 6',
                'slug' => 'inventory-item-6',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 7',
                'slug' => 'inventory-item-7',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 8',
                'slug' => 'inventory-item-8',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 9',
                'slug' => 'inventory-item-9',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 10',
                'slug' => 'inventory-item-10',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Item 11',
                'slug' => 'inventory-item-11',
                'description' => $faker->text,
            ]
        ];

        $items = InventoryItem::insert($inventory_items);
    }
}
