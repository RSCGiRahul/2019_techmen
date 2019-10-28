<?php

namespace App\Http\Controllers\Managment;

use App\Http\Requests\RegionRequest;
use App\Models\Region;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Auth;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with('district','district.state')
        $allRegion = Region::all();
        return View('managment.region.index', compact('allRegion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $allState = State::pluck('name','id');
        return View('managment.region.create');
        // ->withState($allState);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
       $requestData =  $request->only('name', 'pincode');
       // $requestData['district_id'] = $request->district;
       $post = Region::create($requestData);
       return redirect(route('managment.region.index'));
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
        $region = Region::findOrFail($id);
        // $state = State::pluck('name','id');
        return view('managment.region.edit', compact('region'));
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
        $region = Region::findOrFail($id);
        try{
            $region->fill($request->only(
                // 'district_id',
                'pincode',
                'name'
            ))->save();  
          return redirect()->route('managment.region.index')->with('success','Updated Successfully');
        }catch(Exception $e){
            $msg = $e->getMessage();
            return redirect()->route()->back()->with('error',$msg);
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
        // dd($id);
        $region =  Region::findOrFail($id);
        $region->delete();
        return redirect()->back()->with('success' , config('messages.delete'));
    }
}
