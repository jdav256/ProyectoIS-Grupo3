<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_it_fragile',
        'volume',
        'weight',
        'order_id'
    ];

    protected $casts = [
        'is_it_fragil' => 'boolean'
    ];
}
