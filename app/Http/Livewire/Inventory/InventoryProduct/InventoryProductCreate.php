<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;

use App\Http\Livewire\Traits\Inventory\InventoryProduct\InventoryProduct as InventoryProductInventoryProduct;
use App\Models\Inventory\InventoryProduct;
// use App\Http\Livewire\Traits\Inventory\InventoryProduct\InventoryProduct\InventoryProduct;
use Livewire\Component;

class InventoryProductCreate extends Component
{
    use InventoryProductInventoryProduct;

    // product properties
    public $name;
    public $sku;
    public $cost_price;
    public $sale_price;
    public $discount_price;
    public $discount_percentage;
    public $product_type_id;
    public $product_category_id;

    protected $rules = [
        'name' => 'required|max:100',
        'sku' => 'required|max:100',
        'cost_price' => 'required|integer',
        'sale_price' => 'required|integer',
        'discount_price' => 'required|integer',
        'discount_percentage' => 'required|integer',
        'product_type_id' => 'required',
        'product_category_id' => 'required'
    ];



    public function saveInventoryProduct()
    {
        $this->validate();

        try {
            $product = new InventoryProduct();
            $product->name = $this->name;
            $product->sku = $this->sku;
            $product->cost_price = $this->cost_price;
            $product->sale_price = $this->sale_price;
            $product->discount_price = $this->discount_price;
            $product->discount_percentage = $this->discount_percentage;
            $product->product_type_id = $this->product_type_id;
            $product->product_category_id = $this->product_category_id;
            $product->save();
            return $product;
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->resetInput();

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Product added successfully!'
            ]
        );

        
    }
    public function render()
    {
        return view('livewire.inventory.inventory-product.inventory-product-create', [
            'inventory_types' => $this->getTypes(),
            'inventory_categories' => $this->getCategories(),
        ]);
    }
}
