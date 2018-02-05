@include('layout.header')
@include('layout.adminheader')
<style type="text/css">
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
<form class="" id="user_form" name="user_form" role="form" method="post" >
 {{ csrf_field() }}
<div class="col-md-9">
  <h3>Assessment Question mapping</h3>

<hr>

     <div class="loader" id="loader" style="display: none;position:fixed;top: 50%;left: 50%;"></div>
<div><span>Assessment :- </span>
<span><select style="width: 200px;" id="assessmentid">
<option value="0">--Select--</option>
<?php foreach($assessmentdetail as $val){?>
      <option value="<?php echo $val->AssessmentId; ?>"><?php echo $val->AssessmentName; ?></option>
       <?php } ?>
<!--   <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="vw">VW</option>
  <option value="audi" selected>Audi</option> -->
</select></span></div>
<div>Question List :-</div>
<div class="divnewtable">
	
	<!-- <table style="width: 100%;" border="1" class="newtable" ><th width="10%">Select</th><th>Questions</th>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		
	</table> -->
</div>
<div><input type="button" name="" onclick="InsertAssessmentQuestionMapping();" value="Add"></div>
<br>
<div>Added Questions :-</div>
<div class="divexistingtable">
	
	<!-- <table style="width: 100%;" border="1"  class="existingtable"><th width="10%">Select</th><th>Questions</th>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="select" /></td>
			<td></td>
		</tr>
		
	</table> -->
</div>
<div><input type="button" name="" onclick="DeleteAssessmentQuestionMapping();" value="Remove"></div>

</form>
<script type="text/javascript">
	$('select').on('change', function() {
		if(this.value==0){
			$('.divnewtable').empty();
	     	$('.divexistingtable').empty();
		}
		else
		{
		$('#loader').css("display","block");
		id = this.value;
  		GetAssessmentQuestionMapping(id);

}
});

function GetAssessmentQuestionMapping(id) {
	$.ajax({ 
   url: "{{URL::to('GetAssessmentQuestionMapping')}}",
   method:"GET",
   data: "AssessmentId="+id,
   // data:"assessment_id="+getParameterByName("assessment_id"),
   success: function(msg)  {
	     questions = JSON.parse(msg);
	     console.log(questions);
	     $('.divnewtable').empty();
	     $('.divexistingtable').empty();
	     if(questions.length > 0){
		     $('.divnewtable').append("<table style='width: 100%;'' border='1' class='newtable' ><th width='10%''>Select</th><th>Questions</th></table>");

		     $('.divexistingtable').append("<table style='width: 100%;'' border='1' class='existingtable' ><th width='10%''>Select</th><th>Questions</th></table>");
		     for (var i = 0; i < questions.length; i++) {
		     	if(questions[i].AssessmentId == id)	{
					$('.existingtable').append("<tr><td><input class='existingtable' type='checkbox' name='select' id='"+ questions[i].QuestionBankID +"' /></td><td>"+ questions[i].Question +"</td></tr>");
		     	}
		     	else{
					$('.newtable').append("<tr><td><input class='newtable' type='checkbox' name='select' id='"+ questions[i].QuestionBankID +"' /></td><td>"+ questions[i].Question +"</td></tr>");
		     	}
		     }
	 	}
	 	$('#loader').css("display","none");
	   }
 	});
}

</script>
<script type="text/javascript">
	function InsertAssessmentQuestionMapping() {

	var newtable = [];
    $('.newtable input[type="checkbox"]:checked').each(function() {
      newtable.push($(this).attr("id"));
    });
    //alert(newtable.join(','));
    //$('#selectedFeatures').html(newtable.join(','));

	$.ajax({ 
	   url: "{{URL::to('InsertAssessmentQuestionMapping')}}",
	   method:"POST",
	    data:"assessmentId="+$('#assessmentid').val()+"&QuestionId="+newtable.join(',')+',',
	   success: function(msg)  {
		     	alert(msg);
		     	GetAssessmentQuestionMapping($('#assessmentid').val());
		 	}
	});
}

function DeleteAssessmentQuestionMapping() {

	var newtable = [];
    $('.existingtable input[type="checkbox"]:checked').each(function() {
      newtable.push($(this).attr("id"));
    });
    //alert(newtable.join(','));
    //$('#selectedFeatures').html(newtable.join(','));

	$.ajax({ 
	   url: "{{URL::to('DeleteAssessmentQuestionMapping')}}",
	   method:"POST",
	    data:"assessmentId="+$('#assessmentid').val()+"&QuestionId="+newtable.join(',')+',',
	   success: function(msg)  {
		     	alert(msg);
		     	GetAssessmentQuestionMapping($('#assessmentid').val());
		 	}
	});
}
</script>

<!-- 

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div> -->