<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class HomeController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function get_course(){
    	$query = DB::table('user_course_mapping')->select('CourseID', 'Created_date')->where('UserID','=',Session::get('UserID'))->get();
    	// print_r($query);
       return json_encode($query);
    }


     public function get_course_name(){

         $UserID=Session::get('UID');
        $details= DB::select('call get_details(?)', array($UserID));
        //$details -> bind_param();
        // print_r($details);exit();
       return json_encode($details);
    }

    public function get_recently_accessed_course(){
            $UserID=Session::get('UID');
        $recently_accessed=DB::select('call get_recently_accessed_course(?)',array($UserID));
       return json_encode($recently_accessed);
    }

    public function super_admin()
    {        
         $UserID = Session::get('UID');    
         $IsSupperAdmin = DB::table('user_master')
                     ->select('IsSupperAdmin')
                     ->where('UID',$UserID)
                     ->get();                    
                     // print_r(expression)
                    // print_r($IsSupperAdmin[0]->IsSupperAdmin); exit();
        return view('index')->with('IsSupperAdmin',$IsSupperAdmin);
    }
    
}
