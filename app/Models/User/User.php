<?php

namespace App\Models\User;

use App\Models\Education\EducationDegree;
use App\Models\Education\EducationDegreeType;
use App\Models\Experience\Experience;
use App\Models\Leave\Leave;
use App\Models\Leave\LeaveType;
use App\Models\Leave\LeaveUser;
use App\Models\Skill\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ShiftTime\ShiftTime;
use App\Models\Department\Department;
use Laravel\Jetstream\HasProfilePhoto;
use App\Models\Designation\Designation;
use App\Models\Media\Media;
use App\Models\Team\Team;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{

    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    // Roles
    public const ROLE_SUPER_ADMIN = 'Super Admin';
    public const ROLE_ADMIN = 'Admin';
    public const ROLE_HR = 'HR';
    public const ROLE_SUPERVISOR = 'Supervisor';
    public const ROLE_EMPLOYEE = 'Employee';

    public function __construct(array $attributes = array())
    {

        $this->table = config('database.models.' . class_basename(__CLASS__) . '.table');
        $this->fillable = config('database.models.' . class_basename(__CLASS__) . '.fillable');
        $this->hidden = config('database.models.' . class_basename(__CLASS__) . '.hidden');

        parent::__construct($attributes);
    }

    // append full_name in user object
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    // get user role with relationship
    // public function role()
    // {
    //     return $this->hasOne(Role::class, 'id', 'role_id');
    // }

    // get user designation with relationship
    public function designation()
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }

    // get user shift time with relationship
    public function shift()
    {
        return $this->hasOne(ShiftTime::class, 'id', 'shift_time_id');
    }

    // get user department time with relationship
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    // get user attendance with relationship
    public function attendances()
    {
        return $this->hasMany(UserAttendance::class, 'user_id', 'id');
    }

    // get user break with relationship
    public function breaks()
    {
        return $this->hasMany(UserBreak::class, 'user_id', 'id');
    }

    // get updatedBy with relationship
    public function createdBy()
    {
        return $this->belongsTo(self::class, 'created_by', 'id');
    }

    // get updatedBy with relationship
    public function updatedBy()
    {
        return $this->belongsTo(self::class, 'updated_by', 'id');
    }

    // get deletedBy with relationship
    public function deletedBy()
    {
        return $this->belongsTo(self::class, 'deleted_by', 'id');
    }

    // get user attendance with relationship
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'user_teams');
    }

    public function userTeams()
    {
        return $this->belongsTo(UserTeam::class, 'user_id', 'id');
    }

    // get user break with relationship
    public function media()
    {
        return $this->belongsToMany(Media::class, 'user_media', 'user_id', 'media_id');
    }

    // add new user into database
    public static function userCreate($request, $password)
    {
        $user_array = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'designation_id' => $request->designation_id,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'shift_time_id' => $request->shift_time_id,
            'password' => Hash::make($password),
            'created_by' => Auth::id(),
            'date_of_joining' => $request->date_of_joining,
            'date_of_probation_end' => $request->date_of_probation_end,
            'employee_id' => $request->employee_id,
            'cnic' => $request->cnic,
            'supervisor_id' => $request->supervisor_id,
        ];

        return User::create($user_array);
    }

    // get user personal information
    public static function  personalInformation($userId = null)
    {
        try {

            return DB::select('call store_procedure_user_personal_information(' . $userId . ')');
        } catch (\Exception $exception) {

            return ['status' => false, 'message' => 'Something went wrong please refresh your page', 'error' => $exception->getMessage()];
        }
    }

    // get user official information
    public static function  officialInformation($userId = null)
    {
        try {

            return DB::select('call store_procedure_user_official_information(' . $userId . ')');
        } catch (\Exception $exception) {

            return ['status' => false, 'message' => 'Something went wrong please refresh your page', 'error' => $exception->getMessage()];
        }
    }

    // relationship with approvals
    public function approvals()
    {
        return $this->hasMany(UserApprovalRequest::class, 'user_id', 'id');
    }

    // relationship with approval comments
    public function approvalComments()
    {
        return $this->hasMany(UserApprovalComment::class, 'created_by', 'id');
    }

    // user's lead
    public function team_member()
    {
        return $this->hasOne(User::class, 'supervisor_id', 'id');
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }


    // get user degree with relationship
    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'user_id', 'id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'user_id', 'id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_id', 'id');
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'user_id', 'id');
    }

    public function leaveUser()
    {
        return $this->hasMany(LeaveUser::class, 'user_id', 'id');
    }

    // logout user
    public function signout()
    {
        Auth::logout();
    }
}
