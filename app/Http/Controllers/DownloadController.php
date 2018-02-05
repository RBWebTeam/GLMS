<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Session;
use File;
use Response;

class DownloadController extends Controller
{
    
    public function download(Request $req){
    	

    // Get parameters
    // $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
     $filepath = $req['id'];
     // print_r($filepath);exit();
     $name = $req['CourseName'];
     $temp=explode(".",$filepath);
     $format=$temp[sizeof($temp)-1];
      // print_r($format);exit();
      $mime_type=mime_content_type($req['id']);
     // print_r($mime_type);exit();
    
    // Process download
     //$name=split(" ", $name);
    if(file_exists($filepath)) {
        // if($format=="mp4"){
        //     $mime_type="video/mp4";
        
    	// print_r('hello');
        header('Content-Description: File Transfer');
        header('Content-Type:'.$mime_type);
        header('Content-Disposition: attachment; filename='.$name.'.'.$format);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
         @ob_end_clean();
        readfile($filepath);
        // exit;
    
       
    


       
}
}
}