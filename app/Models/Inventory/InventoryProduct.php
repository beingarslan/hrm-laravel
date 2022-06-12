<?php

namespace App\Models\Inventory;

use App\Models\Inventory\InventoryProduct\InventoryProductSeo;
use App\Models\Inventory\InventoryProduct\InventoryProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProduct extends Model
{
    use HasFactory;
    
    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    // relationship with InventoryProductSeo
    public function inventoryProductSeo()
    {
        return $this->hasOne(InventoryProductSeo::class, 'product_id', 'id');
    }

    // relationship with InventoryProductVariation
    public function inventoryProductVariations()
    {
        return $this->hasMany(InventoryProductVariation::class, 'product_id', 'id');
    }

    // relationship with InventoryProductOptionValue
    public function inventoryProductOptionValues()
    {
        return $this->belongsToMany(
            InventoryOptionValue::class,
            InventoryProductVariation::class,
            'product_id',
            'inventory_option_value_id'
        );
    }

    // relationship category
    public function inventoryCategory(){
        return $this->belongsTo(InventoryCategory::class, 'product_category_id', 'id');
    }

    // relationship types
    public function inventoryType(){
        return $this->belongsTo(inventoryType::class, 'product_type_id', 'id');
    }

    // relationship status
    public function inventoryStatus(){
        return $this->belongsTo(InventoryStatus::class, 'product_status_id', 'id');
    }

    // relationship with InventoryUniqueProduct
    public function inventoryUniqueProduct()
    {
        return $this->hasMany(InventoryUniqueProduct::class, 'product_id', 'id');
    }
}
