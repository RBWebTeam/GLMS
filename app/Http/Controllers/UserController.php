<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function audience_details(){
          $audience= DB::select('call get_audience()');
          $user= DB::select('call get_user()');
          //print_r($audience);exit();
          return view('audience-details')->with('audience',$audience)->with('user',$user);
    }

    public function user_submission(Request $req){
       // print_r($req->all());exit();
      $res['status']=0;
      $res['msg']=null;
      try {
        $users='';
          foreach ($req->users as $key => $value) {
     
          $query=DB::table('audience_user_mapping')
          ->insertGetId(['AudienceID'=>$req->audience,
          'UserID'=>$value]);

           $q = DB::table('audience_course_mapping')->select('CourseID')->where('AudienceID','=',$req->audience)->get();
           if  (count($q) > 0) {
            foreach ($q as $coursekey => $course_value) {
              // print_r($course_value);exit();
             $aud_user= DB::table('user_course_mapping')
            ->insertGetId(['UserID'=>$value,
              'CourseID'=>$course_value->CourseID,
            'Created_date'=>date("Y-m-d H:i:s"),
            'AssignedType'=>'Default',
            'AssignedBy'=>$value]);
          }
           }


    // echo json_encode($query);
  }
      } catch(\Exception $ee){
      $res['status']=1;
      $res['msg']=$ee->getMessage();
    }

   
      $response=($res);
   return ($response);
      
       
    }

   public function details(){
           $audience= DB::select('call get_audience()');
           $coursename= DB::select('call get_course_name()');
          return view('details')->with('audience',$audience)->with('coursename',$coursename);
   }

   public function submission(Request $req){
      $res['status']=0;
      $res['msg']=null;
       // print_r($req->all());exit();
    try {
          $audience='';
          $course='';
          foreach ($req->audience as $key => $value) {
          foreach ($req->coursename as $coursekey => $coursevalue) {
          $query=DB::table('audience_course_mapping')
          ->insertGetId(['AudienceID'=>$value,
           'CourseID'=>$coursevalue]);
          $q = DB::table('audience_user_mapping')->select('UserID')->where('AudienceID','=',$value)->get();
          foreach ($q as $userkey => $uservalue) {
          // print_r($uservalue->UserID);
            
          $aud_user= DB::table('user_course_mapping')
        ->insertGetId(['UserID'=>$uservalue->UserID,
          'Created_date'=>date("Y-m-d H:i:s"),
          'CourseID'=>$coursevalue,
          'AssignedType'=>'Default',
            'AssignedBy'=>$value]);
      }

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

