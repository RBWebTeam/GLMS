
 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<style>
#fh5co-hero {
    padding: 4em 0;
    margin-top: -50px;
   }
background-attachment:fixed;
  background-size:cover;
}
.register {opacity:0.8;}

.register-left {
    background: #ed1c24;
    height: 400px;
    padding: 38px 0px;
}
.register-left p {color:#ff9599;}
.register-right {
    background: #FFFFFF;
   height:400px;
}
.register-in {
    padding:1.5em;
  padding-top:0px;
}
.register-left, .register-right {
   
  /*  float: left; */
}
.register-left p {
    margin: 2em 0;
    line-height: 1.8em;
    font-size: 1em;
    letter-spacing: 1px;
}
.register-left h1 {
    font-size: 2.5em;
    text-transform: uppercase;
    font-weight: 400;
  text-align:left;
    margin-bottom:12px;
    color: #FFFFFF;

}
.register-left h2 {
  
  color:#ff9599;
}
.register-right h2 {
    text-transform: uppercase;
    font-size: 2em;
    font-weight: 700;
    text-align: center;
    letter-spacing: 1px;
    word-spacing: 5px;
}
.link a {
    color: #FFFFFF;
    padding: .5em;
    font-size: 1.5em;
    border:2px solid #fb7b80;
}
.checkbox a {
    color: #009688;
}
.link a:hover{
  color:#000;
    border:2px solid #FFFFFF;
  background:none;
}
.register-form{
  margin:2em 0 0 0;
}
.register-form h4,.address h4{
    margin-bottom: 2em;
    color: #404040;
    margin: 0 0 2em 0;
    font-weight: 600;
}
 .register input[type="text"],.register input[type="email"],.register input[type="password"],.register input[type="tel"],.register select{
    font-size: 1em;
    color: #8c8c8c;
    padding: 0.5em 1em;
    border: 0;
    width:100%;
    border-bottom: 1px solid #dcdcdc;
    background: none;
    -webkit-appearance: none;
  outline: none;
}
input[type="checkbox"] {
    cursor: pointer;
}
.register textarea { 
  min-height: 150px;
    resize: none;
}
/*-- input-effect --*/
.styled-input.agile-styled-input-top {
    margin-top: 0;
} 
.styled-input input:focus ~ label, .styled-input input:valid ~ label,.styled-input textarea:focus ~ label ,.styled-input textarea:valid ~ label{
    font-size: .9em;
    color: #333333;
    top: -1.3em;
    -webkit-transition: all 0.125s;
  -moz-transition: all 0.125s; 
  -o-transition: all 0.125s;
  -ms-transition: all 0.125s;
    transition: all 0.125s;
}
.styled-input {
  width: 100%;
    position: relative;
    margin: 0 0 1.2em;
}
.styled-input:nth-child(1),.styled-input:nth-child(3){
  margin-left:0;
}
.textarea-grid{
  float:none !important;
  width:100% !important;
  margin-left:0 !important;
}
.styled-input label {
  color: #8c8c8c;
    padding: 0.5em .9em;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    pointer-events: none;
    font-weight: 400;
    font-size: .9em;
    display: block;
    line-height: 1em;
}
.styled-input input ~ span,.styled-input textarea ~ span {
  display: block;
    width: 0;
    height: 2px;
    background: #333;
    position: absolute;
    bottom: 0;
    left: 0;
    -webkit-transition: all 0.125s;
    -moz-transition: all 0.125s;
    transition: all 0.125s;
}
.styled-input textarea ~ span { 
    bottom: 5px; 
}
.styled-input input:focus.styled-input textarea:focus { 
  outline: 0; 
} 
.styled-input input:focus ~ span,.styled-input textarea:focus ~ span {
  width: 100%;
  -webkit-transition: all 0.075s;
  -moz-transition: all 0.075s;  
  transition: all 0.075s; 
} 
/*-- //input-effect --*/
.register-form input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    padding: .3em 1em;
    font-size: 1.4em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: #009688;
    border: 2px solid #009688;
    cursor: pointer;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    transition: 0.5s all;
  font-family: 'Yanone Kaffeesatz', sans-serif;
}
.register-form input[type="submit"]:hover {
    background: #FFFFFF;
  color:#009688;
  border: 2px solid #009688;
}
input[type="text"] {
    width: 100%;
}
/*-- //contact --*/
/*-- copyright --*/
.agile-copyright {
    color: #fff;
    text-align: center;
    font-size: 1em;
    margin: 2em 0 0;
    word-spacing: 5px;
}

.pad-a {padding:5px 0px; border:1px dashed #eee; width:100%;}
.col-md-4 {padding:2px;}

.white-bg {
    background: #fff;
    padding-bottom: 0px;
}

.nav > li > a {
    padding: 17px 7px;
}
.dis-non {display: none;}

/*input{
    font-family: monospace;
}*/

/*-- //copyright --*/


</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('index') }}">HOME</a></li>
      <li class="active"><a href="#">LEARNING</a></li>
       
      <li><a href="#">EVALUATION</a></li>
      <li ><a href="#">CLASSROOM TRAINING</a></li>
    </ul>
    <form class="navbar-form navbar-right">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <a class="btn btn-default" type="submit">
           <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="AdminHome"><b>Switch To Admin</b></a>
    </form>

  </div>
</nav>


<div class="container" id="fh5co-hero">
<section class="register">
  <div  class="register-full">
  <div class="col-md-3"></div>
  <div  class="col-md-6 box-shadow white-bg">
    <div  class="row text-left comp-pg rate">
    <form id="course_details_form" name=" " method="POST" action="course_save">
     {{ csrf_field() }}
    <div class="col-md-12">
      </div>
      <div class="col-md-12">
      <center>
      <h1 style="padding:0px;background:#d9534f;color:#fff;margin-bottom:0px; font-family: cursive" class="loan-head">Course Details</h1>
      </center>
    <div class="register-right col-md-12">
      <div class="register-in">
        <div class="register-form">
          <!-- <form action="#" method="post"> -->
           <?php $CourseID=0; if(isset($_GET['CourseID'])){
               $CourseID=$_GET['CourseID']; 
           } ?>

            <div class="fields-grid">
              <div class="styled-input agile-styled-input-top">
                <input type="text" name="CourseName" id="CourseName" readonly="true"> 
               <input type="text" style="display:none;" name="CourseID" id="CourseID"  value="{{$CourseID}}"> 
                <label><b>Course Name</b></label>
                <span></span>
              </div>
               
              
              <div class="styled-input agile-styled-input-top">
                <input type="text" name="Duration" id="Duration" readonly="true"> 
                <input type="text" style="display:"none"  class="dis-non"/>
                <label><b>Duration (in minutes)</b></label>
                <span></span>
              </div>

              <div class="styled-input agile-styled-input-top">
                <input type="text" name="Status" id="Status" value="Not Started" readonly="true"> 
                <input type="text" style="display:"none" class="dis-non"/>
                <label ><b>Status</b></label>
                <span></span>
              </div>
              <br>
              <a class="btn btn-danger btn-outline with-arrow mrg-top" style="font-family: cursive" id="launch_course">Launch Course<i class="icon-arrow-right"></i></a>
              <div class="clear"> </div>
              
            </div>
            
        
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    </form>
        </div>
      </div>
</div>
</section>
</div>
@include('layout.footer')

<script type="text/javascript">
  $('#launch_course').click(function(){ 
   var v_token = "{{csrf_token()}}";
    var Course_ID=$('#CourseID').val();
    var Course_Status ='Completed';
    var TimeSpend =0;
 $.ajax({ 
   url: "{{URL::to('get-course-status')}}",
   method:"POST",
   data:{'Course_ID':Course_ID,'_token': v_token,'Course_Status':Course_Status,'TimeSpend':TimeSpend},
   success: function(msg)  
   {
    window.location.href =url_pdf;
    
   }

 });

});
</script>

<script type="text/javascript">   
var url_pdf;
 $.ajax({ 
   url: "{{URL::to('details-course')}}",
   method:"GET",
   success: function(msg)  
   {

    data=$.parseJSON(msg)[0];
    console.log(data);
    if (data.CourseType =="single_file") {
    $('#CourseName').val(data.CourseName);
    $('#Duration').val(data.Duration);
    url_pdf=data.CoursePackage;
    } else {
     alert("Not exists");
    }
    
   }

 });

 
</script>
