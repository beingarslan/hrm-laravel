<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryBrand;
use App\Http\Requests\Inventory\StoreInventoryBrandRequest;
use App\Http\Requests\Inventory\UpdateInventoryBrandRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::checkPermission('view-inventory-brands');

        return view('modules.inventory.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-brands');

        return view('modules.inventory.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryBrandRequest $request)
    {
        $brand = new InventoryBrand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->save();
        Toastr::success('Brand Successfully Saved :)' ,'Success');
        return redirect()->route('inventory.brands.edit', $brand->id);          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryBrand  $inventoryBrand
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryBrand $inventoryBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryBrand  $inventoryBrand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-brands');

        $brand = InventoryBrand::find($id);
        if(!$brand) {
            Toastr::error('Brand not found.' ,'Error');
            abort(404);
        }
        return view('modules.inventory.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryBrandRequest  $request
     * @param  \App\Models\Inventory\InventoryBrand  $inventoryBrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryBrandRequest $request)
    {
        $brand = InventoryBrand::find($request->id);
        if(!$brand) {
            Toastr::error('Brand not found.' ,'Error');
            abort(404);
        }
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->save();
        Toastr::success('Brand Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryBrand  $inventoryBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryBrand $inventoryBrand)
    {
        //
    }
}
