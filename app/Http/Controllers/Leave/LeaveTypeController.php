<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Leave\LeaveType;
use App\Http\Requests\StoreLeaveTypeRequest;
use App\Http\Requests\UpdateLeaveTypeRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LeaveTypeController extends Controller
{

    public function index()
    {
        Helper::checkPermission('view-master-leavetypes');

        return view('modules.leave.index');
    }


    public function create()
    {
        Helper::checkPermission('add-master-leavetypes');

        return view('modules.leave.create');
    }


    public function store(StoreLeaveTypeRequest $request)
    {
        $leavetype = LeaveType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'description' => $request->description,
            'total' => $request->total,
            'created_by' => Auth::id(),
        ]);

        Toastr::success('Leave type created successfully.', 'Success');

        return redirect()->route('leavetypes.edit', ['id' => $leavetype->id]);
    }


    public function edit($id)
    {
        Helper::checkPermission('edit-master-leavetypes');

        $leavetype = LeaveType::select('leave_types.id', 'leave_types.name', 'leave_types.slug', 'leave_types.description', 'leave_types.total', 'users.first_name as created_by', 'refuser.first_name as updated_by')
            ->where('leave_types.id', $id)
            ->leftjoin('users', 'users.id', '=', 'leave_types.created_by')
            ->leftjoin('users as refuser', 'refuser.id', '=', 'leave_types.updated_by')->first();
        return view('modules.leave.edit', compact('leavetype'));
    }


    public function update(UpdateLeaveTypeRequest $request)
    {
        $leavetype = LeaveType::find($request->id);

        $leavetype->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'total' => $request->total,
            'updated_by' => Auth::id(),

        ]);

        Toastr::success('Leave type updated successfully.', 'Success');

        return redirect()->back();
    }

    public function destroy(LeaveType $leaveType)
    {
        //
    }
}
