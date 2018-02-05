<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style>
     tr:hover {
          background-color: #5bc0de;
        }
   .margin-tp {margin-top:15px !important;}
   </style>
   </head>
   <body>
   <div class="container">
   <div class="row">
   <form id="question_form" name="question form" method="post" action="{{url('questionbankupdate')}}"> <br><br>
   {{ csrf_field() }}

     <div class="col-md-6">
     <div class="col-xs-10">
     <label for="Question type" class="control-label">Question type</label><br>
     <select class="form-control" id="questiontype" name="questiontype" value="{{$que->QuestionType}}"> 
     @if($que->QuestionType==1)
     <option value="1" selected>Normal</option>
     @elseif($que->QuestionType==2)
     <option value="2" selected>Scenario</option>
     @elseif($que->QuestionType==3)
     <option value="3" selected>TrueorFalse</option>  
     @else
     @endif
     <option value="1" selected>Normal</option>
     <option value="2" selected>Scenario</option>
     <option value="3" selected>TrueorFalse</option>  
     </select>
     <br>
     <!--  {{$queopt[0]->QuestionBankID}} -->
     <p><b>Question:</b></p>
     <textarea name="Question" rows="5" cols="59" required="">{{$que->Question}}</textarea> <br> <br>
     <label> Mark per Question</label> <input type="text" value="{{$que->MarksPerQuestion}}" name="MPQ">
     <br><br>
     </div>
     </div>
     <br>
     <div class="col-md-6">
     <p><b>Answer type:</b></p> 
<?php if($que->AnswerType==1){?>
     <input type="radio" name="type" id="mcss" class="mcss1" value="1" checked> Multiple Choice Single Selection
     <input type="radio" name="type" id="mcms" value="2"> Multiple Choice Multi Selection
     <?php } else { ?>
     <input type="radio" name="type" id="mcss" class="mcss1" value="1"> Multiple Choice Single Selection
     <input type="radio" name="type" id="mcms" value="2" checked> Multiple Choice Multi Selection
     <?php } ?>

     <br><br>
     </center>
     <p><b>No.Of Options:</b></p>
     <input type="text" name="noofoption" id="noofoption" value="{{$que->NoOfOptions}}"oninput="return createcontrol(this)" onkeypress="return Numeric(event)" required="yes" >
     <div class="container">
     <table id="tbl" class="table table-bordered" style="width:35%"> 
     <thead>
     <tr>
     <th>Answer</th>
     <th>Correct Answer</th>
     </tr>
     <?php foreach ($queopt as $key => $value) {?>                    
     <tr>
     <td><input type="text" id="<?php echo $value->QuestionBankAnswerID; ?>" value="<?php echo $value->Answer; ?>"></td>
     <?php if($que->AnswerType==1){?>
     <td><input type='radio' id=" <?php echo $value->QuestionBankAnswerID; ?>" <?php echo ($value->IsCorrectAnswer==1) ?  "checked" : "" ; ?>></td>
     <?php } else {?>
     <td><input type='checkbox' id='check"+i+" ' name='check"+i+"' <?php echo ($value->IsCorrectAnswer==1) ?  "checked" : "" ; ?>></td>
     <?php  } ?>
     </tr>
        <?php } ?>
     </thead>
     <tbody>
     </tbody>
     </table>
     </div>
     <div id="divcontrol">  </div>
     <br>
     <input type="submit" name="submit" id="submit" onclick="getValue()" value="Update">
     <input type="hidden" id="id" name="id" value="{{$que->QuestionBankID}}">  
     </div>
     </form>