<?php

namespace App\Http\Controllers\Landmark;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class LandmarkLandingController extends Controller
{
    public function landingmessage(){
    	return view('landmark/landingmessage');	
    }

    public function GetLandmarkLandingMessage(Request $req)
    { 
		if($req->sptype == 1){
			$details = DB::select('call GetLandmarkLandingMessageOnLanding(?)', array($req->usercode));
			
	        return $details;

		}
		else{
			$details = DB::select('call GetLandmarkLandingMessage(?)', array($req->usercode));
	        return $details;
	    } 
    }

    public function SubmitLandingMessageLog(Request $req)
    { 
        DB::statement('call SubmitLandingMessageLog(?,?)', array($req->usercode,$req->messageid));
        return true;

    }

    public function ImportUser(){
        // echo "Y U called me....";
        // $data = file_get_contents('http://landmarktimes.policyboss.com/EIS/json_test/Fetch_Employee_Master2.php?key=K!R:|A*J$P*&');
        // print_r(json_encode($data));
        
        // $explodedata = explode('#', $data);
        // print_r($explodedata);
       // $data_new = str_replace('"', '', $data);
        //var_dump(json_encode($data));
        // return view('admin-home');
        // var_dump($data);

         $data = file_get_contents('http://landmarktimes.policyboss.com/EIS/json_test/Fetch_Employee_Master.php?key=K!R:|A*J$P*&');
        $explodedata = explode('#', $data);
        
         // $query = "INSERT INTO `user_master_temp`(`UID`, `EMP_ID`, `Employee_Name`, `Gender`, `DOB`, `Company`, `Branch`, `DOJ`, `Current_DOJ`, `Designation`, `Band`, `TL_UID`, `TL_Name`, `ALM_UID`, `ALM_Name`, `LM_UID`, `LM_Name`, `BH_UID`, `BH_Name`, `RH_UID`, `RH_Name`, `VH_HOD_UID`, `VH_HOD_Name`, `Director_CXO_UID`, `Director_CXO_Name`, `Vertical`, `Sub_Vertical`, `User_Process`, `Sub_Process`, `User_Profile`, `Sub_Profile`, `Emp_Vertical`, `Emp_Sub_Vertical`, `Emp_Category`, `Dept_Short_Name`, `Dept_Segment`, `Employee_Status`, `Direct_Reporting_UID`, `Direct_Reporting_Name`, `DOL`) VALUES";
             $values = "";
             $counter = count($explodedata)-1;
            for($i= 1; $i < $counter; $i++)
            {
                $values.= $explodedata[$i].',';
            }
           $values = rtrim($values,',');
           echo "Insert into user_master_temp values".$values;

        //     $query = $query.$value;
        // return view('url_read_data');
    }


}

