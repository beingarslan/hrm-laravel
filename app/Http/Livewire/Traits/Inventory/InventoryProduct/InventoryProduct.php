<?php

namespace App\Http\Livewire\Traits\Inventory\InventoryProduct;

use App\Models\Inventory\InventoryCategory;
use App\Models\Inventory\InventoryStatus;
use App\Models\Inventory\InventoryType;
use Livewire\Component;


trait InventoryProduct
{
    public function getCategories()
    {
        return InventoryCategory::all();
    }
    
    public function getTypes()
    {
        return InventoryType::all();
    }

    public function getStatuses()
    {
        return InventoryStatus::all();
    }

}