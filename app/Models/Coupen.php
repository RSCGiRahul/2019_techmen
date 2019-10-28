<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupen extends Model
{
    use SoftDeletes;

    const Percentage_type = 1;
    const Amount_type = 2;
    const AllRegion = 1;
    const AllProduct = 1;

    protected $fillable = ['name','all_region','all_product','code','type','discount','end_date'];

    public function region()
    {
        return $this->belongsToMany(Region::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getTypeAttribute($value)
    {
        return ($value == Self::Percentage_type) ? '%' : '' ;
    }

    public function  getAllRegionAttribute($value){
        return ($value == self::AllRegion) ? 'All': count($this->region) ;
    }


    public function  getAllProductAttribute($value){
        $count =  ($value == self::AllProduct) ? 'All': count($this->product) ;
         return $count;
    }


}
