<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){
        return view('ajax.ajax_crude');
    }
    public function alldata(){
        $allData=Teacher::orderBy('id','DESC')->get();
        return response()->json($allData); 
        // to check ta fetching data =add after url (/alldata)
    }
    public function storeData(Request $request){
    // store er kaj hole Request use hobe 
        // optional validation 

        // $file_name=$this->saveImage($request->photo,folder:'images/offers');
        // insert er por 
        // 'photo'=>$file_name,
        $request->validate([
            'name'=>'required',
            'institute_property'=>'required',
        ]);
        // $request means whatever data from ajax function we are getting
        // we can access the data by $request->name or $otherGivenName
        $data=Teacher::insert([
            'name'=>$request->name,
            //'databaseColumnName'=> ajaxData
            'title'=>$request->title,
            'institute'=>$request->institute_property,
        ]); 
        return response()->json($data);
    }
    public function edit_data($id){
        // $id=get url variable value by $ 
        // just getting the row data of this id .
      $data=Teacher::findOrFail($id);
    //   pass it to ajax response 
      return response()->json($data); 
    }
    // store er khetre request use hoy 
    public function updateData(Request $request,$id){
        // $id=get url variable value by $ 
        // just getting the row data of this id .
      // optional validation 
        $request->validate([
        'name'=>'required',
        'institute_property'=>'required',
    ]);
    // $request means whatever data from ajax function we are getting
    // we can access the data by $request->name or $otherGivenName
    $data = Teacher::findOrFail($id)->update([
        'name'=>$request->name,
        //'databaseColumnName'=> ajaxData
        'title'=>$request->title,
        'institute'=>$request->institute_property,
    ]); 
    return response()->json($data);
    }
    
    public function delete_Data($id){
        // $id=get url variable value by $ 
        // just getting the row data of this id .
      $data=Teacher::findOrFail($id)->delete(); 
    return response()->json($data);
    }




}
