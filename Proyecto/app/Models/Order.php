<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $dates = [
        'order_date',
        'delivery_date'
    ];

    protected $casts = [
        'order_date' => 'date',
        'delivery_date' => 'date'
    ];

    protected $dateFormat = 'Y-m-d';

    public function packages()
    {
        return $this->hasMany('App\Models\Package');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee','employee_id');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Models\Address')
                    ->using('App\Models\AddressOrder');
    }
}
