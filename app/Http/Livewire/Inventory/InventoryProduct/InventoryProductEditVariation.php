<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;

use App\Models\Inventory\InventoryOption;
use App\Models\Inventory\InventoryOptionValue;
use App\Models\Inventory\InventoryProduct\InventoryProductVariation;
use Livewire\Component;

class InventoryProductEditVariation extends Component
{
    public $product;

    public $variations;
    public $inventoryOptions;
    public $inventoryOptionValues;

    // FORM MEMBERS 
    public $selected_variation_option_id;
    public $selected_variation_option_value_id;

    // listeners 
    protected $listeners = ['removeVariation' => 'removeVariation'];

    // rules
    protected $rules = [
        'selected_variation_option_id' => 'required',
        'selected_variation_option_value_id' => 'required'
    ];

    public function save()
    {
        // validate data
        $this->validate($this->rules);

        // check if veriation aready exists
        if (
            $this->product->inventoryProductVariations()
            ->where('inventory_option_id', $this->selected_variation_option_id)
            ->where('inventory_option_value_id', $this->selected_variation_option_value_id)
            ->exists()
        ) {
            // display error message
            $this->dispatchBrowserEvent(
                'alert',
                [
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'Variation already exists!'
                ]
            );
        } else {
            // add new veriation agonst the product
            $this->product->inventoryProductVariations()->create([
                'inventory_option_id' => $this->selected_variation_option_id,
                'inventory_option_value_id' => $this->selected_variation_option_value_id,
            ]);

            // display success message
            $this->dispatchBrowserEvent(
                'alert',
                [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => 'Variation added!'
                ]
            );

            // load latest variatins again
            $this->getVariations();
        }
    }

    public function getinventoryOptionValues($value)
    {
        $this->selected_variation_option_id = $value;
        $this->inventoryOptionValues = [];
        $this->inventoryOptionValues = InventoryOptionValue::where('inventory_option_id', $value)->get();
        return $this->inventoryOptionValues;
    }

    public function changeVariationEvent($value)
    {
        $this->selected_variation_option_value_id = $value;
    }

    public function getVariations()
    {
        $this->variations = InventoryProductVariation::where('product_id', $this->product->id)
            ->with('inventoryOptionValue', 'inventoryOption')
            ->orderBy('id', 'desc')
            ->get();
        return $this->variations;
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->inventoryOptions = InventoryOption::with('inventoryProductVariations')->get();
        $this->variations = $this->getVariations();
        $this->inventoryOptionValues = [];
    }

    public function remove($id)
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'You want to remove variation!',
                'method_name' => 'removeVariation',
                'method_params' => [$id]
            ]
        );
    }

    public function removeVariation($id)
    {
        $variation = InventoryProductVariation::where('id', $id);
        $variation->delete();
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Variation removed!'
            ]
        );
        $this->getVariations();
    }

    public function render()
    {
        return view('livewire.inventory.inventory-product.inventory-product-edit-variation');
    }
}
