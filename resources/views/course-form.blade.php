@include('layout.header')
@include('layout.adminheader')

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">

<style>
.tree { background-color:#2C3E50; color:#46CFB0;}
.tree li,
.tree li > a,
.tree li > span {
    padding: 4pt;
    border-radius: 4px;
}

.tree li a {
   color:#46CFB0;
    text-decoration: none;
    line-height: 20pt;
    border-radius: 4px;
}

.tree li a:hover {
    background-color: #34BC9D;
    color: #fff;
}

.active {
    background-color: #34495E;
    color: white;
}

.active a {
    color: #fff;
}

.tree li a.active:hover {
    background-color: #34BC9D;
}
/*.wrapper {
    text-align: center;
}*/
.mutliSelect li{ list-style: none; color:#46CFB0;}
/*input{
    font-family: monospace;
}*/
.nav-tabs.nav-justified>.active>a {background:#ff0000 !important; font-weight:normal; color:#fff !important;}
 .pad {padding:10px; background:#efe7e7; border:1px solid #f1f1f1;}
 body {font-size:12px; background:#f8f8f8;}
 .box-shadow:1px 1px 3px 1px #666;
</style>



                         <div class="container">
                          <div class="row">
                        <center>
                        <h1 class="loan-head">Course Module</h1>
                       <!--  <h3><p class="sub-title" >Where teaching is made easy..!! </p></h3> -->
                      </center>
                      
                      <div class="col-md-4">
                        
                        
                      </div>
                            <div class="col-md-8 box-shadow ">
                            
                            <div class="row text-left pad">
                                 <form class="" id="course_form" name="course_form" enctype="multipart/form-data" role="form" method="POST" >
                                 {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group">
                                    
                                   <div class="col-md-6">
                                    <fieldset>
                                      <label>Course Name:</label><input type="text" class="newsletter-name" name="course_name" id="course_name" placeholder="Course Name"  onkeypress="return AllowAlphabet(event)" required>
                                    </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                    <fieldset>
                                      <label>Course ID:</label><input type="text" class="newsletter-name" name="course_id" id="course_id" placeholder="Course ID"   required>
                                      <div id="course" style="display:none;color: red; font-size: 10px">Please Enter Valid Course ID.</div>
                                    </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                     <fieldset>
                                     <label>Course Type:</label>
                                          <select class="form-control block drop-arr select-sty" name="course_type" id="course_type"  required>
                                            <option value="">Course Type</option>
                                            <option value="single_file">Single File</option>
                                            <option value="audio">Audio</option>
                                            <option value="video">Video</option>
                                            <option value="scorm">Scorm</option>
                                              
                                          </select>
                                        </fieldset> 
                                        </div>

                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Course Category:</label><select class="newsletter-name" name="course_category" id="course_category" required>
                                           <option disabled selected value=""></option>
                                        </select>
                                        </fieldset>
                                        </div>

                                        
                                         
                                        <div class="col-md-6">
                                        <fieldset><!-- <input type="hidden" name="duration" id="duration"> -->
                                        <label>Duration (in minutes):</label><input type="text" class="newsletter-name" name="duration" id="duration" placeholder="Duration" required>
                                        </fieldset>
                                        </div>

                                        




                                        
                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Start Date:</label><input type="text" class="newsletter-name " name="start_date" id="start_date" placeholder="Start Date" required>
                                        </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>End Date:</label><input type="text" class="newsletter-name " name="end_date" id="end_date" placeholder="End Date" required>
                                        </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Version:</label><input type="text" class="newsletter-name" name="version" id="version" placeholder="Version" required>
                                        </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Level:</label>
                                          <select class="form-control block drop-arr select-sty" name="level" id="level"  required>
                                            <option value="">Level</option>
                                            <option value="basic">Basic</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                        </fieldset> 
                                        </div>

                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Package:</label><input  type="file" name="package" id="package" class="pull-right" required/>
                                        </fieldset>
                                        </div>

                                        <div class="col-md-8">
                                        <fieldset>
                                          <label>Active:</label><input type="radio" id="yes" value="1" name="active"  /> Yes <input type="radio" id="no" value="0" name="active"/>No
                                        </fieldset>                 
                                        </div>

                                         <div class="col-md-8">
                                        <fieldset>
                                          <label>Manager Nomination:</label><input type="radio" id="yes" value="1" name="manager_nomination"/> Yes <input type="radio" id="no" value="0" name="manager_nomination"/>No
                                        </fieldset>                 
                                        </div>


                                        <div class="col-md-6">
                                        <fieldset>
                                        <label>Course Topic:</label>
                                        </fieldset><input type="hidden" name="course_topic" id="course_topic">
                                        <ul class="tree"></ul>
                                        
                                        </div>

                                        <div class="col-md-6">
                                        <label>Company List:</label>
                                        <fieldset style="background-color:#2C3E50;">
                                         
                                        <dl class="dropdown"> 
                                        <dt>
                                        <a href="javascript:void(0)">
                                              
                                          
                                        </a>
                                        </dt>
                                        <dd>
                                          <div class="mutliSelect">
                                         
                                            <ul class="company"></ul>
                                          </div>
                                        </dd>
                                          
                                        </dl>
                                        </fieldset>
                                        </div>

                                        </div>
                                    <hr>
                                </div>
                                <div style="text-align: center;">
                                <a class="btn btn-primery btn-outline with-arrow mrg-top" id="course_submission">Submit</a></div>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                             
</br>


<div class="modal fade" tabindex="-1" role="dialog" id="courseform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation Status</h4>
      </div>
      <div class="modal-body">
        <h4><p id="modalerr"><h5 style="color: black"><b>Added Successfully</b>.<h5></p></h4>
        
      </div>
      
      
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="course_form_error">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Error Status</h4>
      </div>
      <div class="modal-body">
       <h4><p id="modalerr"><h5 style="color: black"><b>Couldn't Add. Kindly, Try Again</b>.<h5></p></h4>
        
      </div>
      
      
    </div>
  </div>
</div>

<script type="text/javascript">
  function AllowAlphabet(e)
{
  isIE = document.all ? 1 : 0
  keyEntry = !isIE ? e.which : event.keyCode;
  if (((keyEntry >= '65') && (keyEntry <= '90')) || ((keyEntry >= '97') && (keyEntry <= '122')) || (keyEntry == '46') || (keyEntry == '32') || keyEntry == '45')
     return true;
  else
{
    // alert('Please Enter Only Character values.');
    return false;
      }
}
</script>

<!-- <script type="text/javascript">
    var d = new Date();
    var year = d.getFullYear() ;
    d.setFullYear(year);

    $(".lastReporteddob").datepicker({ dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      maxDate: year,
      minDate: "-100Y",
      yearRange: '-100:' + year + '',
      defaultDate: d
    });
</script> -->
<script type="text/javascript">
$(document).ready(function(){
    $("#start_date").datepicker({ dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: "+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#end_date").datepicker("option","minDate", selected)
        }
    });
    $("#end_date").datepicker({ dateFormat: "yy-mm-dd", 
        minDate: 0,
        maxDate:"+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#start_date").datepicker("option","maxDate", selected)
        }
    });
    });  

    </script>

<script type="text/javascript">
var current_checked_id;
  $('#course_submission').click(function(){
    // var time_period =($('#time_taken').val()*60);
    // console.log(time_period);
    // $('#duration').val(time_period);
       // alert(current_checked_id);
     //   console.log(curr_checked_id);
     var v_token = "{{csrf_token()}}";
     $("#course_topic").val(curr_checked_id);
         if(! $('#course_form').valid())
       {
               // alert('not valid');

        }
        else
        {
          $.ajax({  
         type: "POST",  
         url: "{{URL::to('course-submit')}}",
         data:new FormData($("#course_form")[0]),'_token': v_token,
          dataType:'json',
          async:false,
          type:'POST',
          processData: false,
          contentType: false,
         success: function(msg){

          console.log(msg.data);
          if (msg.data == true) {
              // $('#courseform').modal('show');
              alert('Course Added Successfully')
             } 
             else if(msg.data == false) {
             // $('#course_form_error').modal('show');
             alert('Something Went Wrong (OR) Course ID Alredy Exists In Database');
             }
              
              
        }  
      });   
     }
  });

</script>

<script type="text/javascript">
   $(document).ready(function(){
   //  $(".tree").treemenu({delay:300}).openActive();
       $.ajax({ 
   url: "{{URL::to('course-category')}}",
   method:"GET", 
   success: function(data)  
   {
    var msg=$.parseJSON(data);
      if(msg)
      {      $.each(msg, function( index, value ) {
            $('#course_category').append('<option value='+value.CourseCategoryID+'>'+value.CategoryName+'</option>');

        }); 
    }else{
      $('#course_category').empty().append('No Result Found');
    }
          
   }
  });

     });


</script>

<script type="text/javascript">   
 $.ajax({ 
   url: "{{URL::to('tree')}}",
   method:"GET",
   success: function(datas)  
   {
    var data=$.parseJSON(datas);
    $.each(data, function( index, value ){
    if (value.parent_id!=0) {
       $('#'+value.parent_id).append('<li><input type="checkbox" class="dir_checkbox" name="key[]"  value="'+value.name+'" data-id="'+value.id+'" id="check_'+value.id+'"><a href="javascript:void(0)">'+value.name+'</a><ul id="'+value.id+'"></ul></li>');
    }else{
       $('.tree').append('<li><input type="checkbox" class="dir_checkbox" name="'+value.name+'"  value="'+value.name+'"  id="check_'+value.id+'" data-id="'+value.id+'"><span>'+value.name+'</span><ul id="'+value.id+'"></ul></li>');
    }
    });
   },


 });
</script>

<script src="js/jquery.treemenu.js"></script>
<script>
$(function(){
        $(".tree").treemenu({delay:300}).openActive();
    });

var prv_cheked;
var curr_checked_id;
  $('.dir_checkbox').click(function(){
    // alert('okae');


     if(prv_cheked){
      // console.log('okae');
      $('#'+prv_cheked).attr('checked', false);
     }
     curr_checked_id=$(this).attr('data-id');
     
     prv_cheked=$(this).attr('id');

    
  });


  
</script>




<script type="text/javascript">   

 $.ajax({ 
   url: "{{URL::to('company')}}",
   method:"GET",
   success: function(datas)  
   {
   var data=$.parseJSON(datas);
   // console.log(data);
   if(data)
      {      $.each(data, function( index, value ) {
            $('.company').append('<li><input type="checkbox" class="company_list"  name="company_name[]" value="'+value.company_id+'" data-id="'+value.company_id+'" /><span style="padding:4pt">'+value.company_name+'</span></li>');

        }); 
    }else{
      $('.company').empty().append('No Result Found');
    }

   },

 });

 
</script>
<script type="text/javascript">

var current_checked;
 $(document).on('click', '.company_list', function()
{
     // alert('okae');
     if(current_checked)current_checked+=',';
     else current_checked='';
     current_checked+=$(this).attr('data-id');
      
});
</script>








