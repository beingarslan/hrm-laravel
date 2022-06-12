<?php

namespace App\Http\Livewire\User\Approval;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewApproval extends Component
{
    public $approval;
    public $comments;

    public $user;
    public $supervisor;

    public $comment;

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
        $this->supervisor = $user->supervisor;
        // dd(Auth::user()->supervisor->toArray());

        $this->approval = $approval;
        // load comments on the base of current approval
        $this->loadComments();
    }
    public function render()
    {
        return view('livewire.user.approval.view-approval');
    }
}
