<?php

namespace App\Models\Inventory\InventoryProduct;

use App\Models\Inventory\InventoryOption;
use App\Models\Inventory\InventoryOptionValue;
use App\Models\Inventory\InventoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProductVariation extends Model
{
    use HasFactory;

    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    public function inventoryProduct()
    {
        return $this->belongsTo(InventoryProduct::class, 'product_id', 'id');
    }

    public function inventoryOption()
    {
        return $this->belongsTo(InventoryOption::class, 'inventory_option_id', 'id');
    }
    
    public function inventoryOptionValue()
    {
        return $this->belongsTo(InventoryOptionValue::class, 'inventory_option_value_id', 'id');
    }
}
