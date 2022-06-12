<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryStatus extends Model
{
    use HasFactory;
    
    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    // 

    public function inventoryProducts()
    {
        return $this->hasMany(InventoryProduct::class, 'product_status_id', 'id');
    }

    public function inventoryUniqueProducts()
    {
        return $this->hasMany(InventoryUniqueProduct::class, 'product_status_id', 'id');
    }
}
