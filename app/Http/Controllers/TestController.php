<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TestModel;
use App\ModelCourse;
class TestController extends Controller
{
    public function test()
    {

    	 $users = DB::table('user')->get();
    	 //print_r($users);exit();

        return view('test', ['users' => $users]);
    }
    public function demo()
    {
       return view('demo');
    }

    public function demo_1(Request $req)
    {
       print_r($req->all());    
       

    }

      public function testfn(Request  $req){

            // echo $req->name;
             //echo $req->Description;

            DB::table('audiance_data')->insert(
           ['audiancename' =>$req->name, 'descripation' => $req->Description,'status'=>$req->Status]);

return redirect('audience');
           
                
    }



    public function delete(Request $req){

     
          
                 $query=new TestModel();
                 $query->where('id',$req->id)->delete();
                  return redirect('audience');

       }

  
      public function edite(Request $req){

                 $query=new TestModel();
                 $que=$query->where('id',$req->id)->first();
  


                  return view('edite',['que'=>$que]);

       }

             public function update(Request $req){

              

                 $query=new TestModel();
                 $arra= array('audiancename' =>$req->name ,'descripation'=>$req->Description,'status'=>$req->Status);

                 $que=$query->where('id',$req->id)->update($arra);
  

                 return redirect('audience');
              

       }

//Course.blade View
       public function course1()
       {


        $query=DB::table('course_data')->select('audiancename','courcename','status','id')->get();
         return view('course',['query'=>$query]);
         

       }

    public function CourseInsert(Request  $req){
        

              // echo $req->name;
              //echo $req->Description;
             // echo $req->Description;

            DB::table('course_data')->insert(
           ['audiancename' =>$req->name, 'descripation' => $req->Description,'status'=>$req->Status,'courcename'=>$req->coursename]);

            return redirect('course');

            }


  public function coursedelete(Request $req){
    // print_r($req->all());exit();

            DB::table('course_data')->where('id','=',$req->id)->delete();  
             
             // $query=new ModelCourse();
             // $query->where('id','=',$req->id)->delete();
              return redirect('course');
}
         

         public function courseedit (Request $req){

          
         // $query=new ModelCourse();
          //$query->where('id','=',$req->id)->first();

           $que=DB::table('course_data')->where('id','=',$req->id)->first();

         return view('courseedit',['que'=>$que]);
               //  return view('courseedit'); 
         }


         public function courseupdate (Request $req){

           $query=new ModelCourse();
                 $arra= array('audiancename'=>$req->name ,'coursename'=>$req->coursename,'descripation'=>$req->Description);

                 $que=$query->where('id',$req->id)->update($arra);
  

                 return redirect('course');           
         }

       
              
}












  



           
                
    

    
   
          


