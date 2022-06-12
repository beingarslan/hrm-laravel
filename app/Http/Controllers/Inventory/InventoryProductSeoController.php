<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreInventoryProductSeoRequest;
use App\Http\Requests\UpdateInventoryProductSeoRequest;
use App\Models\Inventory\InventoryProduct\InventoryProductSeo;

class InventoryProductSeoController extends Controller
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
     * @param  \App\Http\Requests\StoreInventoryProductSeoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryProductSeoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryProductSeo  $inventoryProductSeo
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryProductSeo $inventoryProductSeo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryProductSeo  $inventoryProductSeo
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryProductSeo $inventoryProductSeo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryProductSeoRequest  $request
     * @param  \App\Models\InventoryProductSeo  $inventoryProductSeo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryProductSeoRequest $request, InventoryProductSeo $inventoryProductSeo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryProductSeo  $inventoryProductSeo
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryProductSeo $inventoryProductSeo)
    {
        //
    }
}
