<!DOCTYPE html>
<html>
<script src="js/jquery-1.11.1.min.js" ></script>

<script type="text/javascript">
var $questions;
var $position = 0;
$(document).ready(function () {
window.onbeforeunload = function (event) {
    var message = 'Important: Please click on \'Save\' button to leave this page.';
    if (typeof event == 'undefined') {
        event = window.event;
    }
    if (event) {
        event.returnValue = message;
    }
    return message;
};

    $('#next').hide();
    $('#previous').hide();
    $('#finish').hide();


 $.ajax({ 
   url: "{{URL::to('assessment-question')}}",
   method:"GET",
   data:"assessment_id="+getParameterByName("assessment_id"),
   success: function(msg)  
   {
    //console.log(msg);
    //data=$.parseJSON(msg);
    //msg.replace(/\n/ig, '');
     $questions = JSON.parse(msg);
      $questions = JSON.parse($questions);
      // $.each($questions,function(key,value){
      //   console.log(value);
      // });
      start();
    // console.log($questions);
   }

 });
//var $data = '[{"question":"Commercial mortgages, farm mortgages and home mortgages are categories of?","type":"1","optioncount":"4","optiontype":"1","selectedanswer":"","option":[{"option":"swapped mortgages","id":"1"},{"option":"sovereign mortgages","id":"2"},{"option":"secondary mortgages","id":"3"},{"option":"primary mortgagees","id":"4"}]},{"question":"Primary mortgages involves","type":"1","optioncount":"4","optiontype":"1","selectedanswer":"","option":[{"option":"three institutions","id":"5"},{"option":"single investor","id":"6"},{"option":"multiple investor","id":"7"},{"option":"multiple institutions","id":"8"}]},{"question":"aaasas","type":"1","optioncount":"4","optiontype":"1","selectedanswer":"","option":[{"option":"borrower defaults","id":"9"},{"option":"borrower does not default","id":"10"},{"option":"borrower want less rate","id":"11"},{"option":"borrower want profit","id":"12"}]},{"question":"ksahdks","type":"1","optioncount":"4","optiontype":"1","selectedanswer":"","option":[{"option":"secondary loan","id":"13"},{"option":"primary loan","id":"14"},{"option":"mortgages","id":"15"},{"option":"swapped mortgages","id":"16"}]},{"question":"Mortgages used to purchase townhouses and apartment complexes are classified as","type":"1","optioncount":"4","optiontype":"1","selectedanswer":"","option":[{"option":"multi mortgage","id":"17"},{"option":"multifamily dwelling mortgages","id":"18"},{"option":"sovereign dwelling mortgages","id":"19"},{"option":"primary dwelling mortgages","id":"20"}]}]';

// var $data = '[{"question":"Which one of the following is the ratio of the loan principal to the appraised value?","type":"1","optioncount":4,"optiontype":"1","selectedanswer":"","option":[{"option":"Combined Loan To Value: (CLTV) ratio","id":"1"},{"option":"Loan-to-Value Ratio","id":"2"},{"option":"Mortgage Loan","id":"3"},{"option":"Statutory Liquidity Ratio","id":"4"}]},{"question":"What is the product of the share price and number of the companys outstanding ordinary shares?","type":"1","optioncount":6,"optiontype":"2","selectedanswer":"","option":[{"option":"Market Capitalization","id":"2.1"},{"option":"Market Price","id":"2.2"},{"option":"Market Trend","id":"2.3"},{"option":"Treasury Stock","id":"2.4"},{"option":"Other Option 1","id":"2.5"},{"option":"Other Option 2","id":"2.6"}]},{"question":"A debt trap means inability to repay credit amount","type":"1","optioncount":2,"optiontype":"1","selectedanswer":"","option":[{"option":"true","id":"3.1"},{"option":"false","id":"3.2"}]},{"question":"Banks in India these days, hold about _______ per cent of their deposits as cash","type":"1","optioncount":4,"optiontype":"1","selectedanswer":"","option":[{"option":"5","id":"1"},{"option":20,"id":"2"},{"option":"15","id":"3"},{"option":"10","id":"4"}]}]';

//$questions =  JSON.parse($data);
//start();
});
function getParameterByName(name) {
     url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function nextQuestion() {

    $selectedvalue = "";
    $("input:checkbox[class=chk]:checked").each(function () {
        $selectedvalue += $(this).attr("id") +"," ;
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
    $("input:radio[class=rad]:checked").each(function () {
         $selectedvalue = $(this).attr("id");
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
      $selectedvalue = $selectedvalue.replace(/,\s*$/, "");

    $questions[$position].selectedanswer = $selectedvalue;
    $position++;
    bindQuestion();
}


function bindQuestion() {

if($position == $questions.length){
          $('#next').hide();
         $('#previous').show();
         $('#finish').show();
    }else{
        if($position == $questions.length-1){
             $('#finish').show();
             $('#next').hide();
             $('#previous').show();
        }
        else{            
             $('#finish').hide();
             $('#previous').show();
             $('#next').show();
        }

    if($position == 0){
        $('#previous').hide();
    }
    else{
        $('#previous').show();
    }
    $('#questionreached').html("Question " + ($position+1) + " of " + $questions.length);
    $('#lblQuestionNo').html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question: " + ($position+1));
    var $ques = $questions[$position];
    // $('#lblQuestion').html($ques.question);
    document.getElementById('lblQuestion').innerHTML = $ques.question;//"<pre><p>" + $.parseHTML($ques.question)[0].data + "</p></pre>";
    var $selectedoption = $questions[$position].selectedanswer.split(',');


    var $optiontype = $ques.optiontype;
    if($optiontype==1){//Radio Button
        var $optioncount = $ques.optioncount;
        if($optioncount>0){
            var $radiobutton = "<ul class='ans'>";
            var $option = $ques.option;
            for (var i = 0; i < $optioncount; i++) {
                if ($.inArray($option[i].id, $selectedoption) != -1){
                    $radiobutton += "<li><input type='radio' class='rad' checked name='answer' id='"+ $option[i].id+"' name='answer' value='"+$option[i].option+"'> "+ $option[i].option + "</li>";
                }
                else{
                    $radiobutton += "<li><input type='radio' class='rad' name='answer' id='"+ $option[i].id+"' name='answer' value='"+$option[i].option+"'> "+ $option[i].option + "</li>";
                }
            }
            $radiobutton += "</ul>";
            document.getElementById('answer').innerHTML = $radiobutton;
        }
    }
    else{//Checkbox
        var $optioncount = $ques.optioncount;
        if($optioncount>0){
            var $radiobutton = "<ul class='ans'>";
            var $option = $ques.option;
            for (var i = 0; i < $optioncount; i++) {
                if ($.inArray($option[i].id, $selectedoption) != -1){
                    $radiobutton += "<li><input type='Checkbox' checked class='chk' name='answer' id='"+ $option[i].id+"' value='"+$option[i].option+"'> "+ $option[i].option + "</li>";
                }
                else{
                     $radiobutton += "<li><input type='Checkbox' class='chk' name='answer' id='"+ $option[i].id+"' value='"+$option[i].option+"'> "+ $option[i].option + "</li>";
                }
            }
             $radiobutton += "</ul>";
            document.getElementById('answer').innerHTML = $radiobutton;
        }    }
    }

}

function previousQuestion() {
    $selectedvalue = "";
    $("input:checkbox[class=chk]:checked").each(function () {
        $selectedvalue += $(this).attr("id")+ ",";
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
    $("input:radio[class=rad]:checked").each(function () {
         $selectedvalue = $(this).attr("id");
        });
    $selectedvalue = $selectedvalue.replace(/,\s*$/, "");
    $questions[$position].selectedanswer = $selectedvalue;
    $position--;
    bindQuestion();
}

function start() {
    startTimer();
    $('#start').hide();
    $('#previous').show();
    $('#next').show();
    bindQuestion();
}

function finish() {
    
    submitAssessment();
    //window.close();
}

function submitAssessment() {

$selectedvalue = "";
    $("input:checkbox[class=chk]:checked").each(function () {
        $selectedvalue += $(this).attr("id") +"," ;
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
    $("input:radio[class=rad]:checked").each(function () {
         $selectedvalue = $(this).attr("id");
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
      $selectedvalue = $selectedvalue.replace(/,\s*$/, "");

    $questions[$position].selectedanswer = $selectedvalue;

var data = "";
for (var i = 0; i < $questions.length; i++) {
  data += $questions[i].questionId + "~" + $questions[i].selectedanswer +"|";
}

$.ajax({
   url: "{{URL::to('assessment-submit')}}",
   method:"POST",
   data : 'data=' + data +"&assessment_id="+getParameterByName("assessment_id"),// JSON.stringify($questions),// JSON.stringify($questions),
   success: function(msg)  
   {
      alert('Assessment Completed');
      window.close();
      window.opener.location.reload();

    //console.log(msg[0]);
   }

 });
}


</script>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Assessment</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
 body {background:#f5f5f5;color:#666;}
 .headr {    background:#fe2224; padding:15px; color:#fff; box-shadow: 0px 0px 2px 1px #ddd;}
 .white-bg {padding:15px 0px;  background:#fff; box-shadow: 0px 0px 1px 1px #ddd;}
 .mrg-top{margin-top:20px;}
 h1 {margin:0px;padding:0px; font-size:20px; text-transform:uppercase;}
.bordered {border:10px solid #fff;}
.border-top{border-top:1px solid #fe2224;}
.tabs-left, .tabs-right {
  border-bottom: none;
  padding-top: 2px;
}
.ul-list {padding:20px; border:1px dashed #ddd;border-radius:10px; -webkit-border-radius:10px; background:#fff;}
.ul-list li {padding:6px; border-bottom: 1px dashed #eee; width:90%; list-style-type: circle; font-size:16px;}
.no-pad-left {padding-left:0px;}


.list1 {padding:20px;}
.list1 ul {margin:0px; padding:15px; width:80%; padding-top:0px;}
.list1 ul li {border-bottom:1px dashed #eee;padding:5px; font-size:14px; color:#666; list-style-type:none;}
.s-btn {padding:20px; background:#fe2224; font-size:20px;border:0px;color:#fff;margin:20px; margin-top:25%;}

.list2 ul li {padding:5px; font-size:14px; color:#666; list-style-type:none; border-bottom:1px dashed #ebd953;}
.list2 {padding:20px;}
.list2 ul {margin:0px; padding:5px; width:100%;}
.list2 h2 {margin:0px; padding:0px;}
.note-bg {background:#f8ec74;}
.lst01 {padding:20px;}
.bx-shadow {box-shadow: 0px 0px 1px 1px #ddd;}
.timr {padding:20px; border:1px dashed #eee;background:#fe2224; border-radius:50%; text-align:center;}
.que {padding:25px;padding-top:0px; width:auto; height:auto; overflow:scroll; display:block; margin:20px;color:#999; border: 1px solid #eee;background:#f5f5f5;}
.que1 {padding:15px; border-bottom:1px dashed #eee; font-size:16px;}
.ans li {list-style-type:none; padding:8px; border-bottom:1px solid #f8f8f8;font-size:16px;color:#999;}
.ans {width:auto;}
.nmbrs {padding:9px 12px;width: 36px;display: inline-table;margin-right:15px;border-radius:50%;background:#fe2224;color:#fff;}
.text-style {text-transform:uppercase;color:#fe2224;font-style: italic; }
.no-pad {padding-top:0px;}
.submit-btn {background:transparent;border:3px solid #fe2224; padding:10px 40px; margin: 0 auto;margin-top: 20px; display: block;font-size:22px; color:#fe2224;}
.submit-btn:hover {background:#fe2224; color:#fff;}
.ccc {color: #fe2224;font-weight: bold;}
.time-txt{position: absolute;margin-left: -94px;}
.white-txt {color:#fff;}

@media screen and (max-width:768px) {
.s-btn {width:88%; margin-top:0px;}
.no-pad-left {padding-right:0px; margin-bottom:20px;}
.heigh-300 {height:200px;}
.list1 {padding:0px;}
.que {width:100%;}
 .nmbrs{display: table-caption;}
 .text-style {text-align: center;width: 100%;}
}
</style>
</head>
<body>
<form class="" id="user_form" name="user_form" role="form" method="post" >
<div class="container">
<div class="row">
 
 <div class="col-md-12 mrg-top">
  <div class="headr"><h1 class="text-center" id="lblAssessmentName">{{ $assessmentdetail->AssessmentName }}</h1></div>
 <div class="white-bg  col-md-12 heigh-300 no-pad">

 <div class="col-md-12">
     <div class="col-md-8 col-xs-12"><h3 class="pull-left text-style"><br><p id="questionreached">question 1 of 10</p></h3></div>
		  <div class="col-md-4 col-xs-12"><div class="pull-right"><h3 class="timr text-danger"><p class="time-txt">Timer:</p> <b id="timer" class="white-txt">00.00</b></h3></div></div>
		  </div>

  </div>
 </div>
 

  <div class="col-md-12 mrg-top">
  <div class="bx-shadow white-bg">
    <h3 class="ccc" id="lblQuestionNo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Question.</h3>
  <div class="que">
   
	 <h5 class="que1" id="lblQuestion"> It is a long established fact that a reader will be distracted by the It is a long established fact that a reader will be distracted by the It is a long established fact that a reader will be distracted by the? </h5>
	 
	 
   </div>
   
   <br>
   <h3 class="ccc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Options.</h3>
   <div id="answer"> </div>
   <!-- <ul class="ans">
	      <li><input type="radio" name="rdo" /> Option 1</li>
		  <li><input type="radio" name="rdo" /> Option 2</li>
		  <li><input type="radio" name="rdo" /> Option 3 </li>
		  <li><input type="radio" name="rdo" /> Option 4</li>
	  </ul> -->
	  
	  <br>
	  <ul class="pager">
  <li><a name="previous" id="previous" onclick="previousQuestion();">Previous</a></li>
  <li><a  name="next" id="next" onclick="nextQuestion();">Next</a></li>
</ul>
  </div>
 
  <a name="finish" id="finish" class="submit-btn" onclick="finish()">Finish</a>
   <!-- <button type="button" name="finish" id="finish" class="submit-btn" onclick="finish()">Finish</button> -->
  
  </div>
  
 
</div>
<br>
<script type="text/javascript">

function startTimer() {
  var min = {{ $assessmentdetail->Duration }}
    var countdown = min * 60 * 1000;
    var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

  if (countdown <= 0) {
     alert("Time Finished");

     clearInterval(timerId);
      window.close();
        window.opener.location.reload();
  

     //doSomething();
  } else {
     $("#timer").html(min + "M : " + sec + "S");
  }

}, 1000);
}

   
</script>
</form>
</body>
</html>