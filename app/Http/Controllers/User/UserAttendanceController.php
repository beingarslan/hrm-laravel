<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAttendanceController extends Controller
{
    // Today's action's regarding the attendance of the users
    public function attendance()
    {
        Helper::checkPermission('edit-users-my-attendance');
        
        // get the current user with  shift, attendance and breaks
        $user = User::leftJoin('user_attendances', 'users.id', '=', 'user_attendances.user_id')
        ->leftJoin('user_breaks', 'users.id', '=', 'user_breaks.user_id')
        // ->where('user_attendances.attendance_date', Carbon::now())
        ->with('attendances', 'shift', 'breaks')->first();


        return view('modules.user.attendance.attendance', [
            'user' => $user,
        ]);
    }
}
