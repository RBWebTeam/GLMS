<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function register_form(){
        
        return view('register_form');
    }
    
    public function register(Request $req){
        $query=DB::table('register_table')
    ->insert(['first_name'=>$req->first_name,
           'last_name'=>$req->last_name,
           'email'=>$req->email,
           'password'=>md5($req->password),
           'confirm_password'=>md5($req->confirm_password),
           'gender'=>$req->gender,
           'created_at'=>date("Y-m-d H:i:s"),
           'updated_at'=>date("Y-m-d H:i:s")]);
       
    }

    public function course_form(){
        
        return view('course-form');
    }

    public function course_submit(Request $req){
      // print_r($req->all());exit();
      // print_r($req->company_name);exit();
          $data = $req->all();
          // print_r($data);exit();
      $user = DB::table('coursemaster')->pluck('CourseID')->toArray();
       if(in_array($data['course_id'],$user))
        {
         
          if($user){
   // print_r( $id);exit();
     
                return Response::json(array(
                            'data' => false,
                        ));
            }
         }
         else
         {
          $company_name='';
      foreach ($req->company_name as $key => $value){
       $company_name .=  $value.',';
      } 
      try{

           $str = 'package';
          $file=$req->file($str);
          // print_r($file);exit();
          $ext=$file->getClientOriginalExtension();
          $destinationPath = 'upload/course_doc/'.$req->course_id;
          $filename=$str.".".$ext;
         // print_r($destinationPath."-----".$filename);exit();
          $file->move($destinationPath,$filename);

       $id=DB::table('coursemaster')
      
    ->insertGetId(['CourseName'=>$req->course_name,
           'CourseType'=>$req->course_type,
           'CourseID'=>$req->course_id,
           'CourseCategoryID'=>$req->course_category,
           'CourseTopic'=>$req->course_topic,
           'Duration'=>$req->duration,
           
           'Level'=>$req->level,
           'StartDate'=>$req->start_date,
           'EndDate'=>$req->end_date,
           'CoursePackage'=>$destinationPath.'/'.$filename,
           'IsActive'=>$req->active,
           'ManagerNomination'=>$req->manager_nomination,
           'CompanyName'=>$company_name,
           'VersionID'=>$req->version,
           'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")]);
      $company_name='';
       foreach ($req->company_name as $key => $value) {
       $mappingid=DB::table('course_company_mapping')
    ->insertGetId(['CouseID'=>$id,
           'CompanyID'=>$value]);
       }
      }catch(\Exception $ee){
        print_r($ee->getMessage());
      }

      if($id){
   // print_r( $id);exit();
     
                return Response::json(array(
                            'data' => true,
                        ));
            }else{
                return Response::json(array(
                            'data' => false,
                        ));
            }
     
         }
      
         
       
    }
    

    public function course(){
        
        $query = DB::table('coursecategory')->select('CourseCategoryID', 'CategoryName', 'IsActive')->get();
        echo json_encode($query);
    }

    public function course_details(){

      Session::put('CourseID',$_GET['CourseID']);
      return view('course-details');
    }

     public function get_course_status(Request $req){

    
     $req['User_ID']=Session::get('UID');

     
      $details= DB::insert("call  get_course_status ('".$req["User_ID"]."','".$req["Course_ID"]."','".$req["Course_Status"]."','".$req["TimeSpend"]."')");
       return json_encode($details);
    }

    public function details_course(){
      $CourseID=Session::get('CourseID');
      $query = DB::table('coursemaster')->select('CourseName', 'Duration','CoursePackage','CourseType')->where('id','=',$CourseID )->get();
      return json_encode($query);
    }


    public function login_form(){
      return view('login-form');
    }

 public function login_submit(Request $req){
     
  $response = file_get_contents("http://landmarktimes.policyboss.com/eis/json_test/validate.php?unm=".$req->username."&pwd=".$req->psw);
 
  if($response=="1"){      
       $query = DB::table('user_master')->select('UID')->where(
                        'UID', '=', $req->username)->first();
        if($query){
          Session::put('UID',$query->UID);
          // $req->session()->put('UID',$query->UID);
            return json_encode(array(
                                'data' => 1,
            ));
        }
        else{
            return json_encode(array(
                                'data' => 2,
            ));
        }
    }
    else{
      return json_encode(array(
                                'data' => 0,
          ));
    }

}
 
       
}

