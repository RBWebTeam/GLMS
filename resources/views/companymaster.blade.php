<!DOCTYPE html>
<html>
<head><br>
<center><label>Company_Master</label></center>

<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</style>
</head>
<body>
<form id= "demo_form" name="demo_form" method="Post"> 
{{csrf_field()}}
<br>
<br>
<center><label>Company name: </label><input type="text" name="name" id="name" required="" style="width: 200px;height: 25px;">
      <br>
      <br>
      <label>Isactive:</label>
      <input type="radio" name="Status" checked value="1"> active
      <input type="radio" name="Status" value=""> inactive
      <br>
      <br>
      <input type="submit" name="submit" id="submit" value="submit">
      <br>
      <br>
      <div class="container">
      <table id="tbl" class="table table-bordered"style="width:50%">
      <thead>
      <tr>
      <th>id</th>
      <th>Company name </th> 
      <th style="">Is active</th>
      <th>Edit</th>
      </tr> 
      </thead>
      <tbody>
       <?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>
       <td ><?php echo $value->companyname; ?></td> 
       <td><?php echo $value->Isactive; ?> </td>
       <td ><a href="{{url('companymaster/edit')}}/<?php echo $value->id; ?>"> &#9998;
</a></td>
       </tr>                       < 
        <?php } ?>   

       </tbody>
       </table>
       </center>
       </form>
       </body>
       </html>