<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use image;

class landmarkController extends Controller
{
    public function insert(Request $req)
    {
    	 // $this->validate($req, [
      //       'l_image' => 'required|image|mimes:jpeg,jpg|max:1024',
      //   ]);

		$image = $req->file('l_image');
        $name = time().'.'.$image->getClientOriginalName();
       	$destinationPath = public_path('/images/landmark'); //->save image folder 
        $image->move($destinationPath, $name); 
    	DB::table('LandmarkLandingMessage')->insert(
    		['Header'=>$req->l_header,
    		'ImagePath'=>$name,
    		'Description'=>$req->l_disc,
    		'ExpiryDate'=>$req->l_date,
    		'IsActive'=>$req->optradio,
    		//'CreatedBy'=>1,
            ]);
    	Session::flash('message', 'Record saved successfully');
    	//echo "<script>alert('Record saved successfully.');</script>";
    	return redirect('landmark_msg');
    }

    public function view(Request $req)
    {
    	$user = DB::table('LandmarkLandingMessage')->orderBy('LandmarkLandingMessageID','desc')->get();
    	return view('landmark_msg',["user"=>$user]);
    }

    public function delete_landmark($id)
    {	
            $arra= array('IsActive'=>'0');
            $que=DB::table('LandmarkLandingMessage')->where('LandmarkLandingMessageID','=',[$id])->update($arra);
            Session::flash('message', 'Record deactivated successfully');
            //echo "<script>alert('Record updated successfully.');</script>";
            return redirect('landmark_msg');
    }

    public function edit_show($id)
    {
    	$user=DB::table('LandmarkLandingMessage')->select('LandmarkLandingMessageID','Header','Description','ImagePath','ExpiryDate','IsActive')->where('LandmarkLandingMessageID','=',$id)->first();
    	return view('edit_show_landmark',["user"=>$user]);
    } 

    public function update_val(Request $req)
    {
    	$image = $req->file('l_image');
    	if($image!='')
    	{
    		$image = $req->file('l_image');
    		$name = time().'.'.$image->getClientOriginalName();
       		$destinationPath = public_path('/images/landmark'); //->save image folder 
        	$image->move($destinationPath, $name);
    		$arra= array('Header'=>$req->l_header,'Description'=>$req->l_disc,'ImagePath'=>$name,'ExpiryDate'=>$req->l_date,'IsActive'=>$req->editcheck);
			$que=DB::table('LandmarkLandingMessage')->where('LandmarkLandingMessageID','=',$req->id)->update($arra);
			Session::flash('message', 'Record updated successfully'); 
			//echo "<script>alert('Record updated successfully.');</script>";
			return redirect('landmark_msg');
        }
        elseif ($image =='') 
        {
    		$arra= array('Header'=>$req->l_header,'Description'=>$req->l_disc,'ExpiryDate'=>$req->l_date,'IsActive'=>$req->editcheck);
			$que=DB::table('LandmarkLandingMessage')->where('LandmarkLandingMessageID','=',$req->id)->update($arra);
			Session::flash('message', 'Record updated successfully');
			//echo "<script>alert('Record updated successfully.');</script>";
			return redirect('landmark_msg');
    	}
    	
    }

     public function url_read_data(Request $req)
    {
            $data = file_get_contents('http://landmarktimes.policyboss.com/EIS/json_test/Fetch_Employee_Master.php?key=K!R:|A*J$P*&');
            $explodedata = explode('#', $data);
            $values = "";
            $counter = count($explodedata)-1;
            for($i= 1; $i < $counter; $i++)
            {
                $values.= $explodedata[$i].',';
            }
           $values = rtrim($values,',');
          //echo "Insert into user_master values".$values; exit();
           DB::insert("Insert into user_master_temp values".$values);
           DB::table('user_master_temp')->truncate();
           echo "successfully";
    }
}



