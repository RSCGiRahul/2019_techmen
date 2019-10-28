<?php

namespace App\Http\Controllers\Managment;

use App\Models\Inventory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use Auth;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas =  Inventory::all();
//        dd($datas);
        return View('managment.inventory.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('managment.inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
//        dd($request->all());
        $user = new User;
        $authUser = $user->hasRole([User::Manager_Level, User::Admin_Level]);
//        dd($authUser);
        $data = array(
            'name' => $request->name,
            'quantity' => $request->quantity,
            'per_unit_price' => $request->per_unit_price,
            'total_price' => $request->per_unit_price * $request->quantity,
            'add_by' => Auth::user()->id,
            'status' => $authUser,
            'approved_by' => $authUser ? Auth::user()->id : NULL,
        );
        Inventory::create($data);
        return redirect()->route('managment.inventory.index')->with('success' , 'Data inserted Successfully');
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
       $data= Inventory::findOrFail($id);
//       dd($inventory);
       return View('managment.inventory.edit', compact('data'));
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
       $data = Inventory::findOrFail($id);
        $data->name = $request->name;
        $data->per_unit_price = $request->per_unit_price;
        $data->quantity = $request->quantity;
        $data->total_price = $request->per_unit_price * $request->quantity;
        $data->save();
        return redirect()->route('managment.inventory.index')->with('success', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('managment.inventory.index')->with('success', 'Data removed');
    }
}
