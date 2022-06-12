<?php

namespace App\Http\Livewire\Inventory\InventoryWarehouse;

use App\Models\Inventory\InventoryWarehouse;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryWarehouseList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryStatusList()
    {
        $houses =  InventoryWarehouse::query();

        if (!empty($this->name)){
            $houses = $houses->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $houses = $houses->orderBy('name', 'desc');
        
        return $houses->paginate(20);
    }

    // public $categories;
    public function mount()
    {
        // dd($this->categories);
    }
    // setPage
    public function setPage($url){
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    public function render()
    {
        $houses = $this->filterInventoryStatusList();
        $data = ['houses' => $houses];
        return view('livewire.inventory.inventory-warehouse.inventory-warehouse-list', $data);
    }
}
