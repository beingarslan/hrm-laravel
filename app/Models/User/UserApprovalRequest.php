<?php

namespace App\Models\User;

use App\Models\Approval\ApprovalStatus;
use App\Models\Approval\ApprovalType;
use App\Models\Leave\Leave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApprovalRequest extends Model
{

    use HasFactory;

    public function __construct(array $attributes = array())
    {

        $this->table = config('database.models.' . class_basename(__CLASS__) . '.table');
        $this->fillable = config('database.models.' . class_basename(__CLASS__) . '.fillable');
        $this->hidden = config('database.models.' . class_basename(__CLASS__) . '.hidden');

        parent::__construct($attributes);
    }

    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(UserApprovalComment::class, 'user_approval_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ApprovalStatus::class, 'approval_status_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(ApprovalType::class, 'approval_type_id', 'id');
    }

    public function leave()
    {
        return $this->hasOne(Leave::class, 'user_approval_request_id', 'id');
    }
}
