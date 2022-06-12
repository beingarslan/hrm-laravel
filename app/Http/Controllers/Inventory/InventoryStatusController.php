<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryStatus;
use App\Http\Requests\Inventory\StoreInventoryStatusRequest;
use App\Http\Requests\Inventory\UpdateInventoryStatusRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::checkPermission('view-inventory-statuses');

        return view('modules.inventory.statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Helper::checkPermission('add-inventory-statuses');

        return view('modules.inventory.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryStatusRequest $request)
    {
        $status = new InventoryStatus();
        $status->name = $request->name;
        $status->slug = Str::slug($request->name);
        $status->description = $request->description;
        $status->save();
        Toastr::success('Status Successfully Saved :)' ,'Success');
        return redirect()->route('inventory.statuses.edit', $status->id);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryStatus  $inventoryStatus
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryStatus $inventoryStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryStatus  $inventoryStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-statuses');
        
        $status = InventoryStatus::find($id);
        if(!$status) {
            Toastr::error('Status Not Found.' ,'Error');
            abort(404);
        }
        return view('modules.inventory.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryStatusRequest  $request
     * @param  \App\Models\Inventory\InventoryStatus  $inventoryStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryStatusRequest $request)
    {
        $status = InventoryStatus::find($request->id);
        if(!$status) {
            Toastr::error('Status Not Found.' ,'Error');
            abort(404);
        }
        $status->name = $request->name;
        $status->slug = Str::slug($request->name);
        $status->description = $request->description;
        $status->save();
        Toastr::success('Status Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryStatus  $inventoryStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryStatus $inventoryStatus)
    {
        //
    }
}
