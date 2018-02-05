<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class TreeViewController extends Controller
{
    public function tree_view(){

    	$query = DB::table('treeview_items')->select('id', 'name', 'title', 'parent_id')->get();

$arrayCategories = array();
    	foreach ($query as $key => $value) {
    		
 
 $arrayCategories[$value->id] = array("parent_id" => $value->parent_id, "name" =>                       
 $value->name);   
 
    	}
        
        //return view('tree-view');

$this::createTreeView($arrayCategories, 0);







    }

  public  function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

foreach ($array as $categoryId => $category) {

if ($currentParent == $category['parent_id']) {                       
    if ($currLevel > $prevLevel) echo " <ol class='tree'> "; 

    if ($currLevel == $prevLevel) echo " </li> ";

    echo '<li> <label for="subfolder2">'.$category['name'].'</label> <input type="checkbox" name="subfolder2"/>';

    if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

    $currLevel++; 

    $this::createTreeView ($array, $categoryId, $currLevel, $prevLevel);

    $currLevel--;               
    }   

}

if ($currLevel == $prevLevel) echo " </li>  </ol> ";

}   

    public function tree_structure(){
     return view('tree-structure');
    }

    public function add_tree(Request $req){
        // print_r($req->all());exit();
        if ($req->courseid == null) {
            $courseid= 0 ;
        }else{
            $courseid=$req->courseid ;
        }
        $query=DB::table('tree_structure')
    ->insert(['name'=>$req->name,
           'parent_id'=>$courseid]);
      echo json_encode($query);
    }

    public function tree_struct(Request $req){
        print_r($req->all());
        
        
    }



   public function tree(){
   $query = DB::select('call get_all_topic_details()');
   echo json_encode($query);
   }

   public function company(){
   $query = DB::table('company_master')->select('company_id', 'company_name')->get();
   echo json_encode($query);
   }

   public function tree_page(){
      return view('tree-page');
   }
    
    public function tree_topic(Request $req){
      // print_r($req->all());exit();
      $TopicId=$req['topicId'];
      $tree_topic=DB::select('call get_all_course_details_by_topicid(?)',array($TopicId));
      echo json_encode($tree_topic);
   }
       
}

