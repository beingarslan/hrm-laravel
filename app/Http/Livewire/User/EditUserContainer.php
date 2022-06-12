<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class EditUserContainer extends Component
{
    public $userId;

    public $view = [];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->view = [
            'edit-personal-information' => true,
            'edit-official-information' => false,
            'user-attendance-list' => false,
            'under-development' => false,
            'admin-change-password' => false,
            'user-education-add' => false,
            'experiencelist'=>false,
            'skill-list'=>false,
            'roles-and-permissions-list'=>false,
            'leave-history-list'=>false,
        ];
    }

    public function changeTab($tab)
    {
        if (array_key_exists($tab, $this->view)) {
            foreach ($this->view as $key => $value) {
                $this->view[$key] = false;
            }
            $this->view[$tab] = true;
        }
    }
    public function render()
    {
        return view('livewire.user.edit-user-container');
    }
}
