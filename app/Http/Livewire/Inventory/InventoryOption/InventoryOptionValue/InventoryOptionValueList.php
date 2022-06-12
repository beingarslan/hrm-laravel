<?php

namespace App\Http\Livewire\Inventory\InventoryOption\InventoryOptionValue;

use App\Models\Inventory\InventoryOption;
use App\Models\Inventory\InventoryOptionValue;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryOptionValueList extends Component
{

    use WithPagination;
    public $name, $option_id;

    public function filterInventoryOptionValueList()
    {
        $values =  InventoryOptionValue::query();

        $values = $values->where('inventory_option_id', $this->option_id);

        if (!empty($this->name)) {
            $values = $values->where(function ($query) {
                $query->where('name', 'like',  '%' . $this->name . '%')
                ->orWhere('slug', 'like',  '%' . $this->name . '%');
            });
        }

        // order by
        $values = $values->orderBy('name', 'desc')->with('inventory_option');

        return $values->paginate(20);
    }

    // public $categories;
    public function mount($option_id = null)
    {
        $this->option_id = $option_id;
    }
    // setPage
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
    public function render()
    {
        $values = $this->filterInventoryOptionValueList();
        $data = ['values' => $values];
        return view('livewire.inventory.inventory-option.inventory-option-value.inventory-option-value-list', $data);
    }
}
