<?php

namespace App\Http\Controllers\Api;

use App\Models\District;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiController extends Controller
{
        public function getDistrict($id)
        {
            $students = District::whereStateId($id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($students, 200);
        }
        public function getBrandProduct($id){
            return response( Product::whereBrandId($id)->get()->toJson(JSON_PRETTY_PRINT),200);
        }
}
