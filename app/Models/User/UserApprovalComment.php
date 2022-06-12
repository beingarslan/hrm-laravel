<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApprovalComment extends Model
{
    use HasFactory;
    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    public function approval_requests(){
        return $this->belongsTo(UserApprovalRequest::class, 'user_approval_id', 'id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
