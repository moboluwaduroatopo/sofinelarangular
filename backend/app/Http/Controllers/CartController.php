<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtocart(Request $request)
    {
         $id=$request->pro_id;   
        
      //dd($request->all());
            $pro = new Product;
        $productById = $pro::where('id',$id)->first();
        //return $productById;
        Cart::add([
        	'id'=>$id,
        	'name'=>$productById->product_name,
        	'price'=>$productById->price,
        	'qty'=>$request->qty
           // 'image'=>$productById->productfile
        ]);
    //     $cartProducts = Cart::Content();
	// //return $dat;
    //  dd( $cartProducts);
    return redirect('/api/cart-show');
       //return Cart::Content();
    }
public function cartshow(){
        $dat = Product::all();
	$cartProducts = Cart::content();
	//return $dat;
	// dd( $cartProducts);

     return $cartProducts;
     //->with('cartProducts',$cartProducts)->with('dat',$dat);
}
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
        //
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
