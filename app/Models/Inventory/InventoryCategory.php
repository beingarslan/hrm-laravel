<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    use HasFactory;

    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');
        parent::__construct($attributes);
    }

    public function parent()
    {
        return $this->belongsTo(InventoryCategory::class, 'parent_id', 'id');
    }
    public function child()
    {
        return $this->hasMany(InventoryCategory::class, 'parent_id', 'id');
    }

    // public function sub_categories()
    // {
    //     return $this->belongsToMany(InventoryCategory::class, 'inventory_category_relations', 'parent_id', 'child_id');
    // }

    public function inventoryProduct(){
        return $this->hasMany(InventoryProduct::class, 'product_category_id', 'id');
    }
}
