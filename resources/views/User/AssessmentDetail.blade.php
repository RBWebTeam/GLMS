<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
@include('layout.userheader')
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Assessment</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  function reDirectToAssessmentLaunch(assessmentId) {
   window.open('assessment-launch?assessment_id='+assessmentId+'','popUpWindow','left=10,top=10,,scrollbars=yes,menubar=no');  
}

    //event.preventDefault();   
      // function reDirectToAssessmentLaunch() {
      //    $.ajax({ 
      //      url: "{{URL::to('assessment-launch')}}",
      //      method:"get",
      //      data:$('#user_form').serialize(),
      //      success: function(msg)  
      //      {
      //       console.log(msg);
      //      }
      //    });
 
      //      // window.location.href = 'assessment-launch';                      
      //   }
  </script>
 <!--  <script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script> -->
<style>
 body {background:#f5f5f5;}
 .headr {    background:#fe2224; padding:15px; color:#fff; box-shadow: 0px 0px 2px 1px #ddd;}
 .white-bg {padding:20px 0px;  background:#fff; box-shadow: 0px 0px 1px 1px #ddd;}
 .mrg-top{margin-top:20px;}
 h1 {margin:0px;padding:0px; font-size:22px; text-transform:uppercase;}
.bordered {border:10px solid #fff;}
.border-top{border-top:1px solid #fe2224;}
.tabs-left, .tabs-right {
  border-bottom: none;
  padding-top: 2px;
}
.ul-list {padding:20px; border:1px dashed #ddd;border-radius:10px; -webkit-border-radius:10px; background:#fff;}
.ul-list li {padding:6px; border-bottom: 1px dashed #eee; width:90%; list-style-type: circle; font-size:16px;}
.no-pad-left {padding-left:0px;}

.tabs-left {
  border-right: 1px solid #ddd;
}
.tabs-right {
  border-left: 1px solid #ddd;
}
.tabs-left>li, .tabs-right>li {
  float: none;
  margin-bottom: 2px;
}
.tabs-left>li {
  margin-right: -1px;
}
.tabs-right>li {
  margin-left: -1px;
}
.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
}

.tabs-right>li.active>a,
.tabs-right>li.active>a:hover,
.tabs-right>li.active>a:focus {
  border-bottom: 1px solid #ddd;
  border-left-color: transparent;
}
.tabs-left>li>a {
  border-radius: 4px 0 0 4px;
  margin-right: 0;
  display:block;
}
.tabs-right>li>a {
  border-radius: 0 4px 4px 0;
  margin-right: 0;
}
.vertical-text {
  margin-top:50px;
  border: none;
  position: relative;
}
.vertical-text>li {
  height: 20px;
  width: 120px;
  margin-bottom: 100px;
}
.vertical-text>li>a {
  border-bottom: 1px solid #ddd;
  border-right-color: transparent;
  text-align: center;
  border-radius: 4px 4px 0px 0px;
}
.vertical-text>li.active>a,
.vertical-text>li.active>a:hover,
.vertical-text>li.active>a:focus {
  border-bottom-color: transparent;
  border-right-color: #ddd;
  border-left-color: #ddd;
}
.vertical-text.tabs-left {
  left: -50px;
}
.vertical-text.tabs-right {
  right: -50px;
}
.vertical-text.tabs-right>li {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.vertical-text.tabs-left>li {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #fff;
    cursor: default;
    background-color: #79b6f5;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.list1 {padding:20px;}
.list1 ul {margin:0px; padding:15px; width:80%; padding-top:0px;}
.list1 ul li {border-bottom:1px dashed #eee;padding:5px; font-size:14px; color:#666; list-style-type:none;}
.s-btn {padding:20px; background:#fe2224; font-size:20px;border:0px;color:#fff;margin:20px; margin-top:25%; display: block;width: 120px;}

.list2 ul li {padding:5px; font-size:14px; color:#666; list-style-type:none; border-bottom:1px dashed #ebd953;}
.list2 {padding:20px;}
.list2 ul {margin:0px; padding:5px; width:100%;}
.list2 h2 {margin:0px; padding:0px;}
.note-bg {background:#f8ec74;}
.lst01 {padding:20px;}
.bx-shadow {box-shadow: 0px 0px 1px 1px #ddd;}

@media screen and (max-width:768px) {
.s-btn {width:88%; margin-top:0px;}
.no-pad-left {padding-right:0px; margin-bottom:20px;}
}
</style>
</head>
<body>
<form class="" id="user_form" name="user_form" role="form" method="post" >
                               <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<div class="container">
<div class="row">
 
 <div class="col-md-12 mrg-top">

  <div class="headr">
  
  <h1 class="text-center" id="lblAssessmentName">{{$assessment->AssessmentName}}</h1>
   

  <!-- <h1 class="text-center" id="lblAssessmentName">Test</h1> -->
  
  </div>
 <div class="white-bg  col-md-12">

 <div class="list1 col-md-8">
    
          <h3>&nbsp;&nbsp; Summary</h3>
          <ul>
              <li><b>Passing Score :-</b> &nbsp; {{$assessment->PassingPercentage}} % </li>
              <li><b>Your Score :-</b> &nbsp; {{$assessment->PercentageScored}}% </li>
              <li><b>Expiry :-</b> &nbsp; {{$assessment->EndDate}} </li>
              <li><b>Your No. of Attempt :-</b> &nbsp; {{$assessment->YourLastAttempt}} / {{$assessment->NoOfAttempts}} </li>
              <li><b>Duration :-</b> &nbsp; {{$assessment->Duration}} Mins</li>
              @if ($assessment->IsLocked == "1")
                <li><b>Assessment Locked :-</b> Yes <span class="glyphicon glyphicon-info-sign" title="Your no of attempt is reached"></span></li> 
              @else
                <li><b>Assessment Locked :-</b> No</li>
              @endif
          </ul>
          </div>
           @if ($assessment->IsLocked == "1")
                <div class="col-md-4"> <a class="s-btn" >Locked</a></div>
              @else
                <div class="col-md-4"> <a class="s-btn" onclick="reDirectToAssessmentLaunch({{$assessment->AssessmentId}})" >Launch</a></div>
              @endif
          

  </div>
 </div>
 
 <div class="col-md-12 mrg-top">
  <div class="col-md-8 no-pad-left">
  <div class="ul-list bx-shadow ">
  <h4>Rules for the Conduct of Examinations</h4>
      <ul>
          <li>No person will be allowed in an examination room during an examination except the candidates concerned and those supervising the examination</li>
          <li>Candidates must appear at the examination room at least twenty minutes before the commencement of the examination.</li>
          <li>Candidates shall bring their photo identification (signed Photo ID) and place it in a conspicuous place on their desks.</li>
          <li>Photo identification may include any one of the following, as long as it contains a photo and a signature: current University of Toronto Photo ID (T-Card) OR up-to-date Passport (any country) OR current Driver’s License (any country) OR current Canadian health card (any province or territory).</li>
          <li>Candidates shall place their watch or timepiece on their desks.</li>
          
      </ul>
  </div>
  </div>
  <div class="col-md-4 note-bg bx-shadow ">
  <div class="list2">
  <h2>&nbsp;Note:</h2>
   <ul>
          <li>wtwe tw tew tewtwet wet</li>
          <li>w etwet wet wetwt wt wet</li>
          <li>w twetwetwetwetwe  tew</li>
          <li>ewt wetwetwetwet wt</li>
          <li>w twtwetwt</li>
          <li>w wtetwetwetwtwtwtwtwetwtet</li>
      </ul>
      </div>
  </div>
  </div>
</div>
<br>
</form>
</body>
</html>