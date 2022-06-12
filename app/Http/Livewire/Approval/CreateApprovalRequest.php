<?php

namespace App\Http\Livewire\Approval;

use App\Models\Approval\ApprovalType;
use App\Models\Leave\LeaveType;
use Livewire\Component;

class CreateApprovalRequest extends Component
{
    public $approvalTypes;
    public $leaveTypes;
    public $check;

    public function mount(){
        $this->check=false;
        $this->approvalTypes = ApprovalType::all();
        $this->leaveTypes = [];
    }

    public function checkRequestType($requestType){
        if($requestType == 3){
            $this->check = true;
            $this->leaveTypes = LeaveType::all();
        }else{
            $this->leaveTypes = [];
            $this->check=false;
        }
    }

    public function render()
    {
        return view('livewire.approval.create-approval-request');
    }
}
