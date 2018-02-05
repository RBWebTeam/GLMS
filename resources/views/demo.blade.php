<!DOCTYPE html>
<html>
<head>
	

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<form id="demo_form" name="demo_form" method="POST">
{{csrf_field()}}
<label>Name:</label><input type="text" name="name" id="name">

<label>Submit:</label><input type="button" name="submit" id="submit">


	
</form>

<script type="text/javascript">
	$('#submit').click(function(){
       alert("hiee");
       
	});
</script>

</body>
</html>