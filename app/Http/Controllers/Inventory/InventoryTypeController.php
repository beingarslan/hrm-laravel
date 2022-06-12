<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryType;
use App\Http\Requests\Inventory\StoreInventoryTypeRequest;
use App\Http\Requests\Inventory\UpdateInventoryTypeRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::checkPermission('view-inventory-types');

        return view('modules.inventory.types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-types');

        return view('modules.inventory.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryTypeRequest $request)
    {
        $type = new InventoryType();
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->description = $request->description;
        $type->save();
        Toastr::success('Type Successfully Saved :)' ,'Success');
        return redirect()->route('inventory.types.edit', $type->id);       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryType $inventoryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-types');
        
        $type = InventoryType::find($id);
        if (!$type) {
            Toastr::error('Type Not Found :)' ,'Error');
            abort(404);
        }
        return view('modules.inventory.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryTypeRequest  $request
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryTypeRequest $request)
    {
        $type = InventoryType::find($request->id);
        if (!$type) {
            Toastr::error('Type Not Found :)' ,'Error');
            abort(404);
        }
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->description = $request->description;
        $type->save();
        Toastr::success('Type Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryType $inventoryType)
    {
        //
    }
}
