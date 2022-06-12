<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryOption;
use App\Http\Requests\Inventory\StoreInventoryOptionRequest;
use App\Http\Requests\Inventory\UpdateInventoryOptionRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Helper::checkPermission('view-inventory-options');

        return view('modules.inventory.options.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-options');
        
        return view('modules.inventory.options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryOptionRequest $request)
    {
        $option = new InventoryOption();
        $option->name = $request->name;
        $option->slug = Str::slug($request->name);
        $option->description = $request->description;
        $option->save();
        Toastr::success('Option Successfully Saved :)' ,'Success');
        return redirect()->route('inventory.options.edit', $option->id);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryOption  $inventoryOption
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryOption $inventoryOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryOption  $inventoryOption
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-options');

        $option = InventoryOption::find($id);
        if ($option) {
            return view('modules.inventory.options.edit', compact('option'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryOptionRequest  $request
     * @param  \App\Models\Inventory\InventoryOption  $inventoryOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryOptionRequest $request)
    {
        $option = InventoryOption::find($request->id);
        if ($option) {
            $option->name = $request->name;
            $option->slug = Str::slug($request->name);
            $option->description = $request->description;
            $option->save();
            Toastr::success('Option Successfully Updated :)' ,'Success');
            return redirect()->back();
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryOption  $inventoryOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOption $inventoryOption)
    {
        //
    }
}
