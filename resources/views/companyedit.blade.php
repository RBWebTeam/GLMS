<!DOCTYPE html>
<html>
<head><br>
<center><label>Company_Master</label></center>

<link rel="stylesheet" type="text/css" href="{{url('css/audience.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</style>
</head>
<body>
<form id= "demo_form" name="demo_form" method="Post" action="{{url('companyupdate')}}"> 
{{csrf_field()}}
<br>
<br>
<center><label>Company name: </label><input type="text" name="name" id="name"  value="{{$que->companyname}}"required="" style="width: 200px;height: 25px;">

<br>   
<input type="hidden" name="id" value="{{$que->id}}">                   
<br>
<label>Isactive:</label>
<input type="radio" name="Status" checked value="1"> active
<input type="radio" name="Status" value="0"> inactive
<br>
<br>
<input type="submit" name="submit" id="submit" value="submit">

   </center>
   </form>
   </body>
   </html>