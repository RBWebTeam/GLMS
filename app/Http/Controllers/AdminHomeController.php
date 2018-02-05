<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class AdminHomeController extends Controller
{
    public function index(){
    	return view('admin-home');
    }
}

