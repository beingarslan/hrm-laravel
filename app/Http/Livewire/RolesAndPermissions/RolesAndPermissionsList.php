<?php

namespace App\Http\Livewire\RolesAndPermissions;

use App\Http\Helpers\Helper;
use App\Models\User\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsList extends Component
{
    public $roles;
    public $user_permissions;
    public $user_permissions_vai_roles;

    public $userId;
    public $user;


    // FORM MEMBERS
    public $selected_role;
    public $selected_permission;

    // listeners
    protected $listeners = ['removeVariation' => 'removeVariation'];

    public function getinventoryOptionValues($value)
    {
        $role  = Role::where('name', $value)->first();
        $this->selected_role = $value;
        $this->permissions = $role->permissions->pluck('name');

        return $this->permissions;
    }

    public function changePermissionEvent($permission)
    {
        Helper::checkPermission('edit-users');
        if ($this->user->hasPermissionTo($permission)) {
            $this->user->revokePermissionTo($permission);
            $msg = 'Permission ('.$permission.') has been revoked!';
        } else {
            $this->user->givePermissionTo($permission);
            $msg = 'Permission ('.$permission.') has been given!';
        }
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success ',
                'message' => $msg
            ]
        );
    }

    public function mount($userId)
    {
        Helper::checkPermission('edit-users');
        $this->userId = $userId;
        $this->user = User::where('id', $userId)->first();
        $this->roles = Role::all()->pluck('name');
        $this->user_permissions = $this->getUserPermissions()->pluck('name')->toArray();
        $this->user_permissions_vai_roles = $this->getUserPermissionsVaiRoles()->pluck('name')->toArray();
    }

    public function getUserPermissions()
    {
        $permissions  = $this->user->getAllPermissions();
        return $permissions;
    }

    public function getUserPermissionsVaiRoles()
    {
        $permissions  = $this->user->getPermissionsViaRoles();
        return $permissions;
    }

    public function getAllPermissions()
    {
        $permissions = Permission::all()->pluck('name');
        return $permissions;
    }

    public function render()
    {
        $permissions =  $this->getAllPermissions();
        $userRole = $this->user->getRoleNames();

        $data = [
            'permissions' => $permissions,
            'userRole' => $userRole,
        ];

        return view('livewire.roles-and-permissions.roles-and-permissions-list', $data);
    }
}
