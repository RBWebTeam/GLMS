<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class AssessmentController extends Controller
{
    public function index()
    {
    	//return view('AssessmentQuestionMapping');
    	$details = DB::select('call GetAllAssessmentName()');
    	return view('AssessmentQuestionMapping')->with('assessmentdetail',$details);
    }
    

	public function GetAssessmentQuestionMapping(Request $request)
    {
    	$details = DB::select('call GetAssessmentQuestionMapping(?)',array($request->AssessmentId));
    	return json_encode($details);
    }


    public function InsertAssessmentQuestionMapping(Request $request)
    {
    	$details = DB::statement('call InsertAssessmentQuestionMapping(?,?,?)',array($request->assessmentId,$request->QuestionId,3));	
		return "Addedd Successfully.....";
    }
    public function DeleteAssessmentQuestionMapping(Request $request)
    {
        $details = DB::statement('call DeleteAssessmentQuestionMapping(?,?,?)',array($request->assessmentId,$request->QuestionId,3));
        return $request->assessmentId.'/'.$request->QuestionId;
        // return "Deleted Successfully.....";
    }

    public function AddAssessment()
	{
		$coursemaster = DB::table('coursemaster')->select('ID','CourseName')->get();
        return view('AddAssessment',['coursemaster'=>$coursemaster]);
	}
	 



	public function AddAssessmentinsert(Request $req){
		//print_r($req->all());exit();
		DB::statement('call insertAddAssessment(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($req->hdntopicid,
			$req->Assessmentname,
			$req->noofqustion,
			$req->passing,
			$req->Duration,
			$req->startdate,
			$req->enddate,
			$req->checkcourse,
			$req->check,
			0,//$req->checkcourse,
			$req->noofatempts,
			$req->markcal,
			$req->passfeedback,
			$req->failfeedback,

			$req->course_name_id,
			$req->course_assement_type,
			//$req->date('Y-m-d H:i:s')
		));
		return view("AddAssessment");
	}

	public function  EditAssessment()
	{
		$query=DB::table('AssessmentMaster')
		->leftJoin ('tree_structure','AssessmentMaster.TopicID','=','tree_structure.id')->get();
		return View("EditAssessment",['query'=>$query]);
	}

	public function edit_assessment(Request $req)
	{
     $que=DB::table('AssessmentMaster')->where('AssessmentId','=',$req->AssessmentId)->first(); 
            
          	  return view ('editAssessment-details',['que'=>$que]);
    } 
public function updateassessment(Request $req){

	     	       $arra= array('TopicID'=>$req->hdntopicid,
	     	       	            'AssessmentName'=>$req->Assessmentname,
	     	       	            'NoOfQuestion'=>$req->noofqustion,
	     	       	            'PassingPercentage'=>$req->passing,
	     	       	            'Duration'=>$req->Duration,
	     	       	            'StartDate'=>$req->startdate,
	     	       	            'EndDate'=>$req->enddate,
	     	       	            'LinkCourse'=>0,
	     	       	            'RandomiseQuestion'=>$req->check,
	     	       	            'LinkCourse'=>$req->checkcourse,
	     	       	            'NoOfAttempts'=>$req->noofatempts,
	     	       	            'MarksCalculation'=>$req->markcal,
	     	       	            'PassFeedback'=>$req->passfeedback,
	     	       	            'FailFeedback'=>$req->failfeedback,
	     	       	         );

               $que=DB::table('AssessmentMaster')->where('AssessmentId',$req->AssessmentId)->update($arra);
             
              return redirect('EditAssessment');

           } 


			public function deleteAssessment (Request$req){

              DB:: table('AssessmentMaster')->where('AssessmentId','=',$req->AssessmentId)->delete();

              return redirect ('EditAssessment');
            }

            
}

