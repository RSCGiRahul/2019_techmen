<?php

namespace App\Models;

use App\Models\Traits\TestTrait;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use TestTrait;

    public $timestamps = false;
}
