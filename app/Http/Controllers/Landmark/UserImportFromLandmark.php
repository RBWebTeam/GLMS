<?php

namespace App\Http\Controllers\Landmark;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class UserImportFromLandmarkController extends Controller
{
    public function ImportUser(){
    	echo file_get_contents('http://landmarktimes.policyboss.com/EIS/json_test/Fetch_Employee_Master.php?key=K!R:|A*J$P*&');
    	// return view('admin-home');
    }
}

