<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function manager_view(){

    	 $user= DB::select('call get_user()');
         $coursename= DB::select('call manager_level_course_name()');

          return view('ManagerView')->with('coursename',$coursename)->with('user',$user);
    }

    public function manager_submit(Request $req){
    	  $res['status']=0;
          $res['msg']=null;
     try {
          $user='';
          $coursename='';
          foreach ($req->user as $key => $value) {
          foreach ($req->coursename as $coursekey => $coursevalue) {
          $query=DB::table('user_course_mapping')
          ->insertGetId(['UserID'=>$value,
          	'Created_date'=>date("Y-m-d H:i:s"),
            'CourseID'=>$coursevalue,
            'AssignedType'=>'Manager',
            'AssignedBy'=>$value]);
          
      }
  }
      } catch(\Exception $ee){
      $res['status']=1;
      $res['msg']=$ee->getMessage();
    }

   
      $response=($res);
   return ($response);

    }
    
}
