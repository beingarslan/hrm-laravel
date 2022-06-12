<?php

namespace App\Http\Livewire\Approval;

use App\Models\Leave\Leave;
use Brian2694\Toastr\Facades\Toastr;
use Facade\Ignition\DumpRecorder\DumpHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewApproval extends Component
{
    public $approval;
    public $comments;
    public $current_id;

    public $user;
    public $team_member;

    public $comment;

    protected $listeners = ['approve' => 'approve', 'reject' => 'reject'];

    public function validateApproval()
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'The action will be approved!',
                'method_name' => 'approve',
                'method_params' => []
            ]
        );

    }
    public function validateDecline()
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'The action will be approved!',
                'method_name' => 'reject',
                'method_params' => []
            ]
        );
    }
    
    public function reject(){

        $this->approval->update([
            'approval_status_id' => 3,
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Approval has been declined successfully!'
            ]
        );

        $this->loadComments();
    }

    public function approve(){
        $this->approval->update([
            'approval_status_id' => 2,
        ]);
        $data=(int)Leave::select('consumed')->where('user_id',$this->approval->user_id)->sum('consumed');
        $this->approval->leave->update([
            'remaining'=>30 - $data,
            'updated_by'=>Auth::id()
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Approval has been approved successfully!'
            ]
        );
        $this->loadComments();
    }


    public function sendComment()
    {
        // dd($this->comment);
        $this->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $this->approval->comments()->create([
            'comment' => $this->comment,
            'created_by' => Auth::user()->id,
        ]);

        $this->comment = '';

        Toastr::success('Comment has been sent successfully.', 'Success');

        $this->loadComments();
    }
    public function loadComments()
    {
        // load comments
        $this->comments = $this->approval->comments()->
        with(['sender' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name', 'email');
        }])
        // ->orderBy('created_at', 'desc')
        ->get();
    }
    public function mount($approval)
    {
        // load user's information
        $user = Auth::user();
        $this->user = $user;
        $this->team_member = $user->team_member;
        // dd(Auth::user()->team_member->toArray());

        $this->approval = $approval;
        // load comments on the base of current approval
        $this->loadComments();
    }
    public function render()
    {
        return view('livewire.approval.view-approval');
    }
}
