<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AddressOrder extends Pivot
{
    use HasFactory;//

    protected $table = 'address_order';

    protected $guarded = [];
    
}
