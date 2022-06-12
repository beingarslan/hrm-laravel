<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Designation\Designation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DesignationController extends Controller
{
    public function index(){
        Helper::checkPermission('view-master-designations');

        return view('modules.designation.index');
    }

    public function create()
    {
        Helper::checkPermission('add-master-designations');

        return view('modules.designation.create');
    }

    public function store(Request $request)
    {
        Helper::checkPermission('add-master-designations');

        $request->validate([
            'name' => 'required|unique:designations,name',
            'description' => 'required',
        ]);
        $designation = Designation::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'_'),
            'description' => $request->description,
            'created_by' => Auth::id(),
        ]);

        Toastr::success('Designation created successfully.', 'Success');

        return redirect()->route('designations.edit',['id'=> $designation->id]);
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-master-designations');

        $designation=Designation::select('designations.id','designations.name','designations.slug','designations.description','users.first_name as created_by','refuser.first_name as updated_by')
            ->where('designations.id',$id)
            ->leftjoin('users','users.id','=','designations.created_by')
            ->leftjoin('users as refuser','refuser.id','=','designations.updated_by')->first();
        return view('modules.designation.edit',compact('designation'));
    }

    public function update(Request $request)
    {
        Helper::checkPermission('edit-master-designations');

        $designation = Designation::find($request->id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $designation->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'updated_by' => Auth::id(),

        ]);

        Toastr::success('Designation updated successfully.', 'Success');

        return redirect()->back();
    }
}
