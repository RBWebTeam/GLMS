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

<head> <br><br>
<center><label>Audience Rule</label> <br>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>
<body>

<div class="row">
  <div class="col-sm-3"  ></div>
  <div class="col-sm-6"  >
 
   <form class="form-horizontal" action="{{url('audiencerule-store')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="Select Audience" class="control-label col-xs-2">Select Audience </label>
      <div class="col-xs-10">
      <select class="form-control" id="audience" name="audience" required="" >
      <?php foreach($query as $val){?>
      <option value="<?php echo $val->id; ?>"><?php echo $val->audiancename; ?></option>
       <?php } ?>
        </select>
        </div>
        </div>
        <div class="form-group">
        <label for="Department" class="control-label col-xs-2">Department</label>
        <div class="col-xs-10">
        <select multiple class="form-control" name="department[]" id="department" required="" >
        <?php foreach($departmen as $val){?>
        <option value="<?php echo $val->id; ?>"><?php echo $val->departmentname; ?></option>
        <?php } ?>
        </select>
        </div>
        </div>
        <div class="form-group">
        <label for="Designation" class="control-label col-xs-2">Designation</label>
        <div class="col-xs-10">
             
      <select multiple class="form-control" name="designation[]" id="designation" required="">
      <?php foreach($Designation as $val){?>
        <option value="<?php echo $val->id; ?>"><?php echo $val->Desiganationname; ?></option>
        <?php } ?>
       </select>
     </div>   
     </div> 
     <div class="form-group">
      <label for="inputdoj" class="control-label col-xs-2">DOJ</label>
      <div class="col-xs-10">
      <div class="form-group col-md-6">
      <label for="inputCity" class="col-form-label">From Date</label>
      <input type="date" class="form-control" name="fromdate" id="Date" required="">

      </div>
      <div class="form-group col-md-4">
      <label for="inputState" class="col-form-label">To Date</label>
      <input type="date" class="form-control" id="Date" name="todate" required="">
      </div>
      </div>
      <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
      </div>
      </div>
      <div class="form-group">
      <label for="Employee Code" class="control-label col-xs-2">Employee Code</label>
      <div class="col-xs-10">

      <select multiple class="form-control" name="EmpCode[]" id="EmpCode" required="">
      <?php foreach($userdetails as $val){?>
        <option value="<?php echo $val->UserID; ?>"><?php echo $val->EmployeeCode; ?></option>
        <?php } ?>
       </select>
     
      </div>   
      </div> 
      <div class="form-group">
        <label for="inputBusiness Head" class="control-label col-xs-2">Business Head </label>
        <div class="col-xs-10">

      <select multiple class="form-control" name="BusinessHead" id="Business Head">
      <option value="volvo">RB Boss 1</option>
      <option value="volvo">RB Boss 2</option>
      <option value="volvo">RB Boss 3</option>
      <option value="volvo">RB Boss 4</option>
     </select>
     </div>   
     </div> 
     <div class="form-group">
        <label for="inputDepartment Head" class="control-label col-xs-2">Department Head </label>
        <div class="col-xs-10">

      <select multiple class="form-control" name="DepartmentHead" id="Department Head">
      <option value="volvo">RB Boss 1</option>
      
      
     </select>
     </div>   
     </div> 
     <input type="submit" name="submit" id="submit" value="submit" >


</center>
</form>
</div>
</div>
</body>
