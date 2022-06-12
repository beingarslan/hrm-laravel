<?php

namespace App\Http\Livewire\User\Security;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $listeners = ['updatePassword' => 'updatePassword'];


    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|string|min:5|confirmed',
        'password_confirmation' => 'required',
    ];

    public function validateData()
    {
        $this->validate();

        if (Hash::check($this->current_password, auth()->user()->password)) {
            $this->dispatchBrowserEvent(
                'swal:confirm',
                [
                    'type' => 'warning',
                    'message' => 'Are you sure?',
                    'text' => 'You want to change the password!',
                    'method_name' => 'updatePassword',
                    'method_params' => []
                ]
            );
        } else {

            $this->dispatchBrowserEvent(
                'alert',
                [
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'Please check your current password!'
                ]
            );
        }
    }

    public function updatePassword()
    {
        auth()->user()->update(['password' => Hash::make($this->password)]);
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Password has been updated successfully!'
            ]
        );
        $this->reset();
    }

    public function mount()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.user.security.change-password');
    }
}
