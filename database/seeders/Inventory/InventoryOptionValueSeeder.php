<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryOption;
use Illuminate\Database\Seeder;

class InventoryOptionValueSeeder extends Seeder
{
    public function run()
    {
        $options = InventoryOption::all();

        $option_values = [
            [
                'name' => 'Black',
                'slug' => 'black',
            ],
            [
                'name' => 'White',
                'slug' => 'white',
            ],
            [
                'name' => 'Red',
                'slug' => 'red',
            ],
            [
                'name' => 'Blue',
                'slug' => 'blue',
            ],
            [
                'name' => 'Green',
                'slug' => 'green',
            ],
            [
                'name' => 'Yellow',
                'slug' => 'yellow',
            ],
            [
                'name' => 'Orange',
                'slug' => 'orange',
            ],
            [
                'name' => 'Purple',
                'slug' => 'purple',
            ],
            [
                'name' => 'Pink',
                'slug' => 'pink',
            ],
            [
                'name' => 'Brown',
                'slug' => 'brown',
            ],
            [
                'name' => 'Grey',
                'slug' => 'grey',
            ],
            [
                'name' => 'Silver',
                'slug' => 'silver',
            ]
        ];

        foreach ($options as $option) {
            foreach ($option_values as $option_value) {
                $option->inventoryOptionValues()->create($option_value);
            }
        }
    }
}