<?php

namespace App\Http\Livewire\Inventory\InventoryOption;

use App\Models\Inventory\InventoryOption;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryOptionList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryOptionList()
    {
        $options =  InventoryOption::query();

        if (!empty($this->name)){
            $options = $options->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $options = $options->orderBy('name', 'desc');
        
        return $options->paginate(20);
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
        $options = $this->filterInventoryOptionList();
        $data = ['options' => $options];
        return view('livewire.inventory.inventory-option.inventory-option-list', $data);
    }
}
