<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{URL::to('index')}}">HOME</a></li>
      <li ><a href="{{URL::to('tree-page')}}">LEARNING</a></li>
       
      <li><a href="javascript:void(0)">EVALUATION</a></li>
      <li ><a href="javascript:void(0)">CLASSROOM TRAINING</a></li>
    </ul>
    <form class="navbar-form navbar-right">
    <a href="{{URL::to('AdminHome')}}" style="color: #fff;">Switch To Admin</a>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <a class="btn btn-default" type="submit">
           <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </form>
  </div>
</nav>-->
@include('layout.header')
@include('layout.adminheader')

<head>
<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</head>

<body>
<form id= "demo_form" name="demo_form" method="Post"> 
{{csrf_field()}}
<br><br>
<center><label>Course group:</label><input type="text" name="name" id="name">
<br>
<br>
<label>Description:</label><textarea name="descripation" rows="5" cols="40"></textarea>
<br><br>                                   
<label>Status:</label>
<input type="radio" name="status" checked value="1"> Active
<input type="radio" name="status" value="0"> inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">
<br><br>

<div class="container">
 <table id="tbl" class="table table-bordered"style="width:50%">


<thead>
        <tr>
        <th>id</th>
        <th>Course group </th>
        <th style="">Status</th>
        <th>Delete</th>
        <th>Edit</th>
        </tr> 
    </thead>
    <tbody>
       <?php foreach ($query as $key => $value) {?>
       <tr><td > <?php echo $value->id; ?></a></td>
       <td ><?php echo $value->coursegroup; ?></td> 
       <td><?php echo $value->status; ?> </td>

       <td ><a href="{{url('coursegroup/delete')}}/<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this record?')"> Delete</a></td>
       <td ><a href="{{url('coursegroup/edit')}}/<?php echo $value->id; ?>"> Edit</a></td>
        </tr>
      
       <?php } ?>   






       </tbody>
       </table>
       </center>
       </form>
       </body>








