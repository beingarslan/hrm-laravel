<?php

namespace App\Http\Livewire\User;

use App\Models\User\UserAttendance;
use App\Models\User\UserBreak;
use App\Models\User\UserDailyAttendanceView;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class UserAttendanceList extends Component
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

    public $userId;

    public function mount($userId){
        $this->userId = $userId;
    }
 
    public function filterUserAttendanceList(){
        
        $attendances =  UserDailyAttendanceView::where('user_id',  $this->userId);
        // dd($attendances);
        if (!empty($this->attendance_date)){
            $attendances = $attendances->where('attendance_date', 'LIKE', '%' . $this->attendance_date . '%');
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
    public function viewSessions($attendance_date)
    {
        $this->sessions = UserAttendance::where('user_id', $this->userId)
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

    public function viewBreaks($attendance_date)
    {
        $user_attendance_ids = UserAttendance::where('user_id', $this->userId)
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

    public function render()
    {
        
        $attendances = $this->filterUserAttendanceList();
        $data = ['attendances' => $attendances];

        return view('livewire.user.user-attendance-list', $data);
    }
}
