@include('layout.header')
@include('layout.adminheader')
<style type="text/css">
    .lbl{
        width:110px;
    }
.hide{
            display: none;
        }

#errmsg
{
color: red;
}

input:focus { 
    outline: none !important;
    border-color: #719ECE;
    box-shadow: 0 0 10px #719ECE;
}

</style>
<link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
 var TopicId=0;
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
        $('#'+data[i].parent_id).append('<li id="'+data[i].id+'"><input type="radio" class="radioTopic" onClick="radioButtonClicked('+data[i].id+')" name="topictype" id="'+data[i].id+'"><span>'+data[i].name+'</span></li>');
    }
    
     }else{
        $('.navtree').append('<li><label class="tree-toggler nav-header">'+data[i].name+'</label><ul class="nav nav-list tree hide" id="'+data[i].id+'"></ul></li><li class="divider"></li>');
     }
}
$('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
        $(this).parent().children('ul.tree').removeClass('hide');
    });
   },
 });

    $("#txtnoofqustion,#txtduration,#txtpassing,#txtnoofatempts").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
         $(this).closest('td').find('span').text("Digits Only").show().fadeOut("slow");
         return false;
    }
   });
});

function radioButtonClicked(id){
     document.getElementById('hdntopicid').value =id;
}

function addAssessment(){
    console.log($('#user_form').serialize());
     $.ajax({ 
   url: "{{URL::to('add-assessment-detail')}}",
   method:"POST",
   data: $('#user_form').serialize(),
   success: function(msg)  
   {
    console.log(msg);
   }

 });
}
function Validate()
{
    var topictype =document.user_form.topictype
    var noofqustion = document.user_form.noofqustion;
    var duration = document.user_form.Duration;
    var startdate = document.user_form.startdate;
    var enddate = document.user_form.enddate;
    var Assessmentname = document.user_form.Assessmentname;
    var passing = document.user_form.passing;
    var check = document.user_form.check;
    var noofatempts = document.user_form.noofatempts;
    var markcal = document.user_form.markcal;
    var checkcourse = document.user_form.checkcourse;
    

    if (topictype.value =="")
    {
        window.alert("Please provide Topic Type.");
        //topictype.focus();
        
    }
     else if (noofqustion.value == "")
    {
        window.alert("Please provide a No of qustion.");
        noofqustion.focus();
        
    }
    else if (duration.value == "")
    {
        window.alert("Please provide Duration.");
        duration.focus();
       
    }
    else if (startdate.value == "")
    {
        window.alert("Please provide Start Date.");
       startdate.focus();
       
    }
    else if (enddate.value == "")
    {
        window.alert("Please provide End Date.");
       enddate.focus();
        
    }
   
    else if (Assessmentname.value == "")
    {
        window.alert("Please enter Assessment  Name.");
        Assessmentname.focus();
        
    }
    else if (passing.value == "")
    {
        window.alert("Please provide Passing(%).");
        passing.focus();
       
    }
    else if (noofatempts.value == "")
    {
        window.alert("Please provide No of Atempts.");
        noofatempts.focus();
        
    }
  
    else if (markcal.selectedIndex < 1)
    {
        alert("Please Provide Mark calculation Type.");
       markcal.focus();
        
    }
    else{
            addAssessment();
    }
 }

 function comparedate()
{
    var startDt = document.getElementById("txtstartdate").value;
    var endDt = document.getElementById("txtenddate").value;
    if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
    {
        alert("Please provide Valid Date")
        document.getElementById("txtenddate").value="";
    }
}

</script>
<form class="" id="user_form" name="user_form" role="form" method="post">
                               <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                               
<input type="hidden" id="hdntopicid" name="hdntopicid">
<div class="col-md-9">
  <h3>Assessment</h3>
  <hr>
<div id="divaddAssessment" style="max-width:100%;">
    <table>
        <tr>
            <td ></td>
    
    <table>
        <tr>
        <tr style="height: 39px;">
        <td>
            <label for="Topic" class="lbl" id="txtlabel"> Topic: </label>
            <div class="well" style="width:300px; padding: 8px 0;float: left;">
        <div style="overflow-y: scroll; overflow-x: hidden; height: 200px;" id="maindiv">
        <ul class="nav nav-list navtree">
        </ul>
    </div>
</div>
        </td>
       </tr>
        <tr style="height: 39px;">
        <td>
            <label for="noofqustion" class="lbl" id="lblnoofqustion"> No. Of Qustion:</label>
            <input type="text" name="noofqustion" id="txtnoofqustion" class="txt" required="YES"><span id="errmsg"></span>
        </td>
        <td>
            <label for="duration" class="lbl" id="lblduration"> Duration:</label>
            <input type="text" name="Duration" id="txtduration" class="txt" required="YES"><span id="errmsg"></span>
        </td>
         </tr>
         <tr style="height: 39px;">
        <td>
            <label for="startdate" class="lbl" id="lblstartdate"> Start Date:</label>
            <input type="Date" name="startdate" id="txtstartdate" class="txt" required="YES">
        </td>
        <td>
            <label for="enddate" class="lbl" id="lblenddate"> End Date:</label>
            <input type="Date" name="enddate" id="txtenddate" class="txt" onblur="comparedate();" required="YES">
        </td>
         </tr>
         <tr style="height: 39px;">
            <td>
             <label for="Assessmentname" class="lbl" id="lblassessmentname">Assessment Name: </label>
             <input type="text" name="Assessmentname" id="txtassessmentname" class="txt" required="YES">
            </td>
            <td>
                <label for="passing" class="lbl" id="lblpassing"> Passing(%):</label>
                <input type="text" name="passing" id="txtpassing" required="YES"><span id="errmsg"></span>
            </td>
         </tr>
        <tr style="height: 39px;">
            <td>
            <label for="randomqustion" class="lbl" id="lblrandomqustion"> Random Qustion:</label>
             YES:
            <input type="radio" checked="checked" name="check" value="1" id="randomqustionyes" >
             NO:
            <input type="radio" name="check" id="randomqustionno" value="0">
            </td>
        </tr>
        <tr style="height: 39px;"> 
            <td>
                <label for="noofatempts" id="lblnoofatempts" class="lbl"> No. OF Atempts: </label>
                <input type="text" name="noofatempts" id="txtnoofatempts" class="txt" required="YES"><span id="errmsg"></span>
            </td>
            <td>
                <label for="markcal" id="lblmarkcal" class="lbl"> Mark calculation: </label>
                 <select name="markcal" class="ddl" id="ddlcourse" style="width: 100px;" required="YES">
                 <option value="0">---Select---</option>
                 <option value="1">Average</option>
                 <option value="3">Last Attempt</option>
                 <option value="4">Highest Score</option>

                 </select>
            </td>
        </tr>
        <tr style="height: 39px;">
            <td>
            <label for="linkcourse" class="lbl" id="lbllinkcourse"> Link Course:</label>
             YES:
            <input type="radio" name="checkcourse" value="1" id="linkcourseyes">
             NO:
            <input type="radio" name="checkcourse" value="0" id="linkcourseno" checked="checked">

            <div id='show-me' style='display:none'>
                 <br>
                 <label>Course Name:</label>
                <select id='coursemasster' name="course_name_id">
                   <option value="0">---Select---</option>
                    @foreach($coursemaster as $item)
                        <option value="{{ $item->ID }}">{{ $item->CourseName }}</option>
                    @endforeach
                </select><br>
                
                <label>Course Type:</label>
                <select id='selectprepost' name="course_assement_type">
                    <option value="0">---Select---</option>
                    <option value="1">Pre</option>
                    <option value="2">Post</option>
                    <option value="3">Both</option>
                </select>
                
            </div>


             <!--<select name="course" class="ddl" id="ddlcourse" style="width: 100px; display: none;">
            <option value="">course Name</option>
           </select>
           <select name="course" class="ddl" id="ddlcourse" style="width: 100px; display: none;" required="YES">
            <option value="">pre post both</option>
           </select>-->
            </td>
           </tr>
           <tr style="height: 39px;">
            <td>
            <label for="passfeedback" class="lbl" id="lblpassfeedback">Pass Feedback:</label>
            <textarea  type="textarea" name="passfeedback" id="txtpassfeedback">
            </textarea>
            </td>
            <td>
            <label for="failfeedback" class="lbl" id="lblfailfeedback">Fail Feedback:</label>
            <textarea  name="failfeedback" id="txtfailfeedback">
            </textarea>
            </td>
        </tr>
       <tr style="height: 39px;">
        <td align="center">
            <a class="btn btn-primary" id="btnsave" onclick="Validate();">Save</a>
        <!-- <input type="submit" name="save" class="btn btn-primery" id="btnsave" onclick="Validate();" > -->
            <input type="reset" class="btn btn-primary" value="Reset">
            <a class="btn btn-primary" href='{{url("edit-assessment-details")}}'>Cancel</a>
       </td>
       </tr>

        </tr>
    </table>
        </tr>
    </table>
</div>
</div>
</form>
<script>
$('input[name=checkcourse]').click(function ()
{
    if (this.id == "linkcourseyes") 
    {
        $("#show-me").show('slow');
    }
    else
    {
         $("#show-me").hide('slow');
     }
});
</script>