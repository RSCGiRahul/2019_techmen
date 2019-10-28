<?php

namespace App\Http\Controllers\Managment;

use App\Models\Gadget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Response;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('gadget')->get();
        return View('managment.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gadgets = Gadget::pluck('name', 'id');
        return View('managment.brand.create',compact('gadgets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array('name' => $request->name, 'gadget_id' => $request->gadget_id);
        Brand::create($data);
        return redirect(route('managment.brand.index'));
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
        $brands = Brand::findOrFail($id);
        $gadgets = Gadget::pluck('name', 'id');
        return View('managment.brand.edit',compact('brands','gadgets'));
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
        $editData =  Brand::findOrFail($id);
        $editData->name = $request->input('name', NULL);
        $editData->gadget_id = $request->input('gadget_id', NULL);
        $editData->save();
        return redirect (route('managment.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editData =  Brand::destroy($id);
        return Response::json('success');
    }
}
