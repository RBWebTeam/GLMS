@include('layout.userheader')
<!DOCTYPE html>
<html>
 
<head>
<!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<title>Assessment View</title>
	<style type="text/css">
		.hide {
    display: block !important;
}
		.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 2s linear infinite;
}
.container-fluid {margin:0px !important; padding:0px !important;}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script type="text/javascript">

	$(document).ready(function () {
	$.ajax({ 
   url: "{{URL::to('tree')}}",
   method:"GET",
   success: function(datas)  {
    var data=$.parseJSON(datas);
    console.log(data);

for (var i = 0; i < data.length ;i++) {
	var hasChild = false;
	if (data[i].parent_id!=0) {
	for (var j = i; j < data.length ;j++) {	
	if(data[i].id == data[j].parent_id) {
		hasChild = true;
		break;
	}
}
	if(hasChild){
		$('#'+data[i].parent_id).append('<li><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li>');
	}
		else{
        $('#'+data[i].parent_id).append('<li id="'+data[i].id+'"><a href="#" onClick="getAssessmentDetailByTopicID('+data[i].id+')">'+data[i].name+'</a></li>');
	}
	
     }else{
        $('.navtree').append('<li><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li><li class="divider"></li>');
     }
}
$('label.tree-toggler').click(function () {
		$(this).parent().children('ul.tree').toggle(300);
	});
   },

 });
});

function reDirectToAssessmentLaunch(assessmentId) {
    window.open('assessment-launch?assessment_id='+assessmentId+'','popUpWindow','left=10,top=10,,scrollbars=yes,menubar=no');  
}

function getAssessmentDetailByTopicID(topicId) {
	 $.ajax({ 
   url: "{{URL::to('assessment-topic')}}",
   method:"GET",
   data:"topicId=" + topicId,
   success: function(msg)  
   {
      var tablerows = new Array();
      $.each(msg, function( index, value ) {
      tablerows.push('<tr><td style="font-family: monospace">' + value.ID + '</td><td style="font-family: monospace">' + value.CourseName + '</td><td style="font-family: monospace">' + value.Duration + '</td>');
      if(value.ManagerNomination==1){//Request
      tablerows.push('<td> <button type="button" id="user_request" onClick="User_Course_request('+ value.ID +');" name="user_request" value="" class="btn btn-success user-request">Request</button> </td>');
    }
    else{//Assign
      tablerows.push('<td> <button type="button" id="user_request" onClick="user_course_assing('+ value.ID +');" name="user_request" value="" class="btn btn-primary user-assing">Assign</button> </td>');
    }
    }); 
    if(msg){
      $('#docs').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td style="font-family: monospace">ID</td><td style="font-family: monospace">Course Name</td><td style="font-family: monospace">Course Duration</td><td style="font-family: monospace">Request</td></tr><tr>'+tablerows+'</tr></table>');
      }else{
          $('#docs').empty().append('No Result Found');
      }
    }

 });
}
</script>
</head>

<body>
<div class="container-fluid">
<div class="col-md-3">
<div class="well">
    <div id="maindiv">
        <ul class="nav nav-list navtree">
        </ul>
    </div>
</div>
</div>
   
    <!--<div style="margin-left: 320px;" >
     <div class="loader" id="loader" style="display: none;position:fixed;top: 50%;left: 50%;"></div>-->
  <div class="col-md-9">
  <div id="docs" class="table table-striped">
    
  </div>
  </div>

  </div>
</body>
<script>

 function User_Course_request(id) {
            $.ajax({
                url: "{{url('user-course-request')}}",
                type: 'GET',
                data: { id:id},
                success: function(data)
                {
                     alert("Requested Course successfully");
                     window.location.href = "user-course-get-request";
                }
            });
  }
   
  function user_course_assing(id)
  {
        $.ajax({
                url: "{{url('user-course-not-assing')}}",
                type: 'GET',
                data: { id:id},
                success: function(data)
                {
                   alert("Assing Course successfully");
                    window.location.href = "user-course-get-request";
                }
        });
  }  
</script>
</html>

