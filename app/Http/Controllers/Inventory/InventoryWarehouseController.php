<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\Inventory\StoreInventoryWarehouseRequest;
use App\Http\Requests\Inventory\UpdateInventoryWarehouseRequest;
use App\Models\Inventory\InventoryWarehouse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class InventoryWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::checkPermission('view-inventory-warehouses');

        return view('modules.inventory.warehouse.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-warehouses');

        return view('modules.inventory.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryWarehouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryWarehouseRequest $request)
    {
        $warehouse = new InventoryWarehouse();
        $warehouse->name = $request->name;
        $warehouse->slug = Str::slug($request->name);
        $warehouse->description = $request->description;
        $warehouse->save();

        Toastr::success('Warehouse created successfully', 'Success');

        return redirect()->route('inventory.warehouses.edit', $warehouse->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryWarehouse  $inventoryWarehouse
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryWarehouse $inventoryWarehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryWarehouse  $inventoryWarehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-warehouses');
        
        $warehouse = InventoryWarehouse::find($id);
        if (!$warehouse) {
            Toastr::error('Warehouse not found', 'Error');
            abort(404);
        }
        return view('modules.inventory.warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryWarehouseRequest  $request
     * @param  \App\Models\Inventory\InventoryWarehouse  $inventoryWarehouse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryWarehouseRequest $request)
    {
        $warehouse = InventoryWarehouse::find($request->id);
        if (!$warehouse) {
            Toastr::error('Warehouse not found', 'Error');
            abort(404);
        }
        $warehouse->name = $request->name;
        $warehouse->slug = Str::slug($request->name);
        $warehouse->description = $request->description;
        $warehouse->save();

        Toastr::success('Warehouse updated successfully', 'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryWarehouse  $inventoryWarehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryWarehouse $inventoryWarehouse)
    {
        //
    }
}
