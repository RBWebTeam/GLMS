<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form id="demo_form" name="demo_form" method="POST" action="{{url('masterupdate')}}"> 
{{csrf_field()}} 
<br> 
<br>
<center><label>Audiance name:</label><input type="text" name="name" id="name"  value="{{$que->audiancename}}">
<br> 
<input type="hidden" name="id" value="{{$que->id}}">
<br>
<br>
<label>Description:</label><textarea name="Description" rows="5" cols="40" >{{$que->descripation}}</textarea>
<br>
<br>
<label>Status:</label> 
<input type="radio" name="Status" checked value="1"> active
<input type="radio" name="Status" value="0">inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">
</center>
</from>

</body>
</html>