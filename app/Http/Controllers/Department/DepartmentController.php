<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Department\Department;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function index(){

        Helper::checkPermission('view-master-departments');

        return view('modules.department.index');
    }
    public function create()
    {
        Helper::checkPermission('add-master-departments');

        return view('modules.department.create');
    }

    public function store(Request $request)
    {

        Helper::checkPermission('add-master-departments');


        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $department = Department::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'_'),
            'description' => $request->description,
            'created_by' => Auth::id(),
        ]);

        Toastr::success('Department created successfully.', 'Success');
        return redirect()->route('departments.edit',['id'=> $department->id]);
        // return redirect()->back()
        //     ->with('success','Department created successfully.');
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-master-departments');

        $department=Department::select('departments.id','departments.name','departments.slug','departments.description','users.first_name as created_by','refuser.first_name as updated_by')
            ->where('departments.id',$id)
            ->leftjoin('users','users.id','=','departments.created_by')
            ->leftjoin('users as refuser','refuser.id','=','departments.updated_by')->first();
        return view('modules.department.edit',compact('department'));
    }

    public function update(Request $request)
    {
        Helper::checkPermission('edit-master-departments');

        $department = Department::find($request->id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $department->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'updated_by' => Auth::id(),

        ]);

        Toastr::success('Department updated successfully.', 'Success');

        return redirect()->back();
    }
}
