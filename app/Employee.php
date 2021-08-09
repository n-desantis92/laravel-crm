<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    
    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }
    
}
