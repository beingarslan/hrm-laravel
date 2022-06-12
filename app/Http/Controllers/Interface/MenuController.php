<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\Interface\StoreMenuRequest;
use App\Http\Requests\Interface\UpdateMenuRequest;
use App\Models\Interface\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Helper::checkPermission('view-master-menus');

        return view('modules.interface.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Helper::checkPermission('add-master-menus');

        $menus = Menu::doesnthave('parent')->get();
        $permissions = Permission::all()->pluck('name');

        return view('modules.interface.menu.create', [
            'menus' => $menus,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        try {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->url = $request->url;
            $menu->icon = $request->icon;
            $menu->order = $request->order;
            $menu->slug = $request->slug;
            $menu->status = $request->status;
            $menu->can = $request->can;
            $menu->parent_id = $request->parent_id;
            $menu->save();

            Toastr::success('Menu created successfully.', 'Success');

            return redirect()->route('interfaces.menus.edit', $menu->id);
        } catch (\Throwable $th) {
            // throw $th;
            Toastr::error('Something went wrong.', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interface\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interface\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Helper::checkPermission('edit-master-menus');

        $menu = Menu::findOrFail($id);

        $menus = Menu::doesnthave('parent')->get();

        $permissions = Permission::all()->pluck('name');

        return view('modules.interface.menu.edit', [
            'menu' => $menu,
            'menus' => $menus,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Interface\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request)
    {
        if (
            $request->parent_id == $request->id
            || (Menu::where('id', $request->id)->has('children')->exists() && $request->parent_id != '')
        ) {
            Toastr::error('Parent can not be same as current menu or Main meu can not be sub menu!', 'Error');

            return redirect()->back();
        }

        Menu::where('id', $request->id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'order' => $request->order,
            'slug' => $request->slug,
            'status' => $request->status,
            'can' => $request->can,
            'parent_id' => $request->parent_id,
        ]);

        Toastr::success('Menu updated successfully.', 'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interface\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
