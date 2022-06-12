<?php

namespace App\Models\Inventory\InventoryProduct;

use App\Models\Inventory\InventoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProductSeo extends Model
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
}
