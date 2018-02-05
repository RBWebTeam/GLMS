<!DOCTYPE html>
<html>
<head><br>
<center><font size="5">Question Bank</font></center>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
    <style>
     tr:hover {
          background-color: #5bc0de;
        }
	.margin-tp {margin-top:15px !important;}*/
 </style>
 </head>
 <body>
 <div class="container">
 <div class="row">
 <form id="question_form" name="question form" method="post"> <br><br>
  {{ csrf_field() }}

  <div class="col-md-6">
  <div class="col-xs-10">
  <label for="Question type" class="control-label">Question type</label><br>
  <select class="form-control" id="questiontype" name="questiontype"> 
  <option value="1">Normal </option>
  <option value="2">Scenario</option>
  <option value="3">TrueorFalse</option>
  </select>
  <br>
  <p><b>Question:</b></p>
  <textarea name="Question" rows="5" cols="59" required=""></textarea> <br> <br>
  <label> Mark per Question</label> <input type="text" name="MPQ" required="">
  <br><br>
  </div>
  </div>
  <br>
        <div class="col-md-6">
        <p><b>Answer type:</b></p> 
        <input type="radio" name="type" id="mcss" class="mcss1" checked="1" value="1"> Multiple Choice Single Selection
        <input type="radio" name="type" id="mcms"  value="2"> Multiple Choice Multi Selection
        <br><br>
        <form action="process_repair.php" method="POST">
        </center>
        <p><b>No.Of Options:</b></p>
        <input type="text" name="noofoption" id="noofoption" oninput="return createcontrol(this)" onkeypress="return Numeric(event)" required="yes" >
        <div class="container">
        <table id="tbl" class="table table-bordered" style="width:20%"> 
        <thead>
	    <tr>
	    <th>Answer</th>
        <th>Correct Answer </th><br>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        </div>
        <div id="divcontrol">  </div>
        <br>
        <input type="submit" style="font-face: 'Comic Sans MS';font-size: larger;color: white;background: #126757;border: 1px solid #fff;padding: 5px 20px "  name="submit" id="submit" onclick="getValue(),validateans()" value="submit">
        <input type="hidden" id="hdnvalue" name="hdnvalue">

        </form>
        </div>
        </div>
        </div>
        <div class="container">
        <table id="tbl" class="table table-bordered"style="width:50%">
        <thead>
        <tr>
        <th>Question</th>
        <th>NoOfOptions</th>
        <th>MarksPerQuestion</th>  
        <th>Question type</th>                         
        <th>Delete</th>
        <th>Edit</th>
        </tr> 
        </thead>
        <tbody>
        <?php foreach ($query as $key => $value) {?>                    
        <tr>
        <td><?php echo $value->Question; ?> </td>
        <td><?php echo $value->NoOfOptions; ?> </td>        
        <td><?php echo $value->MarksPerQuestion; ?> </td>  
        <td><?php echo $value->QuestionType; ?> </td>  
      
        <td ><a href="{{url('questionbank/delete')}}/{{$value->QuestionBankID}}" onclick="return confirm('Are you sure want to delete this record?')"> <span class="glyphicon glyphicon-trash"></span>
</a></td> 
        <td ><a href="{{url('questionbank/edit')}}/<?php echo $value->QuestionBankID; ?>"> <span class="glyphicon glyphicon-pencil"></span></a></td>
        </tr> 
        <?php } ?>  
        </tbody>
        </body>
        <script type="text/javascript">
        function Numeric(event) {
        if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 8) {
        event.keyCode = 0;
        return false;
           }
         }

     var ins=0;
     $( document ).ready(function() {
   
     $('#mcss').click(function(){
 	  ins=1;
 		$('#divcontrol').empty();
   })

     $('#mcms').click(function(){
	 ins=2;
	 $('#divcontrol').empty();
  })

  });
     function createcontrol(val){
	 var NoOfOptions = val.value==""?0:val.value;// $('noofoption').val();
	 var data = "<table>";
	 var selection = document.getElementById('mcss').checked;
	 $('#divcontrol').empty();
	 if (NoOfOptions<11) {
     for (var i = 1; i <= NoOfOptions; i++) {
	 data += "<tr>"; 
	 data += "<td><input type='text'  id='txt"+i+"' name='txt"+i+"'>&nbsp; &nbsp</td>"
	 if(selection){
			//Radio Button
			data += "<td><input type='radio' id='radio"+i+"' name='radio'></td>" 
	    }else{
			data += "<td><input type='checkbox' id='check"+i+"' name='check'></td>"

		}
         data += "</tr>"
	 	console.log(i);
	 } 
      }
        else{alert(" Not exceed than 10...")}
	       data += "</table>";
	       $('#divcontrol').append(data);
	 	 //alert(val.value);
}
      function createcontrolToEdit(val){
	  var NoOfOptions = val.value==""?0:val.value;// $('noofoption').val();
	  var data = "<table>";
	  var selection = document.getElementById('mcss').checked;
	  $('#divcontrol').empty();
	  if (NoOfOptions<11) {

      for (var i = 1; i <= NoOfOptions; i++) {
	  data += "<tr>"; 
	  data += "<td><input type='text' required='yes' name='Answer' id='txt"+i+"' name='txt"+i+"'></td>"
	  if(selection){
			//Radio Button

	  data += "<td><input type='radio' id='radio"+i+"' name='radio"+i+"' ></td>"
		}else{
	  data += "<td><input type='checkbox' id='check"+i+"' name='check"+i+"'></td>"

		}
          data += "</tr>"
	 	console.log(i);
	   }
      }
     else{alert(" Not exceed than 10...")}
	 data += "</table>";
	 $('#divcontrol').append(data);
	 	 //alert(val.value);
 }

    function getValue(){
	var NoOfOptions = document.getElementById('noofoption').value;// $('noofoption').val();
	var selection = document.getElementById('mcss').checked;
	var data = "";
	for (var i = 1; i <= NoOfOptions; i++) {
	data += document.getElementById("txt"+i).value + ",";
		//console.log(document.getElementById("txt"+i).value);
	if(selection){
	if(document.getElementById("radio"+i).checked){
				data += 1 + "|";	
			}
			else{
				data += 0 + "|";
			}
			
			console.log(data);
				//console.log(document.getElementById("radio"+i).checked);
		}
		else{
			if(document.getElementById("check"+i).checked){
				data += 1 + "|";	
			}
			else{
				data += 0 + "|";
			}
			
			//data += document.getElementById("check"+i).checked + "|";
			console.log(data);
			//console.log(document.getElementById("check"+i).checked);	
		}

	}
		$("#hdnvalue").val(data);
}
$(document).on('click','.mcms_cl',function(){
       var id= $(this).attr('id');
         $('#'+id).val(1);
})

 </script>
   </html>




