<?php

namespace App\Http\Livewire\Inventory\InventoryBrand;

use App\Models\Inventory\InventoryBrand;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryBrandList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryBrandList()
    {
        $brands =  InventoryBrand::query();

        if (!empty($this->name)){
            $brands = $brands->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $brands = $brands->orderBy('name', 'desc');
        
        return $brands->paginate(20);
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
        $brands = $this->filterInventoryBrandList();
        $data = ['brands' => $brands];
        return view('livewire.inventory.inventory-brand.inventory-brand-list', $data);
    }
}
