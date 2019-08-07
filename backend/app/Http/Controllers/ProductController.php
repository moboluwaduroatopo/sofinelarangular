<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use App\Product;
use App\Shopdetails;
use App\Categories;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json([
            'catname' => Categories::where('id','=',$id)->get(),
                'cat'=> Product::orderBy('id')->join('Categories','products.cat_id','=','Categories.id')
                ->join('Users','products.user_id','=','Users.id')
               ->select('products.*','Categories.cat_name','Users.name','Users.ufile','Users.role')
               ->where('cat_id','=',$id)
               ->get()
               // return $dat;
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlep($id)
    {
        //$pro=Product::all()
       $pro= Product::where('id','=',$id)->get();
       $pros=$pro[0]->user_id;
       $cat=$pro[0]->cat_id;
       //return $pros;
         return response()->json([
            // 'catname' => Shop::where('id','=',$id)->get(),
                'shop'=> Product::orderBy('id')->join('Categories','Products.cat_id','=','Categories.id')
               ->join('Users','products.user_id','=','Users.id')
               ->select('Products.*','Categories.cat_name','users.name','users.role')
               ->where('products.id','=',$id)
               ->get(),
               'shopdetails'=> Product::orderBy('id')->join('Categories','Products.cat_id','=','Categories.id')
               ->join('Users','products.user_id','=','Users.id')
              ->select('Products.*','Categories.cat_name','Users.name','users.role','users.ufile')
              ->where('user_id','=',$pros)
              ->get(),
              'catdetails'=> Product::orderBy('id')->join('Categories','Products.cat_id','=','Categories.id')
               ->join('Users','products.user_id','=','Users.id')
              ->select('Products.*','Categories.cat_name','Users.name','users.role','users.ufile')
              ->where('cat_id','=',$cat)
              ->get()
               // return $dat;
                ]);
    // $shop= Product::orderBy('id')->join('Categories','Products.cat_id','=','Categories.id')
    //        ->join('Users','products.user_id','=','Users.id')
    //        ->select('Products.*','Categories.cat_name','users.name','users.role')
    //        ->where('products.id','=',$id)
    //        ->get();
    // return $shop->products.user_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->productfile ){
            $file=$request->productfile;
            $filename=time().'.' . explode('/', explode(':', substr($file, 0, strpos($file,';')))[1])[1];
           // $filename= time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save(public_path('/upload/uploads/'.$filename));
           //$user=auth()->user();
            $request->merge(['productfile'=>$filename]);
            //$user->save();
        }
      
       $shopdetails= Products::create($request->all());
        
        return $shopdetails;
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
