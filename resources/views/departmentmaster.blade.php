<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<body>
<form id="department_form" name="department form" method="post"> <br><br>
{{csrf_field()}}
<center><label>Department name:</label><input type="text" name="name" id="name" required="" style="width: 200px;height: 25px;">
<br><br>
<label>Short code:</label><input type="text" name="shortcode" id="Short code" required="" style="width: 200px;height: 25px;">
<br><br>
<label>Status:</label>
<input type="radio" name="status" checked value="1"> Active
<input type="radio" name="status" value="0"> Inactive
<br><br> 
<input type="submit" name="submit" id="submit" value="submit">
<br><br>

<div class="container"></div>
<table id="tbl" class="table table-bordered" style="width:35%"> 
 
<thead>
	<tr>
		 <th>Depart.id</th>
        <th>Department name</th>
        <th>Short code</th>
        <th style="">Status</th>
        <th>Delete</th>
        <th>Edit</th>
        </tr> </td>
	</tr>
</thead>
<tbody>
	<?php foreach ($query as $key => $value) {?>
       <tr>
       <td><?php echo $value->id; ?></a></td>
       <td><?php echo $value->departmentname; ?></td>
       <td><?php echo $value->shortcode; ?></td>
       <td><?php echo $value->status; ?> </td>

       <td><a href="{{url('departmentmaster/delete')}}/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
      <td><a href="{{url('departmentmaster/edit')}}/<?php echo $value->id;?>">Edit</a></td>


       

     

       <?php } ?>   









</tbody>
</table>
</center>
</form>
</body>
</html>