<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    
});
 Route::post('me','AuthController@updateprofile');
 Route::get('getuser', 'AuthController@getalluser');
 Route::post('addtype','AddtypeController@store');
  Route::get('gettype','AddtypeController@index');
  
   Route::post('addcat','CategoriesController@store');
   Route::get('cat','CategoriesController@index');
   Route::get('catid','CategoriesController@catid');


   Route::post('addshop','ShopController@store');
//    Route::get('shop/{id}','ShopController@index');
   Route::get('tailor','ShopController@shop');
   Route::get('shopid','ShopController@shopid');
//Shopdetails singlep
Route::post('addshopdetails','ShopdetailsController@store');
Route::get('shopdetails/{id}','ShopdetailsController@index');
Route::get('shop/{id}','ProductController@index');
Route::get('productdetails/{id}','ProductController@singlep');


Route::POST('/cart_add','CartController@addtocart');
Route::get('/cart-show','CartController@cartshow');
Route::POST('/update-cart','CartController@updatecart');
Route::POST('/checkout','OrderController@store');
Route::get('/delete-cart/{id}','CartController@deletecart');
 Route::get('test',function(){
     return response()->json([
         'user'=>['fname'=>'tawa',
         'lname'=>'adio']
     ]); 
 });
