<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form id= "demo_form" name="demo_form" method="Post">
{{csrf_field()}}
<center><label>Audiance name:</label><input type="text" name="name" id="name">
<br>
<br>
<label>Cource name:</label><input type="text" name="coursename" id="coursename">
<br>
<br>
<label>Description:</label><textarea name="Description" rows="6" cols="40"></textarea>
<br>
<br>
<label>Status:</label>
<input type="radio" name="Status" checked value="1"> active
<input type="radio" name="Status" checked value="0"> inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">
<br>
<br>
<table id="tbl" class="table table bordered" style="width: 25%">
  
<thead>
<tr>
  <th> Sr.no </th>
  <th> Audiance name</th>
  <th> descripation</th>
  <th style="">Status</th>
  <th> Edit</th>
  <th> Delete</th>
  </tr>
  </thead>
  <tbody>
     
      <?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>

        
         <td ><?php echo $value->audiancename; ?></td> 

         <td ><?php echo $value->descripation; ?></td> 
          <td><?php echo $value->status; ?> </td>

         <td ><a href="{{url('course/delete')}}/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
         <td ><a href="{{url('course/edit')}}/<?php echo $value->id; ?>"> Edit</a></td>  
        </tr>
        <?php } ?>
    
  </tbody>





</table>
</center>

</form>


</body>
</html>