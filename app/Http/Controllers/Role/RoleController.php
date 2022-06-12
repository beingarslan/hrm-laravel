<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        Helper::checkPermission('view-master-roles');

        return view('modules.role.index');
    }
    public function create()
    {
        Helper::checkPermission('add-master-roles');

        $permissions = Permission::all()->pluck('name');
        return view('modules.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        Helper::checkPermission('add-master-roles');

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        $role->syncPermissions($request->permissions);

        Toastr::success('Role created successfully.', 'Success');
        
        return redirect()->route('roles.edit', $role->id);
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-master-roles');

        $permissions = Permission::all()->pluck('name');

        $role = Role::where('id', $id)->first();

        $rolePermissions = array_column($role->permissions->toArray(), 'name');

        return view('modules.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request)
    {
        Helper::checkPermission('edit-master-roles');
        
        $role = Role::find($request->id);
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        $role->syncPermissions($request->input('permissions'));

        Toastr::success('Role updated successfully.', 'Success');

        return redirect()->back();
    }
}
