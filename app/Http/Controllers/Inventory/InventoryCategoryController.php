<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Inventory\InventoryCategory;
use App\Http\Requests\Inventory\StoreInventoryCategoryRequest;
use App\Http\Requests\Inventory\UpdateInventoryCategoryRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InventoryCategoryController extends Controller
{
    public function index()
    {
        Helper::checkPermission('view-inventory-categories');

        return view('modules.inventory.categories.index');
    }
    public function create()
    {
        Helper::checkPermission('add-inventory-categories');

        $categories = InventoryCategory::all();
        return view('modules.inventory.categories.create', compact('categories'));
    }

    public function store(StoreInventoryCategoryRequest $request)
    {
        $category = new InventoryCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
        $category->save();
        Toastr::success('Category Successfully Saved :)' ,'Success');
        return redirect()->route('inventory.categories.edit', $category->id);
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-inventory-categories');
        
        $category = InventoryCategory::find($id);
        if ($category) {
            $categories = InventoryCategory::all();
            return view('modules.inventory.categories.edit', compact('category', 'categories'));
        }
        abort(404);
    }

    public function update(UpdateInventoryCategoryRequest $request)
    {
        $category = InventoryCategory::find($request->id);
        if ($category) {
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->save();
            Toastr::success('Category Successfully Updated :)' ,'Success');
            return redirect()->back();
        }
        abort(404);
    }
}
