<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryShop;
use Faker\Factory;
use Illuminate\Database\Seeder;

class InventoryShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $shops = [
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ],
           [
               'name' => $faker->company,
                'slug' => $faker->slug,
                'description' => $faker->text,
           ]
           ];

           InventoryShop::insert($shops);

    }
}
