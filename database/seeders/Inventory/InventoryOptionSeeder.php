<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryOption;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        // inventory_options
        $inventory_options = [
            [
                'name' => 'Inventory Option 1',
                'slug' => 'inventory-option-1',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 2',
                'slug' => 'inventory-option-2',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 3',
                'slug' => 'inventory-option-3',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 4',
                'slug' => 'inventory-option-4',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 5',
                'slug' => 'inventory-option-5',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 6',
                'slug' => 'inventory-option-6',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 7',
                'slug' => 'inventory-option-7',
                'description' => $faker->text,
            ],
            [
                'name' => 'Inventory Option 8',
                'slug' => 'inventory-option-8',
                'description' => $faker->text,
            ],
        ];
        
        $options = InventoryOption::insert($inventory_options);
    }
}
