<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Region extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','district_id', 'pincode'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
