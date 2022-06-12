<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreInventoryProductVariationRequest;
use App\Http\Requests\Inventory\UpdateInventoryProductVariationRequest;
use App\Models\Inventory\InventoryProduct\InventoryProductVariation;

class InventoryProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInventoryProductVariationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryProductVariationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryProductVariation  $inventoryProductVariation
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryProductVariation $inventoryProductVariation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryProductVariation  $inventoryProductVariation
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryProductVariation $inventoryProductVariation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryProductVariationRequest  $request
     * @param  \App\Models\InventoryProductVariation  $inventoryProductVariation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryProductVariationRequest $request, InventoryProductVariation $inventoryProductVariation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryProductVariation  $inventoryProductVariation
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryProductVariation $inventoryProductVariation)
    {
        //
    }
}
