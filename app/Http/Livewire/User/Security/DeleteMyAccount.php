<?php

namespace App\Http\Livewire\User\Security;

use Livewire\Component;

class DeleteMyAccount extends Component
{
    // listen for event
    protected $listeners = ['removeaccount' => 'removeaccount'];

    public function validateData(){
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this account!',
                'method_name' => 'removeaccount',
                'method_params' => []
            ]
        );
    }

    public function removeaccount(){
        $user = auth()->user();
        $user->delete();

        
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Your account has been deleted!'
            ]
        );

        auth()->logout();
        return redirect()->route('login');
    }   
    public function render()
    {
        return view('livewire.user.security.delete-my-account');
    }
}
