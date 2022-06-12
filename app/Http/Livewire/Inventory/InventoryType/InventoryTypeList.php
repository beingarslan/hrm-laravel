<?php

namespace App\Http\Livewire\Inventory\InventoryType;

use App\Models\Inventory\InventoryType;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryTypeList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryTypeList()
    {
        $types =  InventoryType::query();

        if (!empty($this->name)){
            $types = $types->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $types = $types->orderBy('name', 'desc');
        
        return $types->paginate(20);
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
        $types = $this->filterInventoryTypeList();
        $data = ['types' => $types];
        return view('livewire.inventory.inventory-type.inventory-type-list', $data);
    }
}
