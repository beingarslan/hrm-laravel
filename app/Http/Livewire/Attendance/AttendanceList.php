<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance\AttendanceView;
use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\ShiftTime\ShiftTime;
use App\Models\User\UserAttendance;
use App\Models\User\UserBreak;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class AttendanceList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $sessions = [];
    public $breaks = [];
    
    public $departments = [];
    public $designations = [];
    public $roles = [];
    public $shifts = [];

    public $department_id;
    public $shift_id;
    public $role_id;
    public $full_name;
    public $attendance_date;
    public $designation_id;

    public function render()
    {

        $this->departments = Department::all();
        $this->designations = Designation::all();
        $this->roles = Role::all()->pluck('name');
        $this->shifts = ShiftTime::all();

        $attendances = $this->filterAttendanceList();
        $data = ['attendances' => $attendances];
        return view('livewire.attendance.attendance-list', $data);
    }

    public function filterAttendanceList()
    {
        $attendances =  AttendanceView::query();

        if (!empty($this->department_id)){
            $useattendancesrs = $attendances->where('department_id',  $this->department_id);
        }

        if (!empty($this->designation_id)){
            $attendances = $attendances->where('designation_id',  $this->designation_id);
        }

        if (!empty($this->shift_id)){
            $attendances = $attendances->where('shift_time_id',  $this->shift_id);
        }

        if (!empty($this->attendance_date)){
            $attendances = $attendances->where('attendance_date', 'LIKE', '%' . $this->attendance_date . '%');
        }

        if (!empty($this->full_name)){
            $attendances = $attendances->where('first_name', 'LIKE', '%' .  $this->full_name . '%')
            ->orWhere('middle_name', 'LIKE', '%' .  $this->full_name . '%')
            ->orWhere('last_name', 'LIKE', '%' .  $this->full_name . '%');
        }
        
        // order by
        $attendances = $attendances->orderBy('attendance_date', 'desc');
        
        return $attendances->paginate(30);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }

    // viewSessions
    public function viewSessions($user_id, $attendance_date)
    {
        $this->sessions = UserAttendance::where('user_id', $user_id)
        ->where('attendance_date', Carbon::parse($attendance_date)->format('Y-m-d'))
        ->orderBy('created_at', 'desc')
        ->get();
        $data = [
            'sessions' => $this->sessions,
        ];
        $this->dispatchBrowserEvent(
            'model:sessions',
            [
                'data' => $data
            ]
        );
    }

    public function viewBreaks($user_id, $attendance_date)
    {
        $user_attendance_ids = UserAttendance::where('user_id', $user_id)
        ->where('attendance_date', Carbon::parse($attendance_date)->format('Y-m-d'))
        ->orderBy('created_at', 'desc')
        ->pluck('id');

        $this->breaks = UserBreak::whereIn('user_attendance_id', $user_attendance_ids)->get();
        $data = [
            'sessions' => $this->sessions,
        ];
        $this->dispatchBrowserEvent(
            'model:breaks',
            [
                'data' => $data
            ]
        );
    }
}
