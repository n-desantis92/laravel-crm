<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{   
    //MASS ASSIGNEMENT
    protected $guarded = [];

    //RELAZIONI
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
