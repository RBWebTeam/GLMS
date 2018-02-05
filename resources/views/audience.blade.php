 
<head>


<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<form id="demo_form" name="demo_form" method="POST" action="test">
{{csrf_field()}} <br> <br>
<center><label>Audiance name:</label><input type="text" name="name" id="name" required="" style="width: 250px; height: 25px;"  />
<br> 
<br>
<label>Description:</label><textarea name="Description" rows="5" cols="40" required=""></textarea> 
<br>
<br>
<label>Status:</label>
<input type="radio" name="Status" checked value="1"> active
<input type="radio" name="Status" value="0">inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">
<br/>
<br/>

<div class="container">
 <table id="tbl" class="table table-bordered"style="width:50%">


    <thead>


     <tr>
        <th>Sr.no</th>
        <th>Audiance name</th>
        <th style="">Status</th>
      <th>Delete</th>
      <th>Edit</th>
        </tr> 
    </thead>
    <tbody>
    	
    
      <?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>
        
         <td ><?php echo $value->audiancename; ?></td> 


          <td><?php echo $value->status; ?> </td>

         <td ><a href="delete/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
         <td ><a href="edite/<?php echo $value->id; ?>"> Edit</a></td>
        </tr>

        <?php } ?>



       </tbody>     
       </table>
       </div><br><br>
       </center>
       </from>
       <br>
       <br>
       </body>
  <script type="text/javascript">
	$(document).ready(function(){
		//$('#tbl').

	})

</script>
 

</html>













