<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['gadget_id', 'name'];

    public function gadget()
    {
        return $this->belongsTo(Gadget::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
