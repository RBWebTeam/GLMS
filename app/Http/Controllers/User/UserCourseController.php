<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class UserCourseController extends Controller
{
    public function user_course_get_request()
    {
        return view('User/UserCourseRequest');
    }

    // public function NotAssing_Course()
    // {

    // 	// $users = DB::select('call User_Course_Request()');
    //      return view('User/UserCourseRequest');
    // }

    public function insert_not_assing_course(Request $req)
    {
        $data = $req->id;
    	$UserID=Session::get('UID');
    	DB::table('user_course_mapping')->insert(
    		['UserID'=>$UserID,
    		'CourseID'=>$data,
    		'Created_date'=> \Carbon\Carbon::now('Asia/Kolkata'),
            ]);
    	//Session::flash('message', 'Assing Course successfully');
    	//return view('User/UserCourseRequest');
    }

    public function insert_user_request_course(Request $req)
    {

        $data = $req->id;
    	$UserID=Session::get('UID');
    	$query=DB::table('user_course_request')->insert(
    		['UserID'=>$UserID,
    		'CourseID'=> $data,
    		'Request_date'=> \Carbon\Carbon::now('Asia/Kolkata'),
    		'manager_status'=>'0',
    		'comments'=>'test',
        ]);
        //  Session::flash('message', 'Request Course successfully');
    	// return view('User/UserCourseRequest');
    }
}
