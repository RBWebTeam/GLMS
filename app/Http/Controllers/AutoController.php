<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function autoComplete(Request $request) {
    	
    	$term = Input::get('term');
        $products=DB::table('coursecategory')->select('CategoryName')
        ->where('CategoryName', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
        //print_r( $products);
        $data=array();
        foreach ($products as $product) {
                $data[]=array('value'=>$product->CategoryName);
        }
        if(count($data)){
             // print_r($data);
             return $data;
         }
        else
            return ['value'=>'No Result Found'];
    }
    
       
}

