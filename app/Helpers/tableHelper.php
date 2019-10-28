<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;
use App\Models\Region;

class tableHelper{

 public static function getBrowserRegion(){
        if (Cookie::get('city') !== false){
            $region = Region::find(Cookie::get('city'));
            // dump($region->name);
        }
        return ($region) ? $region->name : '';
		}
}