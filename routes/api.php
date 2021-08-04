<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
// use App\Models\Product;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/products','\App\Http\Controllers\ProductController');
// products/11/reviews 
Route::group(['prefix'=>'products'],function(){
Route::apiResource('/{product}/reviews', '\App\Http\Controllers\ReviewController');
});
