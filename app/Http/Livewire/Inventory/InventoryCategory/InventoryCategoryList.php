<?php

namespace App\Http\Livewire\Inventory\InventoryCategory;

use App\Models\Inventory\InventoryCategory;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryCategoryList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryCategoryList()
    {
        $categories =  InventoryCategory::query();

        if (!empty($this->name)){
            $categories = $categories->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $categories = $categories->orderBy('name', 'desc')->with('parent');
        
        return $categories->paginate(20);
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
        $categories = $this->filterInventoryCategoryList();
        $data = ['categories' => $categories];
        return view('livewire.inventory.inventory-category.inventory-category-list', $data);
    }
}
