<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
        
    }

    public function order(){
        return $this->hasMany('App\Models\Order');
    }
}
