<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;

use Livewire\Component;

class InventoryProductEdit extends Component
{
    public $product;

    public $view = [];

    public function mount($product)
    {
        $this->product = $product;
        $this->view = [
            'inventory-product-edit-basic' => true,
            'inventory-product-edit-media' => false,
            'inventory-product-edit-seo' => false,
            'inventory-product-edit-variation' => false,
        ];        
    }

    public function changeTab($tab)
    {
        if(array_key_exists($tab, $this->view)) {
            foreach($this->view as $key => $value) {
                $this->view[$key] = false;
            }
            $this->view[$tab] = true;
        }
    }
    public function render()
    {
        return view('livewire.inventory.inventory-product.inventory-product-edit');
    }
}
