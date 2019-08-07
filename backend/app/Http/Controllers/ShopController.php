<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use App\Shop;
use App\Categories;
use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    //    $catid= $request->id;
    return response()->json([
    'catname' => Categories::where('id','=',$id)->get(),
        'cat'=> Shop::orderBy('id')->join('Categories','shops.cat_id','=','Categories.id')
        ->join('Users','shops.user_id','=','Users.id')
       ->select('shops.*','Categories.cat_name','Users.name','Users.ufile','Users.role')
       ->where('cat_id','=',$id)
       ->get()
       // return $dat;
        ]);
    }
    public function shopid()
    {
    //    $catid= $request->id;
    return response()->json([
    //'catname' => Shop::all()
        'shopid'=> Shop::orderBy('id')->join('Categories','shops.cat_id','=','Categories.id')
        ->join('Users','shops.user_id','=','Users.id')
       ->select('shops.*','Categories.cat_name','Users.name','Users.email')
      // ->where('cat_id','=',$id)
       ->get()
       // return $dat;
        ]);
    }
    public function shop()
    {
        return response()->json([
            'tailor'=>Product::orderBy('id')->join('Categories','products.cat_id','=','Categories.id')
        ->join('Users','products.user_id','=','Users.id')
       ->select('products.*','Categories.cat_name','Categories.cat_type','Users.name','Users.ufile','Users.role')
       ->where('cat_type','=','tailor')
       ->whereBetween('products.id',[3,8])  
        //->paginate(6),
       ->get(),
       'alltailor'=>Product::orderBy('id')->join('Categories','products.cat_id','=','Categories.id')
        ->join('Users','products.user_id','=','Users.id')
       ->select('products.*','Categories.cat_name','Categories.cat_type','Users.name','Users.ufile','Users.role')
       ->where('cat_type','=','tailor')
       //->decrement('products.id') , 
        //->paginate(6),
        ->get(),
       'shop'=>Product::orderBy('id')->join('Categories','products.cat_id','=','Categories.id')
       ->join('Users','products.user_id','=','Users.id')
      ->select('products.*','Categories.cat_name','Categories.cat_type','Users.name','Users.ufile','Users.role')
      //->where('cat_type','=','tailor')
       ->where('cat_type','=','shop')
       //->where('cat_id','=',$id)
       ->get()
            //'shop' => Categories::where('cat_type','shop')->get()
        ]);
        
        //return $tailor;
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
          if ($request->file ){
              $file=$request->file;
              $filename=time().'.' . explode('/', explode(':', substr($file, 0, strpos($file,';')))[1])[1];
             // $filename= time().'.'.$file->getClientOriginalExtension();
              Image::make($file)->resize(300, 300)->save(public_path('/upload/uploads/'.$filename));
             //$user=auth()->user();
              $request->merge(['file'=>$filename]);
              //$user->save();
          }
        
         $shop= Shop::create($request->all());
          
          return $shop;
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
