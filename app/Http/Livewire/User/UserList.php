<?php

namespace App\Http\Livewire\User;

use App\Models\Department\Department;
use App\Models\Designation\Designation;

use App\Models\ShiftTime\ShiftTime;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User\UserView;
use Illuminate\Pagination\Paginator;
use Spatie\Permission\Models\Role;

class UserList extends Component{

    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';
    public $departments = [];
    public $designations = [];
    public $roles = [];
    public $shifts = [];
    public $department_id;
    public $shift_id;
    public $role_id;
    public $full_name;
    public $email;
    public $designation_id;

    public function render(){

        $this->departments = Department::all();
        $this->designations = Designation::all();
        $this->roles = Role::all();
        $this->shifts = ShiftTime::all();
        $users = $this->filterUserList();
        $data = ['users' => $users];

        return view('livewire.user.user-list', $data);
    }

    public function filterUserList(){

        $users =  UserView::query();

        if (!empty($this->department_id)){
            $users = $users->where('department_id',  $this->department_id);
        }

        if (!empty($this->designation_id)){
            $users = $users->where('designation_id',  $this->designation_id);
        }

        if (!empty($this->role_id)){
            $users = $users->where('role_id',  $this->role_id);
        }

        if (!empty($this->shift_id)){
            $users = $users->where('shift_time_id',  $this->shift_id);
        }

        if (!empty($this->email)){
            $users = $users->where('email', 'LIKE', '%' . $this->email . '%');
        }

        if (!empty($this->full_name)){
            $users = $users->where('first_name', 'LIKE', '%' .  $this->full_name . '%')
            ->orWhere('middle_name', 'LIKE', '%' .  $this->full_name . '%')
            ->orWhere('last_name', 'LIKE', '%' .  $this->full_name . '%');
        }

        return $users->paginate(30);
    }

    public function setPage($url){

        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

}
