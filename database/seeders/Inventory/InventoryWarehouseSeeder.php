<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryWarehouse;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $warehouses = [
            [
                'name' => 'Warehouse 1',
                'slug' => 'warehouse-1',
                'description' => $faker->text(100),
            ],
            [
                'name' => 'Warehouse 2',
                'slug' => 'warehouse-2',
                'description' => $faker->text(100),
            ],
            [
                'name' => 'Warehouse 3',
                'slug' => 'warehouse-3',
                'description' => $faker->text(100),
            ],
            [
                'name' => 'Warehouse 4',
                'slug' => 'warehouse-4',
                'description' => $faker->text(100),
            ],
            [
                'name' => 'Warehouse 5',
                'slug' => 'warehouse-5',
                'description' => $faker->text(100),
            ],
        ];

        InventoryWarehouse::insert($warehouses);
    }
}
