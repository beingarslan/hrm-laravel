<?php

namespace App\Http\Livewire\Inventory\InventoryShop;

use App\Models\Inventory\InventoryShop;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryShopList extends Component
{
    use WithPagination;
    public $name;

    public function filterInventoryShopList()
    {
        $shops =  InventoryShop::query();

        if (!empty($this->name)){
            $shops = $shops->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $shops = $shops->orderBy('name', 'desc');
        
        return $shops->paginate(20);
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
        $shops = $this->filterInventoryShopList();
        $data = ['shops' => $shops];
        return view('livewire.inventory.inventory-shop.inventory-shop-list', $data);
    }
}
