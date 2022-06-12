<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryProduct;
use App\Http\Requests\Inventory\StoreInventoryProductRequest;
use App\Http\Requests\Inventory\UpdateInventoryProductRequest;
use App\Models\Inventory\InventoryCategory;
use App\Models\Inventory\InventoryStatus;
use App\Models\Inventory\InventoryType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class InventoryProductController extends Controller
{
    public function index()
    {
        Helper::checkPermission('view-inventory-products');
        
        return view('modules.inventory.product.index');
    }

    public function create()
    {
        Helper::checkPermission('add-inventory-products');

        $inventory_types = InventoryType::all();
        $inventory_categories = InventoryCategory::all();
        $inventory_statuses = InventoryStatus::all();
        return view('modules.inventory.product.create', [
            'inventory_types' => $inventory_types,
            'inventory_categories' => $inventory_categories,
            'inventory_statuses' => $inventory_statuses,
        ]);
    }

    public function save(StoreInventoryProductRequest $request)
    {
        try {
            $product = new InventoryProduct();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->cost_price = $request->cost_price;
            $product->sale_price = $request->sale_price;
            $product->discount_price = $request->discount_price;
            $product->discount_percentage = $request->discount_percentage;
            $product->product_type_id = $request->product_type_id;
            $product->product_category_id = $request->product_category_id;
            $product->product_status_id = $request->product_status_id;
            $product->save();

            Toastr::success('Product successfully created!', 'Success');
            return redirect()->route('inventory.products.edit', $product->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-products');
        
        $product = InventoryProduct::findOrFail($id);
        if ($product) {
            $product = InventoryProduct::where('id', $id)->with('inventoryProductSeo', 'inventoryProductVariations')->first();
            return view('modules.inventory.product.edit', [
                'product' => $product
            ]);
        }
        abort(404);
    }

    public function update(UpdateInventoryProductRequest $request)
    {
        //
    }

    public function destroy(InventoryProduct $inventoryProduct)
    {
        //
    }
}
