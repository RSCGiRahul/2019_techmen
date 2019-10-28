<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnoseLevel extends Model
{
    use SoftDeletes;

    protected $table = 'diagnose_level';
    protected $fillable = ['diagnose_id', 'parent_id', 'name'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];





}
