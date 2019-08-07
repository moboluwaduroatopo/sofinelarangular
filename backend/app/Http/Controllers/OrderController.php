<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use App\Product;
use App\Shopdetails;
use App\Categories;
use App\Order;
use App\Orderdetails;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $authid=auth()->user()->id;
       $cartProducts = $request->product;
     // return $cartProducts;
    
        //dd( $cartProducts);
         $order = new Order;
   $order->total = $request->total;
   $order->status = $request->status;
   $order->user_id = $authid;
$order->address =  $request->address;
$order->country =  $request->country;
$order->state =  $request->state;
$order->zip =  $request->zip;
    $order->save();

        $orderProducts=[];
        
   foreach ($cartProducts as $item) {
       $orderProducts[] =[
        'product_id'=>$item['product_id'],
        'qty' =>$item['qty'],
        'order_id' => $order->id,
        // 'user_id' =>$item['user_id']
       ] ; 
   }

    Orderdetails::insert($orderProducts);
//   if ($dat) {
//       Cart::destroy();
//   }
return response()->json(['message' => 'Order was Successfully ']);
//$orderProducts;
//     return view('product.success');
    //ret
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
}
