<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TestModel;
class AudienceController extends Controller


{
    public function audience(){

    	$query=DB::table('audiance_data')->select('audiancename','status','id')->get();

    	$quey=new TestModel();

    	$query=$quey->select('id','audiancename','status')->get();
         return view('audience',['query'=>$query]);
  
 }




}


