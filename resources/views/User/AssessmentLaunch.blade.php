<!DOCTYPE HTML>
<html>
<head>
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

var $data = '[{"question":"Which one of the following is the ratio of the loan principal to the appraised value?","type":"1","optioncount":4,"optiontype":"1","selectedanswer":"","option":[{"option":"Combined Loan To Value: (CLTV) ratio","id":"1"},{"option":"Loan-to-Value Ratio","id":"2"},{"option":"Mortgage Loan","id":"3"},{"option":"Statutory Liquidity Ratio","id":"4"}]},{"question":"What is the product of the share price and number of the companys outstanding ordinary shares?","type":"1","optioncount":6,"optiontype":"2","selectedanswer":"","option":[{"option":"Market Capitalization","id":"2.1"},{"option":"Market Price","id":"2.2"},{"option":"Market Trend","id":"2.3"},{"option":"Treasury Stock","id":"2.4"},{"option":"Other Option 1","id":"2.5"},{"option":"Other Option 2","id":"2.6"}]},{"question":"A debt trap means inability to repay credit amount","type":"1","optioncount":2,"optiontype":"1","selectedanswer":"","option":[{"option":"true","id":"3.1"},{"option":"false","id":"3.2"}]},{"question":"Banks in India these days, hold about _______ per cent of their deposits as cash","type":"1","optioncount":4,"optiontype":"1","selectedanswer":"","option":[{"option":"5","id":"1"},{"option":20,"id":"2"},{"option":"15","id":"3"},{"option":"10","id":"4"}]}]';

$questions = JSON.parse($data);
});


function nextQuestion() {

    $selectedvalue = "";
    $("input:checkbox[class=chk]:checked").each(function () {
        $selectedvalue += "," + $(this).attr("id");
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
    $("input:radio[class=rad]:checked").each(function () {
         $selectedvalue = $(this).attr("id");
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });

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
    $('#questionreached').html($position+1 + "/" + $questions.length);
    var $ques = $questions[$position];
    document.getElementById('lblQuestion').innerHTML = $ques.question;
    var $selectedoption = $questions[$position].selectedanswer.split(',');


    var $optiontype = $ques.optiontype;
    if($optiontype==1){//Radio Button
        var $optioncount = $ques.optioncount;
        if($optioncount>0){
            var $radiobutton = "";
            var $option = $ques.option;
            for (var i = 0; i < $optioncount; i++) {
                if ($.inArray($option[i].id, $selectedoption) != -1){
                    $radiobutton += "<input type='radio' class='rad' checked name='answer' id='"+ $option[i].id+"' name='answer' value='"+$option[i].option+"'>"+ $option[i].option + "<br>";
                }
                else{
                    $radiobutton += "<input type='radio' class='rad' name='answer' id='"+ $option[i].id+"' name='answer' value='"+$option[i].option+"'>"+ $option[i].option + "<br>";
                }
            }
            document.getElementById('answer').innerHTML = $radiobutton;
        }
    }
    else{//Checkbox
        var $optioncount = $ques.optioncount;
        if($optioncount>0){
            var $radiobutton = "";
            var $option = $ques.option;
            for (var i = 0; i < $optioncount; i++) {
                if ($.inArray($option[i].id, $selectedoption) != -1){
                    $radiobutton += "<input type='Checkbox' checked class='chk' name='answer' id='"+ $option[i].id+"' value='"+$option[i].option+"'>"+ $option[i].option + "<br>";
                }
                else{
                     $radiobutton += "<input type='Checkbox' class='chk' name='answer' id='"+ $option[i].id+"' value='"+$option[i].option+"'>"+ $option[i].option + "<br>";
                }
            }
            document.getElementById('answer').innerHTML = $radiobutton;
        }    }
    }

}

function previousQuestion() {
    $selectedvalue = "";
    $("input:checkbox[class=chk]:checked").each(function () {
        $selectedvalue += "," + $(this).attr("id");
            //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
    $("input:radio[class=rad]:checked").each(function () {
         $selectedvalue = $(this).attr("id");
        });

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

function finish(argument) {
    alert('Assessment Completed');
    window.close();
}


</script>
</head>
<body>
<div id="questionreached"></div>
<div style="float: right;" id="timer">Duration: 30 mins</div>
<!-- <p id="timer"></p> -->
<label id="lblQuestion"><h4>Rules for the Conduct of Examinations</h4>
<p>1) No person will be allowed in an examination room during an examination except the candidates concerned and those supervising the examination.</p>
<p>2) Candidates must appear at the examination room at least twenty minutes before the commencement of the examination.</p>
<p>3) Candidates shall bring their photo identification (signed Photo ID) and place it in a conspicuous place on their desks. </p>
<p>4) Photo identification may include any one of the following, as long as it contains a photo and a signature: current University of Toronto Photo ID (T-Card) OR up-to-date Passport (any country) OR current Driver’s License (any country) OR current Canadian health card (any province or territory).</p>
<p>5) Candidates shall place their watch or timepiece on their desks.</p>
</label>
<div id="answer"></div>

<input type="button"  name="start" id="start" value="Start Assessment" onclick="start();">

<input type="button" name="previous" id="previous" value="Previous" onclick="previousQuestion();">

<input type="button"  name="next" id="next" value="Next" onclick="nextQuestion();" >

<input type="button"  name="finish" id="finish" value="Finish" onclick="finish();">


<script type="text/javascript">
    
function startTimer() {
    var countdown = 10 * 60 * 1000;
    var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

  if (countdown <= 0) {
     alert("Time Finished");
     clearInterval(timerId);
     //doSomething();
  } else {
     $("#timer").html(min + "min : " + sec + "sec");
  }

}, 1000);
}

   
</script>
<!-- <script>
// Set the date we're counting down to
var d = new Date();
// d.setMinutes(100);

var countDownDate = new Date(d).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timer").innerHTML =  hours + ": "
    + minutes + ": " + seconds + "";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "EXPIRED";
    }
}, 1000);
</script> -->

</body>
</html>
