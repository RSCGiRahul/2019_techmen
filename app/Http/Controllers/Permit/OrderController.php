<?php

namespace App\Http\Controllers\Permit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Product;
use App\Models\ProductDiagnose;
use App\Models\OrderDiagnose;
use App\Models\Order;
use App\Models\OrderDetail;
use Validator;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Cookie;
use Exception;
class OrderController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:customer'] );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customer_id = Auth::user()->id;
       $outputs = Order::with(['orderDetails','orderDiagnose', 'address','product'])->where('customer_id',$customer_id)->get();
      // dd($outputs->toArray());
       return view('customer.order.index',compact('outputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dump($request->all());
      $validator =  Validator::make($request->all(), [
            'product_id' => 'required',
            'diagnose' => 'array|required|min:1',
        ]);
      if($validator->fails()){
       return redirect()->route('price');
      }
      $product = $request->product_id; 
      $diagnose = implode(',', $request->diagnose); 
      return view('customer.order.addrees', compact('product', 'diagnose'));
       // dd($request->all());
       //   DB::beginTransaction();
       //      try{
       //             // $address = Address::create([
       //             //      'type' => 1,
       //             //      'region_id' => 1,
       //             //      'address' => $request->input('address', NULL),
       //             //      'phone' => $request->input('phone', NULL),
       //             // ]);
       //             productDiagnose::create([
       //                  'customer_id' => Auth::user('customer')->id,
       //                  'product_id' => $request->input('product_id', NULL),
       //                  'diagnose_id' => $request->input('diagnose', NULL),
       //                  'remark' => $request->input('remark','df'),
       //                  'address_id' => $address->id,
       //             ]);
       //          DB::commit();
       //          return redirect()->route('customer.order.index')->withAlert('Order Confirm.');
       //      }catch (\Exception $e){
       //          DB::rollBack();
       //          return redirect()->back()->with('error', 'Error Found');
       //      }
    }
    /**
    https://stackoverflow.com/questions/45443085/how-to-redirect-to-a-post-route-in-laravel
    return back()->withInput(['postvar1' => 'postval1']);  // L5.5

    * Place Final order
    *
    */

    public function placeOrder(OrderRequest $request)
    {
        // dd($request->all());
         DB::beginTransaction();
        try{
$total_price = 0;
// first entyr will goes into address
        $address = Address::create([
            'customer_id' => Auth::user('customer')->id,
            'region_id' => Cookie::get('city'),
            'address' => $request->input('product', NULL),
            'location' => $request->input('location', NULL),
            'remark' => $request->input('remark', NULL),
        ]);
 // $address->id = 1;
       $order =  Order::create([
            'customer_id' => Auth::user('customer')->id,
            'product_id' => $request->input('product', NULL),
            'address_id' => $address->id ,
            'customer_date' => $request->input('date', NULL),
            'customer_time' => $request->input('time', NULL),
            'customer_remark' => $request->input('remark', NULL),
        ]);
        //order details
       OrderDetail::create([
        'order_id' => $order->id,
       ]);
        //order diagnse
       foreach(explode(',', $request->diagnose) as $diagnose){
        $productDiagnose = ProductDiagnose::find($diagnose);
        $total_price = $total_price + $productDiagnose->price;
        // $productDiagnose = ProductDiagnose::where(['product_id' => $request->product, 'diagnose_id' => $diagnose])->first();
        // dd($productDiagnose);
            OrderDiagnose::create([
                'order_id' => $order->id,
                'product_diagnose_id' => $diagnose,
                'price' => $productDiagnose->price,
                'status' => 0,
             ]);

             $order->price = $total_price;
             $order->save();
       }
            DB::commit();
            return redirect(route('customer.order.index'))->withAlert('Order is placed.');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('/')->with('error', 'Error Found');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     *Show the all Diagnose of a product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDiagnose(Request $request)
    {
        // // dd($request);
        //  Diagnose::with(['diagnoseLevelByParent'=> function ($q) use ($catid, $id){
        //     if($catid){
        //         $q->where('parent_id', $catid);
        //     }
        //     $q->whereDiagnoseId('id', $id);
        $product = Product::findOrFail($request->product);
        $diagnoses = ProductDiagnose::with(['diagnose'])->whereProductId($request->product)->get();  
        // dd($diagnoses);
        return view('customer.order.product-diagnose', compact('diagnoses', 'product'));
    }
}
