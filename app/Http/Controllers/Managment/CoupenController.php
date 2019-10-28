<?php

namespace App\Http\Controllers\Managment;

use App\Models\Coupen;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
class CoupenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Coupen::all();
        return View('managment.coupen.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('name', 'id');
        $products = Product::pluck('name', 'id');
        return View('managment.coupen.create', compact('regions', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $coupen =  Coupen::create([
        'name' => $request->name,
        'all_region' => $request->input('all_region', 0),
        'all_product' => $request->input('all_product', 0),
        'code' => $request->code,
        'type' => $request->type,
        'discount' => $request->discount,
        'end_date' => '2019-09-18',
    ]);
       if($request->all_product == 0){
           $coupen->product()->attach($request->product);
       }

       if($request->all_region == 0){
           $coupen->region()->attach($request->region);
       }
        return redirect()->route('managment.coupen.index')->with('success', 'Data inserted succesfully');
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
        $coupen = Coupen::findOrFail($id);
        $regions = Region::pluck('name', 'id');
        $products = Product::pluck('name', 'id')->toArray();
        return View('managment.coupen.edit',compact('coupen','regions', 'products'));
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
        $output = Coupen::findOrFail($id);
        $output->fill( $request->only([
            'name',
            'code',
            'type',
            'discount',
            'enddate',
       ]));
        $output->all_region = $request->input('all_region', 0);
        $output->all_product = $request->input('all_product', 0);
        $output->save();  
        if($request->has('all_product') == 0){
            $output->product()->sync($request->product);
        }
        if($request->has('all_region') == 0){
            $output->region()->sync($request->region);
        }

        return redirect()->route('managment.coupen.index')->with('succes', 'Data updated');
     }
     catch(Exception $e)
     {
        $msg = $e->getMessage();
        dd($msg);
        return redirect()->route()->back()->with('success', $msg);
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
        Coupen::destroy($id);
        return redirect()->back()->with('success', 'Removed');
    }
}
