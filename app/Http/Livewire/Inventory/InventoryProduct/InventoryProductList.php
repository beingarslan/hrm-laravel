<?php

namespace App\Http\Livewire\Inventory\InventoryProduct;

use App\Models\Inventory\InventoryCategory;
use App\Models\Inventory\InventoryProduct;
use App\Models\Inventory\InventoryStatus;
use App\Models\Inventory\InventoryType;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryProductList extends Component
{
    use WithPagination;
    public $name;
    public $product_type_id;
    public $product_category_id;
    public $product_status_id;

    public function filterInventoryProductList()
    {
        $products =  InventoryProduct::query();

        if (!empty($this->name)) {
            $products = $products->where('name', 'like',  '%' . $this->name . '%');
        }

        // product_type_id
        if (!empty($this->product_type_id)) {
            $products = $products->where('product_type_id', $this->product_type_id);
        }

        // product_category_id
        if (!empty($this->product_category_id)) {
            $products = $products->where('product_category_id', $this->product_category_id);
        }

        // product_status_id
        if (!empty($this->product_status_id)) {
            $products = $products->where('product_status_id', $this->product_status_id);
        }

        $products = $products->with(['inventoryCategory', 'inventoryType', 'inventoryStatus']);
        // order by
        $products = $products->orderBy('name', 'desc');

        return $products->paginate(20);
    }

    // public $categories;
    public function mount()
    {
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

        $product_types = InventoryType::all();
        $categories = InventoryCategory::all();
        $statuses = InventoryStatus::all();
        $data = [
            'products' => $products,
            'product_types' => $product_types,
            'categories' => $categories,
            'statuses' => $statuses,
        ];
        return view('livewire.inventory.inventory-product.inventory-product-list', $data);
    }
}
