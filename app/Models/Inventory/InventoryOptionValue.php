<?php

namespace App\Models\Inventory;

use App\Models\Inventory\InventoryProduct\InventoryProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOptionValue extends Model
{
    use HasFactory;
    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    public function inventory_option()
    {
        return $this->belongsTo(InventoryOption::class, 'inventory_option_id', 'id');
    }

    public function inventoryProductVariations()
    {
        return $this->hasMany(InventoryProductVariation::class, 'inventory_option_value_id', 'id');
    }

    // relationship with the inventory product
    public function inventoryProduct()
    {
        return $this->belongsToMany(
            InventoryProduct::class,
            InventoryProductVariation::class,
            'inventory_option_value_id',
            'product_id'
        );
    }
}
