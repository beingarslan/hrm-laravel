<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryBrand;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $brands = [
            [
                'name' => 'Adidas',
                'slug' => 'adidas',
                'description' => $faker->text,
            ],
            [
                'name' => 'Nike',
                'slug' => 'nike',
                'description' => $faker->text,
            ],
            [
                'name' => 'Puma',
                'slug' => 'puma',
                'description' => $faker->text,
            ],
            [
                'name' => 'Reebok',
                'slug' => 'reebok',
                'description' => $faker->text,
            ],
            [
                'name' => 'New Balance',
                'slug' => 'new-balance',
                'description' => $faker->text,
            ],
            [
                'name' => 'Asics',
                'slug' => 'asics',
                'description' => $faker->text,
            ],
            [
                'name' => 'Vans',
                'slug' => 'vans',
                'description' => $faker->text,
            ],
            [
                'name' => 'Converse',
                'slug' => 'converse',
                'description' => $faker->text,
            ],
            [
                'name' => 'Fila',
                'slug' => 'fila',
                'description' => $faker->text,
            ],
            [
                'name' => 'Skechers',
                'slug' => 'skechers',
                'description' => $faker->text,
            ],            
            [
                'name' => 'Brooks',
                'slug' => 'brooks',
                'description' => $faker->text,
            ]
        ];

        InventoryBrand::insert($brands);
    }
}
