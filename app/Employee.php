<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //File Import ****

    public $fillable = ['name','position_id','email','salary'];




    public function position(){
        return $this->belongsTo('App\Position');
    }

    public function profile(){
        return $this->hasMany('App\Profile');
    }
}
