@include('layout.userheader')
<!DOCTYPE html>
<html>
 
<head>
<!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->
<link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
	<title>Assessment View</title>
	<style type="text/css">
		.hide{
			style="display: none;"
		}
		.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
	</style>

<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck"> -->
	<!-- <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!-- <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script> -->
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
$('.table').empty();
$('#loader').css("display","block");

	//alert(topicId);
	 $.ajax({ 
   url: "{{URL::to('assessment-topic')}}",
   method:"GET",
   data:"topicId=" + topicId,
   success: function(msg)  
   {
   	$questions = JSON.parse(msg);
// $('table').append("<table style='width: 100%;border: 1;'' border='1'><th>Assessment Name</th><th>Status</th><th>Passing %</th><th>% Scored</th><th>Attempts</th><th>Duration</th><th>EndDate</th><th>Launch</th></table>");
	// $('#tblDisplay').css("display","block");
	$('.table').empty();
	if(	$questions .length > 0){
	$('.table').append("<table border='1' class='tblDisplay' ><th>Assessment Name</th><th>Status</th><th>Passing %</th><th>% Scored</th><th>Attempts</th><th>Duration</th><th>EndDate</th><th>Launch</th></table>");
   	for (var i = 0; i<  $questions.length; i++) {
   		if($questions[i].IsLocked == "0"){
   			$('.tblDisplay').append("<tr style='text-align: center;'><td><a href='assessment-detail?assessmentId="+ $questions[i].AssessmentId +"'>"+$questions[i].AssessmentName +"</a></td><td>"+$questions[i].Status+"</td><td>"+$questions[i].PassingPercentage +'%' + "</td><td>"+$questions[i].PercentageScored +"</td><td>"+$questions[i].YourLastAttempt + ' of ' + $questions[i].NoOfAttempts +"</td><td>"+$questions[i].Duration+" Mins</td><td>"+$questions[i].EndDate+"</td><td><a onClick='reDirectToAssessmentLaunch("+$questions[i].AssessmentId+")'>Launch</a></td></tr>");
   		}
   		else{
   			$('.tblDisplay').append("<tr style='text-align: center;'><td><a href='assessment-detail?assessmentId="+ $questions[i].AssessmentId +"'>"+$questions[i].AssessmentName+"</a></td><td>"+$questions[i].Status+"</td><td>"+$questions[i].PassingPercentage+'%'+"</td><td>"+$questions[i].PercentageScored+"</td><td>"+$questions[i].YourLastAttempt + ' of ' + $questions[i].NoOfAttempts  +"</td><td>"+$questions[i].Duration+' Mins'+"</td><td>"+$questions[i].EndDate+"</td><td>Locked</td></tr>");
   		}
   	}
   }
   else{
	$('.table').append("<div>No Assessment Found</div>")
   }
   $('#loader').css("display","none");	
}

 });
}

</script>
</head>

<body>
<div style="width: 100%; overflow: hidden;">
<div class="well" style="width:300px; padding: 8px 0;float: left;">
    <div style="overflow-y: scroll; overflow-x: hidden; height: 500px;" id="maindiv">
        <ul class="nav nav-list navtree">
        </ul>
    </div>
</div>
   
    <div style="margin-left: 320px;" > 
     <div class="loader" id="loader" style="display: none;position:fixed;top: 50%;left: 50%;"></div>
    <div class="table"></div>

    <!-- <table style="width: 100%;border: 1;display: none;" border="1" id="tblDisplay" >
    <th>Assessment Name</th>
    <th>Status</th>
    <th>Passing %</th>
    <th>% Scored</th>
    <th>Attempts</th>
    <th>Duration</th>
    <th>EndDate</th>
    <th>Launch</th>
    
    </table> -->
     </div>
</div>
</body>
</html>