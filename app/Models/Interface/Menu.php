<?php

namespace App\Models\Interface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    public function __construct(array $attributes = array()){

        $this->table = config('database.models.'.class_basename(__CLASS__).'.table');
        $this->fillable = config('database.models.'.class_basename(__CLASS__).'.fillable');
        $this->hidden = config('database.models.'.class_basename(__CLASS__).'.hidden');

        parent::__construct($attributes);
    }

    public function parent(){
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
