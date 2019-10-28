<?php

namespace App\Http\Controllers\Managment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use Excel;
use App\Imports\ProductDiagnoseImport;
use App\Models\Customer;
class AdminController extends Controller
{
    public function index()
    {
        $arr = ['Rahl'];
        $user = Auth::user();
        return View('managment.index', compact('arr'));
    }
        
    public function uploadProductCsv(Request $request)
    {
        if($request->hasFile('excel_file')){
            $path = $request->file('excel_file')->getRealPath();
            $data = Excel::import(new ProductDiagnoseImport,$request->file('excel_file'));
            // $data = $path->get();
            // dd($data);
            $file = $request->file('excel_file');
            $fileName = 'file_'.date('m-d-Y_hia').'.'.$file->getClientOriginalExtension();
            $originalPath = public_path('images/files');
            $file->move($originalPath, $fileName);
            return redirect()->route('product.index');
        
        }
    }

    public function customer()
    {
      $outputs =   Customer::all();
      return view('managment.customer.index', compact('outputs'));
    }
}
