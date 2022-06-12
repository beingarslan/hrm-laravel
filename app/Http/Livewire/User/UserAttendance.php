<?php

namespace App\Http\Livewire\User;

use App\Models\User\UserAttendance as UserUserAttendance;
use App\Models\User\UserBreak;
use App\Models\User\UserView;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserAttendance extends Component
{

    public $first_check_in;
    public $first_check_in_late;
    public $first_break_in;

    public $is_late;


    // current user
    public $user;
    // current user attendance data
    public $user_attendance;
    // current user break data
    public $user_breaks;
    // user shift data
    public $user_shift;

    // total check in and break times
    public $total_check_in;
    public $total_break;

    // to provide real time data
    public $checked_in;
    public $breaked_in;

    public function mount()
    {
        // Get user details
        $this->user = UserView::find(Auth::id());

        // sift of the current user
        $this->user_shift = Auth::user()->shift;

        if (UserUserAttendance::where('user_id', Auth::user()->id)->where('attendance_date', Carbon::now()->format('Y-m-d'))->exists()) {
            $this->first_check_in = true;
            $this->user_attendance = $this->getUserAttendance();

            // get check in time without breaks
            $this->total_check_in = Carbon::now()->subSeconds($this->totalCheckInTimeWithoutBreak());

            // get break time
            $this->total_break = Carbon::now()->subSeconds($this->totalBreakTime());

            // get user breaks
            $this->user_breaks = $this->getUserBreaks();
        } else {
            // if user has not checked in yet
            $this->first_check_in = false;
            $this->first_break_in = false;
            $this->user_attendance = [];
            $this->checked_in = false;
            $this->breaked_in = false;
            $this->user_breaks = [];
        }
    }

    // checkIn function
    public function checkIn()
    {
        Auth::user()->attendances()->create([
            'attendance_date' => Carbon::now(),
            'login' => Carbon::now(),
            'is_late' => Carbon::now()->gt(Carbon::parse($this->user_shift->login)) ? 1 : 0,
            'check_in_ip_address' => request()->ip(),
            'check_in_user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
        $this->first_check_in = true;
        $this->first_break_in = false;
        $this->getUserAttendance();
        $this->total_check_in = Carbon::now()->subSeconds($this->totalCheckInTimeWithoutBreak());
        $this->checked_in = true;
    }

    // checkOut function
    public function checkOut($attendance_id)
    {
        $attendance = UserUserAttendance::find($attendance_id);

        $breaks_duration = UserBreak::where('user_attendance_id', $attendance_id)->sum('duration');
    
        $attendance->update([
            'logout' => Carbon::now(),
            'duration' => Carbon::now()->diffInSeconds(Carbon::parse($attendance->login)) - $breaks_duration,
            'check_out_user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'check_out_ip_address' => request()->ip(),
        ]);
        $this->getUserAttendance();
        $this->total_check_in = Carbon::now()->subSeconds($this->totalCheckInTimeWithoutBreak());
        $this->checked_in = false;
    }

    // break in function
    public function breakIn($attendance_id)
    {
        UserUserAttendance::where('id', $attendance_id)->first()->breaks()->create([
            'break_in' => Carbon::now(),
            'break_in_ip_address' => request()->ip(),
            'break_in_user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
        $this->getUserAttendance();
        $this->breaked_in = true;
        $this->total_break = Carbon::now()->subSeconds($this->totalBreakTime());
    }

    // break out function
    public function breakOut($break_id)
    {
        UserBreak::where('id', $break_id)->update([
            'break_out' => Carbon::now(),
            'duration' => Carbon::now()->diffInSeconds(Carbon::parse(UserBreak::where('id', $break_id)->first()->break_in)),
            'break_out_user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'break_out_ip_address' => request()->ip(),
        ]);
        $this->getUserAttendance();
        $this->breaked_in = false;
        $this->total_break = Carbon::now()->subSeconds($this->totalBreakTime());
    }

    // user attendance
    public function getUserAttendance()
    {
        $this->user_attendance = UserUserAttendance::where('user_id', $this->user->id)
            ->where('attendance_date', Carbon::now()->format('Y-m-d'))
            ->with('breaks')
            ->orderBy('created_at', 'desc')
            ->get();
        $this->checked_in = $this->isCheckedIn();
        $this->user_breaks = $this->getUserBreaks();
        return $this->user_attendance;
    }

    // user today's breaks
    public function getUserBreaks()
    {
        $user_attendance = UserUserAttendance::where('user_id', $this->user->id)
            ->where('attendance_date', Carbon::now()->format('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->pluck('id');

        $user_breaks = UserBreak::whereIn('user_attendance_id', $user_attendance)
            ->orderBy('created_at', 'desc')
            ->get();

        $this->user_breaks = $user_breaks;
        return $user_breaks;
    }

    // total break time
    public function totalBreakTime()
    {
        $total_break_time = 0;
        foreach ($this->user_breaks as $break) {
            if ($break->break_out) {
                $total_break_time += $break->duration;
            }
        }
        return $total_break_time;
    }

    // total check in time
    public function totalCheckInTime()
    {
        $total_check_in = 0;
        foreach ($this->user_attendance as $attendance) {
            if ($attendance->logout) {
                $total_check_in += $attendance->duration;
            }
        }
        return $total_check_in;
    }

    public function isCheckedIn()
    {
        if (
            count($this->user_attendance) > 0
            && $this->user_attendance->first()->login
            && !$this->user_attendance->first()->logout
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function isLogOut()
    {
        if (
            count($this->user_attendance) > 0
            &&  $this->user_attendance->first()->login
            && $this->user_attendance->first()->logout
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function isBreakIn()
    {
        if (
            count($this->user_attendance) > 0
            && count($this->user_breaks) > 0
            && $this->user_breaks->first()->break_in
            && !$this->user_breaks->first()->break_out
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function isBreakOut()
    {
        if (
            count($this->user_attendance) > 0
            && count($this->user_breaks) > 0
            && $this->user_breaks->first()->break_in
            && $this->user_breaks->first()->break_out
        ) {
            return true;
        } else {
            return false;
        }
    }
    // total check in time without break
    public function totalCheckInTimeWithoutBreak()
    {
        return $this->totalCheckInTime() - $this->totalBreakTime();
    }

    //  attendance duration without break in seconds
    public function attendanceDurationWithoutBreak($attendance_id)
    {
        return $this->totalCheckInTimeWithoutBreak();
    }

    public function render()
    {
        return view('livewire.user.user-attendance');
    }
}
