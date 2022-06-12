<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\InventoryStatus;
use Illuminate\Database\Seeder;

class InventoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Available',
                'slug' => 'available',
                'description' => 'Product is available for sale',
            ],
            [
                'name' => 'Sold',
                'slug' => 'sold',
                'description' => 'Product is sold',
            ],
            [
                'name' => 'Damaged',
                'slug' => 'damaged',
                'description' => 'Product is damaged',
            ],
            [
                'name' => 'Lost',
                'slug' => 'lost',
                'description' => 'Product is lost',
            ],
        ];
        $statuses = InventoryStatus::insert($statuses);
    }
}
