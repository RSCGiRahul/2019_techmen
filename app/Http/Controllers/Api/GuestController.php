<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Diagnose;
class GuestController extends Controller
{
    public function getProducts($id){
        $outputs = Product::whereBrandId($id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($outputs, 200);
    }

    public function getProductDiagnose($id){
        $product = Product::findOrfail($id);
        $outputs =  $product->productDignose()->with(['diagnose'])->get();
        $thi =  $outputs->map(function($output){
            return collect($output->toArray())
            ->only('diagnose')
            ->first();
        });
    //    $thi =  collect($outputs)->only('diagnose');
    //    dd($thi);
        // foreach($outputs as $output){
        //   dd ($output->diagnose);
        // }
        // dd($outputs>diagnose->name);
      $th=     $thi->toJson(JSON_PRETTY_PRINT);
        //   dd($th);
        return response($th, 200);

    }
}
