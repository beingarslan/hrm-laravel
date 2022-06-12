<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBreak extends Model{

    use HasFactory;

    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    // get user break with relationship
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // get user attendance with relationship
    public function user_attendance(){
        return $this->belongsTo(UserAttendance::class,'user_attendance_id','id');
    }

}
