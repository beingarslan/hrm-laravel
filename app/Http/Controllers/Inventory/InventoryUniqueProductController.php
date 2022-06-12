<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryUniqueProduct;
use App\Http\Requests\Inventory\StoreInventoryUniqueProductRequest;
use App\Http\Requests\Inventory\UpdateInventoryUniqueProductRequest;
use App\Models\Inventory\InventoryProduct;
use App\Models\Inventory\InventoryStatus;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryUniqueProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        Helper::checkPermission('view-inventory-products-uniques');
        
        $product = InventoryProduct::findOrFail($product_id);
        if($product){
            $statuses = InventoryStatus::all();
            return view('modules.inventory.product.uniques.index', compact(['product', 'statuses']));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryUniqueProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function save(StoreInventoryUniqueProductRequest $request)
    {
        $product = InventoryProduct::findOrFail($request->product_id);
        if($product){
            $product->inventoryUniqueProduct()->create($request->all());
            Toastr::success('Product Unique Added Successfully', 'Success');
            return redirect()->back();
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryUniqueProduct  $inventoryUniqueProduct
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryUniqueProduct $inventoryUniqueProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryUniqueProduct  $inventoryUniqueProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryUniqueProduct $inventoryUniqueProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryUniqueProductRequest  $request
     * @param  \App\Models\Inventory\InventoryUniqueProduct  $inventoryUniqueProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryUniqueProductRequest $request, InventoryUniqueProduct $inventoryUniqueProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryUniqueProduct  $inventoryUniqueProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryUniqueProduct $inventoryUniqueProduct)
    {
        //
    }
}
