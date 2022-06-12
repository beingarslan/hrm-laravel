<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryOptionValue;
use App\Http\Requests\Inventory\StoreInventoryOptionValueRequest;
use App\Http\Requests\Inventory\UpdateInventoryOptionValueRequest;
use Illuminate\Http\Request;

class InventoryOptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $option_id)
    {
        Helper::checkPermission('view-inventory-option-values');

        return view('modules.inventory.options.values.index', compact('option_id'));
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
     * @param  \App\Http\Requests\StoreInventoryOptionValueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryOptionValueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryOptionValue  $inventoryOptionValue
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryOptionValue $inventoryOptionValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryOptionValue  $inventoryOptionValue
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOptionValue $inventoryOptionValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryOptionValueRequest  $request
     * @param  \App\Models\Inventory\InventoryOptionValue  $inventoryOptionValue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryOptionValueRequest $request, InventoryOptionValue $inventoryOptionValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryOptionValue  $inventoryOptionValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOptionValue $inventoryOptionValue)
    {
        //
    }
}
