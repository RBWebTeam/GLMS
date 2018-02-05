<!DOCTYPE html>
<html>
<head> <br><br>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>
<body>

<div class="row">
  <div class="col-sm-3"  ></div>
  <div class="col-sm-6"  >
 
   <form class="form-horizontal" action="{{url('cmaping-store')}}" method="post">
   {{ csrf_field() }}
      <div class="form-group">
      <label for="Course group" class="control-label col-xs-2">Course Group</label>
      <div class="col-xs-10">
      <select class="form-control" id="coursegroup1" name="coursegroup1"  > 
      <?php foreach($query as $val){?>
      <option value="<?php echo $val->id; ?>"><?php echo $val->coursegroup; ?></option>
       <?php } ?>
       </select>

        </div>
        </div>
        <div class="form-group">
        <label for="Course" class="control-label col-xs-2">Course</label>
        <div class="col-xs-10">
        <select multiple class="form-control" name="course[]" id="course" required="" >
        	<?php foreach($cmaster as $val){?>
      <option value="<?php echo $val->ID; ?>"><?php echo $val->CourseName; ?></option>
       <?php } ?>
           
        </select>
        <br>
       <center> <label>Status:</label> 
        
        <input type="radio" name="status" checked value="1"> Active
        <input type="radio" name="status" value="0"> inactive
        <br><br>
        <input type="submit" name="submit" id="submit" value="submit">
        <br><br>

        <div class="container">
 <table id="tbl" class="table table-bordered"style="width:50%">

  </center>


       </form>
       </body>
       </html>





	
