<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;

use Livewire\Component;

class InventoryProductEditSeo extends Component
{
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
    public $product_id;

    protected $rules = [
        'title' => 'required|max:100',
        'description' => 'required|max:100',
        'keywords' => 'required',
        'tags' => 'required'
    ];

    public function mount($product)
    {
        $this->product = $product;
        $this->title = $product->inventoryProductSeo?->title;
        $this->description = $product->inventoryProductSeo?->description;
        $this->keywords = $product->inventoryProductSeo?->keywords;
        $this->tags = $product->inventoryProductSeo?->tags;
        $this->product_id = $product->id;
    }

    public function render()
    {
        return view('livewire.inventory.inventory-product.inventory-product-edit-seo');
    }

    public function save(){
        $this->validate($this->rules);
        $this->product->inventoryProductSeo()->updateOrCreate(
            ['product_id' => $this->product->id],
            [
                'title' => $this->title,
                'description' => $this->description,
                'keywords' => $this->keywords,
                'tags' => $this->tags,
            ]
        );
        
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'SEO updated!'
            ]
        );
    }
}
