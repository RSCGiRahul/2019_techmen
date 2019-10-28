<?php

namespace App\Http\Controllers\Managment;

use App\Models\Gadget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GadgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allGadget = Gadget::get();
        return View('managment.gadget.index',compact('allGadget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('managment.gadget.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allRequest = $request->only('name');
        $gadgetData = array(
            'name' => $request['name'],
            'category_id' => 1,
        );
        $user =  Gadget::create($gadgetData);
        return redirect (route('managment.gadget.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editGadget =  Gadget::findOrFail($id);
        return View('managment.gadget.edit', compact('editGadget'));

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
        $editGadget =  Gadget::findOrFail($id);
        $editGadget->name = $request->input('name', NULL);
        $editGadget->save();
        return redirect (route('managment.gadget.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gadget = Gadget::findOrFail($id);
        $gadget->delete();
        return response()->json([
            'Success'
        ]);
    }
}
