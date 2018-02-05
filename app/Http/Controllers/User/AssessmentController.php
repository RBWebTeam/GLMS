<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class AssessmentController extends Controller
{
    public function index(){
    	return view('User/Assessment');
    }

    public function assessment_detail(Request $req){
        $details = DB::select('call GetAssessmentDetail(?,?)', array($req->assessmentId,3));
    	return view('User/AssessmentDetail')->with('assessment',$details[0]);
    }

    public function launch_assessment(Request $req){

       $details  =DB::select('call GetAssessmentLaunchDetail(?,?)',array($req->assessment_id,3));
        return view('User/AssessmentLaunch1')->with('assessmentdetail', $details[0]);
    }

    public function launch_assessment1(Request $req){
        return view('User/AssessmentLaunch');
    }

    public function getAssessmentQuestion(Request $req)
    {
       
        $details = DB::select('call getQuestionAnswer(?,?)', array($req->assessment_id,3));
        $data = '[';

        foreach ($details as $key => $value) {
            // print_r('"option":'.'[' . $value->Answer.']');
            $data .= '{';
            $data .= '"question":'.'"' . $value->Question.'",';
            $data .= '"questionId":'.'"' . $value->QuestionBankID.'",';
            $data .= '"type":'.'"' . $value->AnswerType.'",';
            $data .= '"optioncount":'.'"' . $value->NoOfOptions.'",';
            $data .= '"optiontype":'.'"' . $value->AnswerType.'",';
            $data .= '"selectedanswer":'.'"",';
            $data .= '"option":'.'[' . $value->Answer.']';

            $data .= '},';
        }//exit();
        $data = substr($data,0,strlen($data)-1);
        // print_r($data);exit();
        $data .= ']';
        //$data = trim(preg_replace('/\s\s+/', ' ', $data));
       return (json_encode($data));
        //echo json_encode($data);
    }

    public function getAssessmentData()
    {
    	$data = "[{'question':'Question 1?','type':'1','optioncount':4,'optiontype':'1','option':[{'option':'Option 1'},{'option':'Option 2'},{'option':'Option 3'},{'option':'Option 4'}]},{'question':'Question 1?','type':'1','optioncount':4,'optiontype':'2','option':[{'option':'Option 1'},{'option':'Option 2'},{'option':'Option 3'},{'option':'Option 4'}]}]";
        echo json_encode($data);
    }


    public function submitAssessment(Request $req)
    { 

        $details = DB::statement('call InsertUserAssessmentAnswer(?,?,?)', array($req->data,$req->assessment_id,3));
        return $req->data;//"done";

    }

    public function getAssessmentDetailByTopicID(Request $req)
    { 
       // return $data=$req->topicId; exit();
         $users = DB::select('call User_Course_Request(?)',array($req->topicId));
         return response($users);
      //  return view('User/UserCourseRequest',['users' => $users]);

    }

}

