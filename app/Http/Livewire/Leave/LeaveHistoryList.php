<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave\Leave;
use App\Models\Leave\LeaveType;
use App\Models\Leave\LeaveUser;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LeaveHistoryList extends Component
{
    public $leaves;
    public $leaveTypes;
    public $consumed;
    public $remaining;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->readLeaves();
        $this->leaveType();
    }

    public function readLeaves()
    {
        $this->leaves = User::where('id', $this->userId)->first()->leaves;
    }

    public function leaveType()
    {
        $this->leaveTypes = LeaveUser::where('user_id', $this->userId)
            ->with('leaveType')
            ->get();
    }

    public function render()
    {
        return view('livewire.leave.leave-history-list');
    }
}
