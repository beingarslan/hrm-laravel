<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User\UserApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index(){

        // validate permission
        Helper::checkPermission('view-approvals');

        $approvals = UserApprovalRequest::where('supervisor_id', Auth::id())->with('type', 'status')->orderBy('created_at', 'desc')->simplepaginate(10);        
        return view('modules.approval.index', compact('approvals'));
    }

    public function view(Request $request, $id){

        Helper::checkPermission('edit-approvals');
        
        $approval = UserApprovalRequest::find($id);
        return view('modules.approval.view', compact('approval'));
    }
}
