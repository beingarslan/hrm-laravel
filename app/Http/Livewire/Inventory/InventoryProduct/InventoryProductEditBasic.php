<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;
use App\Http\Livewire\Traits\Inventory\InventoryProduct\InventoryProduct as InventoryProductInventoryProduct;

use Livewire\Component;

class InventoryProductEditBasic extends Component
{    
    protected $listeners = [
        'changeInventoryTypeEvent' => 'changeInventoryTypeEvent',
        'changeInventoryCategoryEvent' => 'changeInventoryCategoryEvent',
    ];

    use InventoryProductInventoryProduct;

    public $product;
    // product properties
    public $name;
    public $sku;
    public $cost_price;
    public $sale_price;
    public $discount_price;
    public $discount_percentage;
    public $product_type_id;
    public $product_category_id;
    public $product_status_id;

    protected $rules = [
        'name' => 'required|max:100',
        'sku' => 'required|max:100',
        'cost_price' => 'required|integer',
        'sale_price' => 'required|integer',
        'discount_price' => 'required|integer',
        'discount_percentage' => 'required|integer',
        'product_type_id' => 'required',
        'product_category_id' => 'required',
        'product_status_id' => 'required'
    ];

    public function mount($product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->cost_price = $product->cost_price;
        $this->sale_price = $product->sale_price;
        $this->discount_price = $product->discount_price;
        $this->discount_percentage = $product->discount_percentage;
        $this->product_type_id = $product->product_type_id;
        $this->product_category_id = $product->product_category_id;
        $this->product_status_id = $product->product_status_id;
    }

    public function save(){
        $this->validate($this->rules);
        $this->product->update([
            'name' => $this->name,
            'sku' => $this->sku,
            'cost_price' => $this->cost_price,
            'sale_price' => $this->sale_price,
            'discount_price' => $this->discount_price,
            'discount_percentage' => $this->discount_percentage,
        ]);
        
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Product updated!'
            ]
        );
    }

    public function changeInventoryTypeEvent($value)
    {
        $this->product->product_type_id = $value;
        $this->product_type_id = $value;
        $this->product->save();

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Product Type updated!'
            ]
        );
    }
    
    public function changeInventoryCategoryEvent($value)
    {
        $this->product->product_category_id = $value;
        $this->product_category_id = $value;
        $this->product->save();
    
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Product category updated!'
            ]
        );
    }
    
    public function changeInventoryStatusEvent($value)
    {
        $this->product->product_status_id = $value;
        $this->product_status_id = $value;
        $this->product->save();
    
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Product Status updated!'
            ]
        );
    }

    public function render()
    {
        return view('livewire.inventory.inventory-product.inventory-product-edit-basic', [
            'inventory_types' => $this->getTypes(),
            'inventory_categories' => $this->getCategories(),
            'inventory_statuses' => $this->getStatuses(),
        ]);
    }
}
