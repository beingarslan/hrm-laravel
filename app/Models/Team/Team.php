<?php

namespace App\Models\Team;

use App\Models\User\User;
use App\Models\User\UserTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model{

    use HasFactory;

    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    // get team members with relationship
    public function users(){
        return $this->belongsToMany(User::class, UserTeam::class,'team_id','user_id');
    }



}
