<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Order extends Model
{
  	use SoftDeletes;
    protected $guarded = [];
    public $timestamps = false;  
// https://stackoverflow.com/questions/48681579/insert-date-format-in-dd-mm-yyyy-through-laravel-eloquent-model
    public function setCustomerDateAttribute($value)
    {
        $date = Carbon::parse($value);
         $this->attributes['customer_date'] = $date->format('Y-m-d');
    }

    public function setCustomerTimeAttribute($value)
    {
        $this->attributes['customer_time'] =  date("H:i", strtotime($value));
    }
// this is mutator
     public function getCustomerDateAttribute($value)
    {
        if($value){
            $date = Carbon::parse($value);
            return $date->format('d, M, Y');
        }
        
    }

    public function getCustomerTimeAttribute($value)
    {
        if($value){
            return date("h:i:a", strtotime($value));
        }
    }


    /*
    Order Details has one relationship
    */

    public function orderDetails()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*
    Order Diagnose has one relationship
    */

    public function orderDiagnose()
    {
        return $this->hasMany(OrderDiagnose::class);
    }

    /*
    Order Diagnose has one relationship
    */

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /*
    Order Diagnose has one relationship
    */

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
