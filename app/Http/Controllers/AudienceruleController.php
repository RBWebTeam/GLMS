<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class AudienceruleController extends Controller


      // Audiencerule view
      
      {
      	public function Audiencerule1 () {

        }

           public function Audienceruledepartment () {

            $query=DB::table('audiance_master')->select('audiance_master.*')->get();
            $departmen=DB::table('department_master')->select('department_master.*')->get();
            $Designation=DB::table('desiganation_master')->select('desiganation_master.*')->get();
            $userdetails=DB::table('user_details')->select('user_details.*')->get();

          return view('audiencerule',['query'=>$query,'departmen'=>$departmen,'Designation'=>$Designation,'userdetails'=>$userdetails,]);

           }

            public function audiencerule_store (Request $req) {

              
                   $audience=$req->audience;
                   $department=$req->department;
                   $designation=$req->designation;
                   $fromdate=$req->fromdate;
                   $todate=$req->todate;
                   $EmpCode=$req->EmpCode;


                   $department_id=implode(",",$department);
                   $designation_id=implode(",",$designation);
                   $EmpCode_id=implode(",",$EmpCode);                      
                  
                DB::table('audience_rule')->insert(

               ['Audience_id'=>$audience,'Dept_id'=>$department_id,'Desig_id'=>$designation_id,'DOJ_FROM'=>$fromdate,'DOJ_TO'=>$todate,'Dept_Head'=>0,'Employy_code'=>$EmpCode_id,'BH_id'=>0]);

             
                        return redirect ('audiencerule');
                          }

                      //Course to coursegroup mapping view

                  public function coursegroupmapping () {

           $query=DB::table('course_group')->select('course_group.*')->get();
           $cmaster=DB::table('coursemaster')->select('coursemaster.*')->get();

           return view('course-to-coursegroup-mapping',['query'=>$query,'cmaster'=>$cmaster,]);
          }

              public function coursegroupmapping_store (Request $req){

                 //$course=implode(",",$req->course);

               //    DB::table('coursegroup_mapping')->insert(
                    
               //  ['coursegroup_id'=>$req->coursegroup1,'courseid'=>$course, 'status'=>$req->status,]);

                // return redirect ('course-to-coursegroup-mapping');


                foreach ($_POST['course'] as $name) {

                  DB::table('coursegroup_mapping')->insert(
                    
                ['coursegroup_id'=>$req->coursegroup1,'courseid'=>$name, 'status'=>$req->status,]);


                }
                return redirect ('course-to-coursegroup-mapping');


               }

               public function audiencecoursegroupmapping (){

                $query=DB::table('audiance_master')->select('audiance_master.*')->get();

                $coursemapping=DB::table('course_group')->select('course_group.*')->get();

                return view ('audience-to-coursegroup-mapping',['query'=>$query,'coursemapping'=>$coursemapping,]);
               }

                public function audiencecoursegroupmapping_store (Request $req){

                DB::table('audience-coursegroup-mapping')->insert(

                ['audienceID'=>$req->audience,'coursegroupID'=>$req->cgroup,'status'=>$req->status,]);

                return redirect ('audience-to-coursegroup-mapping');
               }

                 // Question Bank View

                 public function Questionbank1 () {
                   //print_r(DB::table('questionbank')->select()->get());exit();
                  $query=DB::table('QuestionBank')->select('QuestionBankID','CategoryId','QuestionType','AnswerType','Question','NoOfOptions','MarksPerQuestion','CorrectOption','CreatedDate','CreatedBy','QuestionBankID')->get();

                  return view('questionbank',['query'=>$query]);
                 }

                 public function Questionbankinsert (Request $req){

                 DB::statement("call InsertQuestionBank(?,?,?,?,?,?,?)",array($req->questiontype,$req->type,$req->Question,$req->noofoption,$req->MPQ,0,$req->hdnvalue,$req->test));
                 return redirect ('questionbank');
    
                 $query=DB::table('questionbank')->select('questionbank.*')->get();
                 }


                  public function questionbankdelete (Request $req){
                  DB::table('QuestionBank')->where('QuestionBankID','=',$req->id)->delete();  
            
                  return redirect('questionbank');
                   } 


                  public function questionbankedit (Request $req){

                  $que=DB::table('questionbank')->where('QuestionBankID','=',$req->id)->first();
                   
                  //print_r($que->QuestionBankID);exit();
                  //print_r($req->id);
                  $queopt=  DB::table('questionbankanswer')->where('QuestionBankID','=',$req->id);
                  $queopt = DB::select(' call GetQuestionAnswerToEdit(?)',array($req->id));

                 return view ('questionbankedit',['que'=>$que],['queopt'=>$queopt]);
                  }

                  
                 public function questionbankupdate (Request $req){
                 $arra= array('QuestionType'=>$req->questiontype,'MarksPerQuestion'=>$req->MPQ,'Question'=>$req->Question);
                 $que=DB::table('questionbank')->where('QuestionBankID','=',$req->id)->update($arra);

                return redirect('questionbank');

/*
                 public function questionbankupdate (Request $req){
                 //$arra= array('Question'=>$req->Question,'NoOfOptions'=>$req->noofoption,'MarksPerQuestion'=>$req->MPQ);
           DB::statement('call updatequestionbank(?,?,?,?,?,?,?)',array($req->QuestionBankID,
     
      $req->questiontype,   
      $req->test,
      $req->Question,
      $req->noofoption,
      $req->MPQ,
      $req->CorrectOption,
      $req->type,
      
     ));
    return "test";*/
  
// $que=DB::table('questionbank')->where('QuestionBankID',$req->id)->update($arra);
              //   return redirect('questionbank');

}

             }
  




                  

                    
              

          


