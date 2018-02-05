<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="department_form" name="department form" method="POST" action="{{url('departmentupdate')}}">

{{csrf_field()}} 
<br> 
<br>
<center><label>Department name:</label><input type="text" name="name" id="name" value="{{$que->departmentname}}"style="width: 240px; height: 25px;"  />
<br> 
<input type="hidden" name="id" value="{{$que->id}}">
<br>
<label>Short code :</label><input type="text" name="shortcode" id="shortcode" value="{{$que->shortcode}}"style="width: 250px; height: 25px;"  />
<br>
<br>
<label>Status:</label>
<input type="radio" name="Status" checked value="1"> Active
<input type="radio" name="Status" value="0">Inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit" 
 
</center>
</from>

</body>
</html>