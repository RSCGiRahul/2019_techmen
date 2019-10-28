<?php

namespace App\Http\Controllers\Managment;

use App\Models\Diagnose;
use App\Models\DiagnoseLevel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\ProductDiagnose;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
class ProductDiagnoseController extends Controller
{

     /**
     * Display a show all product with diagnose.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProductDiagnose()
    {
       $output =  ProductDiagnose::all();
      return view('managment.product-diagnose.all', compact('output'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $product =   Product::with(
          ['productDignose' => function($q) use ($id) {
            $q->where('product_id', $id);
          }],
                  'productDignose.diagnose',
                  'productDignose.diagnoseLevel')
                  ->findOrFail($id);
      return view('managment.product-diagnose.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $diagnose_id =  $product->productDignose()->pluck('diagnose_id') ;
        $diagnoses = Diagnose::whereNotIn('id',$diagnose_id)->pluck('name', 'id');
        return View('managment.product-diagnose.create', compact('product','diagnoses'));
    }

    public function addPrice(Request $request, $id)
    {
        $parent_id = $request->parent_id;
        if($request->next)
        {
            $otherData =  $this->nextDiagnose($request);
            $product = Product::findOrFail($id);
            if(count($otherData['diagnoses']) == 0){
                return view('managment.product-diagnose.add-price',compact('product','parent_id'))->with($otherData);
            }
           return view('managment.product-diagnose.level',compact('product','parent_id'))->with($otherData);
        }
        else{
            return view('managment.product-diagnose.add-price',compact('product','parent_id'));

        }
    }

    public function checkForNextLevel($request)
    {
        $parent_id =  ($request->parent_id) ?? 0;
        $diagnose_id = $request->diagnose_id;
        $diagnoses =  DiagnoseLevel::where(
            [
                'parent_id' => ($request->parent_id) ?? 0 ,
                'diagnose_id' => $request->diagnose_id
            ]
        )->pluck('name', 'id');

    }


    public function nextDiagnose(Request $request)
    {
        $parent_id =  ($request->parent_id) ?? 0;
        $diagnose_id = $request->diagnose_id;
        $diagnoses =  DiagnoseLevel::where(
                           [
                               'parent_id' => ($request->parent_id) ?? 0 ,
                               'diagnose_id' => $request->diagnose_id
                           ]
                       )->pluck('name', 'id');
        return array(
            'parent_id' =>$parent_id,
            'diagnose_id' => $diagnose_id,
            'diagnoses' =>$diagnoses
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      try{
          $insData = [
              'product_id' => $id,
              'diagnose_id' => $request->diagnose_id,
              'diagnose_level_id' =>$request->diagnose_level_id=0,
              'market_price' =>$request->market_price,
              'price' => $request->price,
              'description' =>$request->description,
              'repair_type' => $request->venue,
          ];
        ProductDiagnose::create( $insData);
          return redirect()->route('managment.product.index')->with('success', 'Update Successfully');
      }catch (\Exception $e){
          $msg = $e->getMessage();
          return redirect()->back()->with('error', $msg);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $result = ProductDiagnose::findOrFail($id);
       $brands = Brand::pluck('name', 'id');
       $products = Product::whereBrandId($result->product->brand_id)->get();
       return view('managment.product-diagnose.edit',compact('result','brands','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $output = ProductDiagnose::findOrFail($id);
            $data = $request->only(
                'market_price',
                'price',
                'repair_type',
                'description'
            );
            $output->fill($data)->save();
            return redirect()->route('managment.product.diagnose.all')->with('succes', 'Data updated');
        }catch(\Exception $e){
            $msg = $e->getMessage();
            dd($msg);
            return redirect()->back()->with('error', $msg); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductDiagnose::destroy($id);
        return redirect()->route('managment.product.diagnose.all')->with('success', 'Removed');
    }
}
