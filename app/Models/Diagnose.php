<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnose extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','status'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];


    public function diagnoseLevel()
    {
        return $this->hasMany(DiagnoseLevel::class);
    }

    public function diagnoseLevelByParent()
    {
        return $this->hasMany(DiagnoseLevel::class);
    }
}
