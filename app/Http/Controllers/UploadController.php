<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    
    public function uploaded_docs(){
 

      return view('view-uploaded-docs');

    	// $query = DB::table('coursemaster')->select('CourseType', 'CoursePackage')->get();

     //     echo json_encode($query);
    }
      

       public function uploaded(){
 

       

    	$query = DB::table('coursemaster')->select('CourseType', 'CoursePackage')->get();
         return $query;
         // echo json_encode($query);
    } 

    public function modify_course(){
        return view('ModifyCourse');
    }

    public function course_updation(){
         $modify_details= DB::select('call get_modification()');
         return json_encode($modify_details);
    } 
}

