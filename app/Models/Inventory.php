<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['name', 'quantity','per_unit_price','total_price','add_by','approved_by'];
}
