<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller


      // Company_master view

{
      	   public function Company1 () {

      		$query=DB::table('company_master')->select('companyname','Isactive','id')->get();
            return view('companymaster',['query'=>$query]);
       }
            public function Companyinsert (Request $req){

            DB::table('company_master')->insert(

             ['companyname' =>$req->name, 'Isactive'=>$req->Status,]);
 
             return redirect('companymaster'); 
        }
             public function companyedit (Request $req){

          	 $que=DB::table('company_master')->where('id','=',$req->id)->first(); 

          	  return view ('companyedit',['que'=>$que]);

}
                  	 public function companyupdate (Request $req){

	     	       $arra= array('companyname'=>$req->name,'Isactive'=>$req->Status);

               $que=DB::table('company_master')->where('id',$req->id)->update($arra);
             
               return redirect('companymaster');

}

}
