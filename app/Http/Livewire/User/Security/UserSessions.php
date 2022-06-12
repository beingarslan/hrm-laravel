<?php

namespace App\Http\Livewire\User\Security;

use App\Models\User\UserSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserSessions extends Component
{
    public $devices;

    // listen for event
    protected $listeners = ['logoutdevices' => 'logoutdevices'];


    public function mount()
    {

        $this->devices = UserSession::where('user_id', Auth::user()->id)
            ->get()->reverse();
    }

    public function validateData()
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'You be logged out from all other devices!',
                'method_name' => 'logoutdevices',
                'method_params' => []
            ]
        );
    }

    public function logoutdevices()
    {
        DB::table('user_sessions_history')->insert(
        UserSession::where('user_id', Auth::user()->id)
        ->where('id', '!=', session()->getId())->get()->toArray());

        UserSession::where('user_id', Auth::user()->id)
        ->where('id', '!=', session()->getId())->delete();
        $this->devices = UserSession::where('user_id', Auth::user()->id)
            ->get()->reverse();

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'All other devices has been logged out!'
            ]
        );
    }
    public function render()
    {
        return view('livewire.user.security.user-sessions');
    }
}
