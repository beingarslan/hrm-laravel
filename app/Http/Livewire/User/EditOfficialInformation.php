<?php

namespace App\Http\Livewire\User;

use App\Http\Helpers\Helper;
use App\Models\Department\Department;
use App\Models\Designation\Designation;

use App\Models\ShiftTime\ShiftTime;
use App\Models\Team\Team;
use App\Models\User\User;
use App\Models\User\UserTeam;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditOfficialInformation extends Component
{

    protected $listeners = [
        'changeRoleEvent' => 'changeRoleEvent',
        'updateUserRole' => 'updateUserRole'
    ];


    public $officialInformation;
    public $team_selections = [];
    public $user_teams;
    public $users, $designations, $departments, $shift_timings, $roles, $teams, $permissions;

    public $userId;
    public $department_id;
    public $designation_id;
    public $shift_time_id;
    public $department_name;
    public $designation_name;
    public $role_name;
    public $shift_time_name;
    public $date_of_probation_end;
    public $supervisor_id;
    public $date_of_joining;
    public $supervisors;
    public $employee_id;
    public $user_role;

    public $select_teams = [];

    protected $rules = [
        'shift_time_id' => 'required|numeric|exists:shift_times,id',
        'user_role' => 'required',
        'department_id' => 'required|numeric|exists:departments,id',
        'designation_id' => 'required|numeric|exists:designations,id',
        'team_selections'  => 'required',
        'date_of_probation_end'  => 'required',
        'supervisor_id'  => 'required',
        'date_of_joining'  => 'required',
        'employee_id'  => 'required',
    ];



    public function save()
    {

        $this->validate();

        $user = User::find($this->userId);
        $user->syncRoles($this->user_role);

        $user->update([
            'department_id' => $this->department_id,
            'designation_id' => $this->designation_id,
            'shift_time_id' => $this->shift_time_id,
            'date_of_probation_end' => $this->date_of_probation_end,
            'supervisor_id' => $this->supervisor_id,
            'date_of_joining' => $this->date_of_joining,
            'employee_id' => $this->employee_id,
        ]);

        $user->teams()->sync($this->select_teams);

        foreach ($this->team_selections as $key => $value) {
            $this->team_selections[$key]['select'] = in_array($value->id, $this->user_teams);
        }

        $this->emit('userUpdated');

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Offical infromation has been updated!'
            ]
        );
    }

    public function mount()
    {        
        Helper::checkPermission('edit-users');

        $officialInformation = User::where('id', $this->userId)->with('teams')->first();

        $this->department_id = $officialInformation->department_id;
        $this->designation_id = $officialInformation->designation_id;
        $this->shift_time_id = $officialInformation->shift_time_id;
        $this->department_name = $officialInformation->department_name;
        $this->designation_name = $officialInformation->designation_name;
        $this->shift_time_name = $officialInformation->shift_time_name;
        $this->date_of_probation_end = $officialInformation->date_of_probation_end;
        $this->supervisor_id = $officialInformation->supervisor_id;
        $this->date_of_joining = $officialInformation->date_of_joining;
        $this->employee_id = $officialInformation->employee_id;

        $this->supervisors = User::role(User::ROLE_SUPERVISOR)->get();
        $this->user = $officialInformation;
        $this->user_teams = $this->user->teams->pluck('id')->toArray();
        $this->users = User::all();
        $this->designations = Designation::select('id', 'name')->get();
        $this->departments = Department::select('id', 'name')->get();
        $this->shift_timings = ShiftTime::select('id', 'name')->get();
        $this->team_selections = Team::select('id', 'name')->get();
        foreach ($this->team_selections as $key => $value) {
            $this->team_selections[$key]['select'] = in_array($value->id, $this->user_teams);
        }

        $this->user_role = $this->user->getRoleNames()[0];
        $this->roles = Role::whereNotIn('name', [User::ROLE_SUPER_ADMIN])->pluck('name');

    }

    public function changeRoleEvent($role)
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'You want to change the role!',
                'method_name' => 'updateUserRole',
                'method_params' => [$role]
            ]
        );
    }

    public function updateUserRole($role)
    {
        Helper::checkPermission('edit-users');

        $this->user->syncRoles($role);        
        
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Role has been updated successfully!'
            ]
        );
    }

    public function render()
    {
        return view('livewire.user.edit-official-information');
    }
}
