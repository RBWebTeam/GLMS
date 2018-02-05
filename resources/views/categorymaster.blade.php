<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
	
</head>
<body>
<form id="demo_form" name="demo_form" method="post">
{{csrf_field()}}
<br> <br>
<center> <label>Audiance name:</label><input type="text" name="name" id="name" required="">
<br><br>
<label>category name:</label><input type="text" name="categoryname" id="categoryname" required="">
<br><br>
<label>Description</label><textarea name="Description" rows="5" cols="40" required=""></textarea>
<br><br>
<label>Status:</label>
<input type="radio" name="Status" checked value="1">Active
<input type="radio" name="Status" value="0">Inactive
<br><br>
<input type="Submit" name="Submit" id="Submit" value="Submit">
<br><br>
<div class="container">
 <table id="tbl" class="table table-bordered"style="width:50%">

<thead>
<tr>
	<th>Sr.no</th>
        <th>Audiance name</th> 
        <th>category name</th>
       <th style="">Status</th>
      <th>Delete</th>
      <th>Edit</th>
        </tr> 
</thead>

<tbody>
	<?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>

        
         <td ><?php echo $value->audiancename;?></td> 
         <td><?php echo $value->categoryname;?></td>
         <td><?php echo $value->status; ?> </td>
         <td><a href="{{url('categorymaster/delete')}}/<?php echo $value->id;?>" onclick="return confirm('Are you sure want to delete this record?')">Delete</a></td>
         <td><a href="{{url('categorymaster/edit')}}/<?php echo $value->id;?>">Edit</a></td>
           </tr>
         
           <?php } ?>

                   
         


         </tbody>



</center>

	
</form>

</body>
</html>