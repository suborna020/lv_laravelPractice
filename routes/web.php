<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/ajax',[\App\Http\Controllers\AjaxController::class,'index']);
  Route::get('/alldata',[\App\Http\Controllers\AjaxController::class,'alldata']);
  Route::post('/teacherDataStore',[\App\Http\Controllers\AjaxController::class,'storeData']);
//   url id get by {}
  Route::get('/editData/{id}',[\App\Http\Controllers\AjaxController::class,'edit_data']);
  Route::post('/teacherDataUpdate/{id}',[\App\Http\Controllers\AjaxController::class,'updateData']);
  
  Route::get('/destroyData/{id}',[\App\Http\Controllers\AjaxController::class,'delete_Data']);



///Restfull api works
Route::get('/api',[\App\Http\Controllers\ApiController::class,'index']);

