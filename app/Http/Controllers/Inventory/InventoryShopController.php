<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\Inventory\StoreInventoryShopRequest;
use App\Http\Requests\Inventory\UpdateInventoryShopRequest;
use App\Models\Inventory\InventoryShop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::checkPermission('view-inventory-shops');

        return view('modules.inventory.shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-shops');

        return view('modules.inventory.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryShopRequest $request)
    {
        $shop = new InventoryShop();
        $shop->name = $request->name;
        $shop->slug = Str::slug($request->name);
        $shop->description = $request->description;
        $shop->save();

        Toastr::success('Shop created successfully', 'Success');

        return redirect()->route('inventory.shops.edit', $shop->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryShop  $inventoryShop
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryShop $inventoryShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryShop  $inventoryShop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-shops');
        
        $shop = InventoryShop::find($id);
        if(!$shop){
            Toastr::error('Shop not found', 'Error');
            abort(404);
        }
        return view('modules.inventory.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryShopRequest  $request
     * @param  \App\Models\Inventory\InventoryShop  $inventoryShop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryShopRequest $request)
    {
        $shop = InventoryShop::find($request->id);
        if(!$shop){
            Toastr::error('Shop not found', 'Error');
            abort(404);
        }
        $shop->name = $request->name;
        $shop->slug = Str::slug($request->name);
        $shop->description = $request->description;
        $shop->save();

        Toastr::success('Shop updated successfully', 'Success');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryShop  $inventoryShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryShop $inventoryShop)
    {
        //
    }
}
