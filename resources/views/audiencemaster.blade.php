<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li><a href="{{URL::to('index')}}">HOME</a></li>
      <li  class="active" ><a href="{{URL::to('tree-structure')}}">LEARNING</a></li>
       
      <li><a href="javascript:void(0)">EVALUATION</a></li>
      <li ><a href="javascript:void(0)">CLASSROOM TRAINING</a></li> -->
    </ul>
    <form class="navbar-form navbar-right">
     <a href="{{URL::to('index')}}" style="color: #fff;">Switch To User</a>
     <span style="color: #fff"> | Welcome User</span>
      <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <a class="btn btn-default" type="submit">
           <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div> -->
    </form>
  </div>
</nav>
@include('layout.adminheader')




<head>

<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<script src="js/adminmenuactive.js"></script>

</head>
<body> 

<form id="demo_form" name="demo_form" method="POST">
{{csrf_field()}}

<br> <br>
<center><label>Audiance name:</label><input type="text" name="name" id="name" required="" style="width: 200px;height: 25px;" />
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

     <?php foreach ($query1 as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>

        
         <td ><?php echo $value->audiancename; ?></td> 

        
          <td><?php echo $value->status; ?> </td>

         <td ><a href="{{url('audiencemaster/delete')}}/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
         <td ><a href="{{url('audiencemaster/edit')}}/<?php echo $value->id; ?>"> Edit</a></td>  
        </tr>
        <?php } ?>
    
  </tbody>

  </table>
    	
 </center>
</form>

</body>





