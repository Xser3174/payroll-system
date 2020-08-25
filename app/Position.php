<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $fillable = ['position_name','department_id'];
    
    //
    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
