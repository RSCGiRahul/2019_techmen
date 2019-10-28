<?php

namespace App\Http\Controllers\Managment;

use App\Models\Diagnose;
use App\Models\DiagnoseLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Diagnose::all();
        return View('managment.diagnose.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('managment.diagnose.create');
    }

    public function addMore()
    {
        return View('managment.diagnose.add-more');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->name as $name){
            $insertData[] = array(
                'name' => $name,
            );
        }

        Diagnose::insert($insertData);
        return redirect()->route('managment.diagnose.index')->with('success', 'Inserted Successfully');
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
       $editData = Diagnose::findOrFail($id);
        return View('managment.diagnose.edit', compact('id', 'editData'));
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
            $editData = Diagnose::findOrFail($id);
            $editData->name = $request->name;
            $editData->save();

        }
        catch (\Exception $e){
            $msg = $e->getMessage();
            return redirect()->back()->with('error', $msg);
        }
        return redirect()->route('managment.diagnose.index')->with('success', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editData = Diagnose::findOrFail($id);
        $editData->delete();
        $editData->diagnoseLevel()->delete();
        return redirect()->back()->with('msg' , 'Data removed as soft delete');
    }


}
