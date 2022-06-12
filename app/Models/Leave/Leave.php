<?php

namespace App\Models\Leave;

use App\Models\User\User;
use App\Models\User\UserApprovalRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function __construct(array $attributes = array())
    {

        $this->table = config('database.models.' . class_basename(__CLASS__) . '.table');
        $this->fillable = config('database.models.' . class_basename(__CLASS__) . '.fillable');
        $this->hidden = config('database.models.' . class_basename(__CLASS__) . '.hidden');

        parent::__construct($attributes);
    }

    // user_approval_request

    public function approval(){
        return $this->belongsTo(UserApprovalRequest::class, 'user_approval_request_id', 'id');
    }

    public function leaveType(){
        return $this->belongsTo(LeaveType::class, 'leave_type', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
