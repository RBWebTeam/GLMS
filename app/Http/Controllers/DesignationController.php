<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class DesignationController extends Controller


//Desiganation master view

{
          public function Desiganation1 (){


          	$query=DB::table('desiganation_master')->select('Desiganationname','Status','id')->get();



         return view('Designationmaster',['query'=>$query]);
  
          }

          public function Desiganationinsert (Request $req){

          	DB::table('desiganation_master')->insert(

           ['Desiganationname' =>$req->name, 'Status'=>$req->Status,]);

            return redirect('Designationmaster'); 

             }

             public function Desiganationdelete (Request $req){

             	DB::table('desiganation_master')->where('id','=',$req->id)->delete();  
            
              return redirect('Designationmaster');

          }

          public function Desiganationedit (Request $req){

          	 $que=DB::table('desiganation_master')->where('id','=',$req->id)->first(); 

          	  return view ('desiganationedit',['que'=>$que]);

          	   }

             	 public function Desiganationupdate (Request $req){

	     	 $arra= array('Desiganationname'=>$req->name,'Status'=>$req->Status);

               $que=DB::table('desiganation_master')->where('id',$req->id)->update($arra);
             
              return redirect('Designationmaster');

           } 

           //category_master View

            public function category2 (){


              $query=DB::table('category_master')->select('audiancename','categoryname','Description','status','id')->get();
              return view ('categorymaster',['query'=>$query]);


            }

            public function categoryinsert (Request$req){
              DB::table('category_master')->insert(
                
                ['audiancename'=>$req->name,'categoryname'=>$req->categoryname,'Description'=>$req->Description,'Status'=>$req->Status,]);


                 return redirect('categorymaster');
            }

            public function categorydelete (Request$req){
              DB::table('category_master')-> where ('id','=',$req->id)->delete();  

              return redirect ('categorymaster');
            
            }

            public function categoryeedit (Request$req){
              $que=DB::table('category_master')-> where ('id','=',$req->id)->first();
              return view ('categoryedit',['que'=>$que]);    
            }
             
             public function categoryeupdate (Request$req){
              $arra= array('audiancename'=>$req->name,'categoryname'=>$req->categoryname,'status'=>$req->Status);
             
              $que=DB::table('category_master')->where ('id','=',$req->id)->update($arra);

              return redirect('categorymaster');
             
             }


            //Department Master view

             public function Department1 (){
              $query=DB::table('department_master')->select('departmentname','shortcode','status','id')->get();
              return view ('departmentmaster',['query'=>$query]);
             }

             public function Departmentinsert (Request$req){
              DB::table('department_master')->insert(

              ['departmentname'=>$req->name,'shortcode'=>$req->shortcode,'status'=>$req->status,]);

              return redirect ('departmentmaster');

            }

            public function Departmentdelete (Request$req){

              DB:: table('department_master')->where ('id','=',$req->id)->delete();

              return redirect ('departmentmaster');
            }

            public function Departmentedit (Request$req){
             $que=DB::table('department_master')->where('id','=',$req->id)->first();

              return view ('departmentedit',['que'=>$que]);
            }

            public function Departmentupdate (Request$req){

              $arra= array('departmentname'=>$req->name,'shortcode'=>$req->shortcode,'status'=>$req->Status);
              

              $que=DB::table('department_master')->where('id','=',$req->id)->update($arra);


              return redirect('departmentmaster');

            }

             // Coursegroup View

             public function coursegroup1 (){
              $query=DB::table('course_group')->select('coursegroup','descripation','status','id')->get();
              return view ('coursegroup',['query'=>$query]);
             }

             public function coursegroupinsert (Request$req){
              
               DB::table('course_group')->insert(

                ['coursegroup'=>$req->name,'descripation'=>$req->descripation,'status'=>$req->status,]);
                                            
               return redirect ('coursegroup');

               }

              public function coursegroupdelete (Request$req){

              DB:: table('course_group')->where ('id','=',$req->id)->delete();

                return redirect ('coursegroup');

              }

              public function coursegroupedit (Request $req){

             $que=DB::table('course_group')->where('id','=',$req->id)->first(); 

              return view ('coursegroupedit',['que'=>$que]);

               }

                public function coursegroupupdate (Request$req){

              $arra= array('coursegroup'=>$req->name,'status'=>$req->status,'descripation'=>$req->descripation);
             

              $que=DB::table('course_group')->where('id','=',$req->id)->update($arra);


              return redirect('coursegroup');

              
            }


             

             }


                



         





       



