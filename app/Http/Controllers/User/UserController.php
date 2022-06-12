<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\User\InsertUser;
use App\Models\Department\Department;
use App\Models\Designation\Designation;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\ShiftTime\ShiftTime;
use App\Models\Team\Team;
use App\Mail\User\UserRegistrationMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    // get all users from view_user
    public function index(Request $request)
    {
        Helper::checkPermission('view-users');
        
        return view('modules.user.index');
    }

    // add new user view
    public function addView()
    {
        Helper::checkPermission('create-users');

        $designations = Designation::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $shiftTimings = ShiftTime::select('id', 'name')->get();
        $roles = Role::whereNotIn('name', [User::ROLE_SUPER_ADMIN])->pluck('name');
        // $permissions= Permission::all();
        $teams = Team::select('id', 'name')->get();
        $supervisors = User::role(User::ROLE_SUPERVISOR)->get();
        
        return view('modules.user.add', compact('designations', 'departments', 'shiftTimings', 'roles', 'teams', 'supervisors'));
    }

    // insert user into database and redirect to edit page
    public function insertInDatabase(InsertUser $request)
    {
        $password = Str::random(12) . '-' . Helper::randomNumber();
        $user = User::userCreate($request, $password);

        $user->assignRole($request->role);

        $user->teams()->sync($request->team_ids);

        $this->sendPasswordEmail($user, $password);

        Toastr::success('User has been Added Successfully! <small>You can edit your profile detail here</small>', 'Success');
        return redirect()->route('user.update-user', $user->id);
    }

    // send password in email
    private function sendPasswordEmail($user, $random_password)
    {

        Mail::to($user->email)->send(new UserRegistrationMail($user, $random_password));
    }

    // edit user view
    public function edit($id)
    {
        if(!Auth::id() != $id)
        {
            Helper::checkPermission('edit-users-my-profile');
        }
        else{
            Helper::checkPermission('edit-users');
        }
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }

        $userId = $id;
        return view('modules.user.edit', compact('userId'));
    }

    public function security(Request $request)
    {
        Helper::checkPermission('view-users-my-profile');
        $user = Auth::user();
        return view('modules.user.security.security', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        Helper::checkPermission('edit-users');

        $validated = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validated->fails()) {
            Toastr::error($validated->errors()->first(), 'Error');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            Toastr::error('Current Password is not correct', 'Error');
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        // update password
        $user = User::find($user->id);
        $user->password = Hash::make($request->password);
        $user->save();

        Toastr::success('Password has been changed successfully', 'Success');
        return redirect()->back();
    }

    public function myProfile(Request $request){
        Helper::checkPermission('edit-users-my-profile');
        
        return view('modules.user.my-profile');
    }
}
