<?php

namespace App\Http\Livewire\User\Security;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminChangePassword extends Component
{
    public $password;
    public $password_confirmation;

    protected $listeners = ['updatePassword' => 'updatePassword'];


    protected $rules = [
        'password' => 'required|string|min:5|confirmed',
        'password_confirmation' => 'required',
    ];

    public function validateData()
    {
        $this->validate();

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
        return view('livewire.user.security.admin-change-password');
    }
}
