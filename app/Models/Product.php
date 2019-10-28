<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','brand_id','description'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productDignose()
    {
        return $this->hasMany(ProductDiagnose::class);
    }
}
