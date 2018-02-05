@include('layout.header')
@include('layout.adminheader')
<head>
<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</style>
</head>
<body>
<form id= "demo_form" name="demo_form" method="Post"> 
{{csrf_field()}}
<br>
<br>
<center><label>Desiganation name:</label><input type="text" name="name" id="name" required="" style="width: 200px;height: 25px;">
<br>
<br>
<label>Status:</label>
<input type="radio" name="Status" checked value="1"> active
<input type="radio" name="Status" value="0"> inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">
<br>
<br>

<div class="container">
 <table id="tbl" class="table table-bordered"style="width:50%">

 <thead>
        <tr>
        <th>Desig id</th>
        <th>Desiganation name</th>
        <th style="">Status</th>
        <th>Delete</th>
        <th>Edit</th>
        </tr> 
    </thead>
    <tbody>
       <?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>
       <td ><?php echo $value->Desiganationname; ?></td> 
       <td><?php echo $value->Status; ?> </td>

         <td ><a href="{{url('Designationmaster/delete')}}/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
         <td ><a href="{{url('Designationmaster/edit')}}/<?php echo $value->id; ?>"> Edit</a></td>
        </tr>
        <?php } ?>   
        
   </tbody>
   </table>
   </center>
   </form>
   
   </body>
