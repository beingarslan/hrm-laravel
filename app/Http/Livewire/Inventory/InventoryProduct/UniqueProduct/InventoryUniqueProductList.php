<?php

namespace App\Http\Livewire\Inventory\InventoryProduct\UniqueProduct;

use App\Models\Inventory\InventoryStatus;
use App\Models\Inventory\InventoryUniqueProduct;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryUniqueProductList extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    
    use WithPagination;
    public $serial_no;
    public $product_status_id;

    public function filterInventoryProductList()
    {
        $products =  InventoryUniqueProduct::where('product_id', $this->product->id);

        if (!empty($this->serial_no)) {
            $products = $products->where('serial_no', 'like',  '%' . $this->serial_no . '%');
        }

        // product_status_id
        if (!empty($this->product_status_id)) {
            $products = $products->where('product_status_id', $this->product_status_id);
        }

        // order by
        $products = $products->orderBy('created_at', 'desc');

        // inventoryStatus
        $products = $products->with(['inventoryStatus']);

        return $products->paginate(20);
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
        $products = $this->filterInventoryProductList();

        $statuses = InventoryStatus::all();
        $data = [
            'products' => $products,
            'statuses' => $statuses,
        ];
        return view('livewire.inventory.inventory-product.unique-product.inventory-unique-product-list', $data);
    }
}
