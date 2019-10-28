<?php

namespace App\Http\Controllers\Managment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return View('managment.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::pluck('name', 'id');
        return View('managment.product.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
        );
        Product::create($data);
        return redirect(route('managment.product.index'));
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
       $output = Product::findOrFail($id);
        $brands = Brand::pluck('name', 'id');
       return View('managment.product.edit',compact('output','brands'));
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
            $editData = Product::findOrFail($id);
            $editData->name = $request->name;
            $editData->brand_id = $request->brand_id;
            $editData->description = $request->description;
            $editData->save();

        }
        catch (\Exception $e){
            $msg = $e->getMessage();
            return redirect()->back()->with('error', $msg);
        }
        return redirect()->route('managment.product.index')->with('success', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data =  Product::findOrFail($id);
       $data->status = 0;
       $data->save();
       return redirect(route('managment.product.index'))->with('success',' Data Deleted');
    }
}
