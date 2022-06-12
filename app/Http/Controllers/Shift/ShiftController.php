<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\ShiftTime\ShiftTime;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShiftController extends Controller
{
    public function index()
    {
        Helper::checkPermission('view-master-shifts');

        return view('modules.shift.index');
    }

    public function create()
    {
        Helper::checkPermission('add-master-shifts');

        return view('modules.shift.create');
    }

    public function store(Request $request)
    {
        Helper::checkPermission('add-master-shifts');

        $request->validate([
            'name' => 'required|unique:shift_times,name',
            'description' => 'required',
            'buffer_time' => 'required',
            'login' => 'required|date_format:H:i',
            'logout' => 'required|date_format:H:i',
            'break_in' => 'required|date_format:H:i',
            'break_out' => 'required|date_format:H:i',
        ]);

        $shift = ShiftTime::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'description' => $request->description,
            'created_by' => Auth::id(),
            'buffer_time' => $request->buffer_time,
            'login' => $request->login,
            'logout' => $request->logout,
            'break_in' => $request->break_in,
            'break_out' => $request->break_out,
        ]);

        Toastr::success('Shift created successfully.', 'Success');
        return redirect()->route('shifts.edit', ['id' => $shift->id]);
    }

    public function edit($id)
    {
        Helper::checkPermission('edit-master-shifts');

        $shift = ShiftTime::where('shift_times.id', $id)
            ->leftjoin('users', 'users.id', '=', 'shift_times.created_by')
            ->leftjoin('users as refuser', 'refuser.id', '=', 'shift_times.updated_by')->first();

        return view('modules.shift.edit', compact('shift'));
    }

    public function update(Request $request)
    {
        Helper::checkPermission('edit-master-shifts');

        $shift = ShiftTime::find($request->id);
        $request->validate([
            'name' => 'required|unique:shift_times,name,' . $shift->id,
            'description' => 'required',
            'buffer_time' => 'required',
            'login' => 'required|date_format:H:i',
            'logout' => 'required|date_format:H:i',
            'break_in' => 'required|date_format:H:i',
            'break_out' => 'required|date_format:H:i',
        ]);
        $shift->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'description' => $request->description,
            'updated_by' => Auth::id(),
        ]);
        return redirect()->route('shifts.index')
            ->with('success', 'Shift updated successfully');
    }
}
