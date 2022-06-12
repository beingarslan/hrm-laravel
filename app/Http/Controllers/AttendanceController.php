<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    
    public function index()
    {
        Helper::checkPermission('view-attendances');

        return view('modules.attendance.index');
    }
}
