<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class MasterController extends Controller{

	//audiencemaster.blade view

 public function master(){
 
        $query=DB::table('audiance_master')->select('audiancename','descripation','status','id')->get();
         return view('audiencemaster',['query1'=>$query]);

       }

       public function master2(Request  $req){
        

              // echo $req->name;
              //echo $req->Description;
             // echo $req->Description;

            DB::table('audiance_master')->insert(
           ['audiancename' =>$req->name, 'descripation' => $req->Description,'status'=>$req->Status,]);

            return redirect('audiencemaster');

        }

            public function audiencemasterdelete(Request $req){
    // print_r($req->all());exit();

         DB::table('audiance_master')->where('id','=',$req->id)->delete();  
             
             
              return redirect('audiencemaster');
}

            public function audiencemasteredit (Request $req){
             	
	        $que=DB::table('audiance_master')->where('id','=',$req->id)->first();
	         return view ('audienceedit',['que'=>$que]);
	     }

	     public function audiencemasterupdate (Request $req){

	     	 $arra= array('audiancename'=>$req->name,'descripation'=>$req->Description);

                $que=DB::table('audiance_master')->where('id',$req->id)->update($arra);

                 return redirect('audiencemaster');

            }

                  
              


	     }

	     





?>












