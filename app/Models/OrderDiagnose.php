<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDiagnose extends Model
{
    protected $guarded = [];
    public $timestamps = false;  

    const Approved = 1;
    const Decline = 2;
    const Pending = 0;
}
