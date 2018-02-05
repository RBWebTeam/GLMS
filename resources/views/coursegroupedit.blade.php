<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<form id="demo_form" name="demo_form" method="POST" action="{{url('coursegroupupdate')}}"> 
{{csrf_field()}} 
<br> 
<br>
<center><label>Course group:</label><input type="text" name="name" id="name" value="{{$que->coursegroup}}">
<br>
<br>
<label>Description:</label><textarea name="descripation" rows="5" cols="40" >{{$que->descripation}}</textarea>
<br>
<input type="hidden" name="id" value="{{$que->id}}">
<br>                                   
<label>Status:</label> 
<input type="radio" name="status" checked value="1"> Active
<input type="radio" name="status" value="0"> inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit"> 
</center>
</from>

</body>
</html>