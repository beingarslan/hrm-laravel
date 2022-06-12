<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User\Attendance\LateApprovalRequest;
use App\Http\Requests\StoreLateApprovalRequestRequest;
use App\Http\Requests\UpdateLateApprovalRequestRequest;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class LateApprovalRequestController extends Controller
{
    public function create(){
        Helper::checkPermission('add-users-my-requests');
        
        return view('modules.user.attendance.late-approval-request.create');
    }

    public function save(StoreLateApprovalRequestRequest $request){
        $lateApprovalRequest = new LateApprovalRequest();
        $lateApprovalRequest->fill($request->all());
        $lateApprovalRequest->user_id = auth()->user()->id;
        $lateApprovalRequest->date = Carbon::now();
        $lateApprovalRequest->save();
        Toastr::success('Your request has been submitted', 'Success');
        return redirect()->to(url('/attendances/attendance'));
    }
}
