<?php

namespace App\Http\Livewire\Inventory\InventoryStatus;

use App\Models\Inventory\InventoryStatus;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryStatusList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryStatusList()
    {
        $statuses =  InventoryStatus::query();

        if (!empty($this->name)){
            $statuses = $statuses->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $statuses = $statuses->orderBy('name', 'desc');
        
        return $statuses->paginate(20);
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
        $statuses = $this->filterInventoryStatusList();
        $data = ['statuses' => $statuses];
        return view('livewire.inventory.inventory-status.inventory-status-list', $data);
    }
}
