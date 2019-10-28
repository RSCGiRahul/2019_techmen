<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDiagnose extends Model
{
    use SoftDeletes;
    public $repairOnSite = 1; 
    public $repairPickup = 2; 
    public $table = 'product_diagnose';
    protected  $fillable = [
        'product_id',
        'diagnose_id',
        'diagnose_level_id',
        'market_price',
        'price',
        'description',
        'repair_type',
    ];
    public function diagnose()
    {
        return $this->belongsTo(Diagnose::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function diagnoseLevel()
    {
        return $this->belongsTo(DiagnoseLevel::class);
    }
    public function getRepairTypeAttribute($value)
    {
       return ($value == $this->repairOnSite ) ? 'On Site' : 'Pick Up' ;
    }
}
