<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
	// use SoftDeletes;
    protected $guarded = [];

    public function Address()
    {
    	return $this->hasMany(Address::class);
    }

    public function applicationDetails()
    {
    	return $this->hasOne(ApplicationDetail::class);
    }

    public function products(){
    	return $this->belongsTo(Product::class,'product_id');
    }

    public function diagnose(){
    	return $this->belongsTo(Diagnose::class);
    }
}
