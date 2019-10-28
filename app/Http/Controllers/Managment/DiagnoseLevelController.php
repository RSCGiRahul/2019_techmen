<?php

namespace App\Http\Controllers\Managment;


use App\Models\Diagnose;
use App\Models\DiagnoseLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DiagnoseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $catid = NULL)
    {
        $paramaters = array('id'=> $id);
        if($catid){
            $paramaters['catid']=$catid;
        }
        $diagnose = Diagnose::with(['diagnoseLevelByParent'=> function ($q) use ($catid, $id){
            if($catid){
                $q->where('parent_id', $catid);
            }
            else{
                $q->where('parent_id', 0);
            }
            $q->whereDiagnoseId( $id);
        },'diagnoseLevel'=> function ($q) use ($catid, $id){
            if($catid){
                $q->where('id', $catid);
            }
            $q->whereDiagnoseId($id);
        }])->findOrFail($id);
//        dd($diagnose);
        return view('managment.diagnose.level.index', compact('diagnose', 'paramaters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $catid = NULL)
    {
        $paramaters = array('id'=> $id);
        if($catid){
            $paramaters['catid']=$catid;
        }
        $diagnose = Diagnose::with(['diagnoseLevelByParent'=> function ($q) use ($catid, $id){
            if($catid){
                $q->where('parent_id', $catid);
            }
            $q->whereDiagnoseId('id', $id);
        },'diagnoseLevel'=> function ($q) use ($catid, $id){
            if($catid){
                $q->where('id', $catid);
            }
            $q->whereDiagnoseId('id', $id);
        }])->findOrFail($id);
        return View('managment.diagnose.level.create',compact('diagnose','id', 'catid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id , $catid = NULL)
    {
//        dd($request->all());
        $diagnose =  Diagnose::findOrfail($id);
        foreach($request['name'] as $name) {

            $diagnose->diagnoseLevel()->create( [
                'parent_id' => ($catid) ? $catid : 0,
                'name' => $name,
                'status' => 1,
            ]);
        }


        return redirect()->route('managment.diagnose.index')->with('msg', 'Created Level Successfully');
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
        $editData = DiagnoseLevel::findorFail($id);
        return view('managment.diagnose.level.edit', compact('id','editData'));
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
            $editData = DiagnoseLevel::findOrFail($id);
           $editData->name = $request->name;
           $editData->save();
            return redirect()->back()->with('success', 'Update Successfully');
        }
        catch (Exception $e) {
            $msg =  $e->getMessage();
            dd($msg);
            return redirect()->back()->with('error',$msg);
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
        $dignoseLevel = DiagnoseLevel::findOrFail($id);
        dd($dignoseLevel);
        $dignoseLevel->delete();
        return redirect()->back()->with('success', 'Inserted Successfully');
    }
}
