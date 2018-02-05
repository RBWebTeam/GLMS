@include('layout.header_user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
<style type="text/css">
  .fa-download{
    content: "\f019";
}
</style>





<style>
.nav-tabs.nav-justified>.active>a {background:#ff0000 !important; font-weight:normal; color:#fff !important;}
 .pad {padding:10px; background:#efe7e7; border:1px solid #f1f1f1;}
 body {font-size:12px; background:#f8f8f8;}
 .box-shadow:1px 1px 3px 1px #666;
 .tree { background-color:#666; color:#46CFB0;}
.tree li,
.tree li > a,
.tree li > span {
    padding: 4pt;
    border-radius: 4px;
}

.tree li a {
   color:#666;
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
    background-color: #666;
}

</style>



  <td><ul class="tree"></ul><td>


<script type="text/javascript">   
 $.ajax({ 
   url: "{{URL::to('tree')}}",
   method:"GET",
   success: function(datas)  
   {
    var data=$.parseJSON(datas);
    console.log(data);
    $.each(data, function( index, value ){
    if (value.parent_id!=0) {

      if(value.CourseCount > 0){
            $('#'+value.parent_id).append('<li><a class="hasCourse" id="'+value.id+'" href="javascript:void(0)">'+value.name+'</a><div id="div_'+value.id+'"></div><ul id="'+value.id+'"></ul></li>');
      }
      else{
        $('#'+value.parent_id).append('<li><a href="javascript:void(0)">'+value.name+'</a><ul id="'+value.id+'"></ul></li>');
      }
       
      }      
    else{
       $('.tree').append('<li><span>'+value.name+'</span><ul id="'+value.id+'"></ul></li>');
    }
    });

     $('.hasCourse').click(function(){
      var topicId= $(this).attr('id');
      
    $.ajax({ 
   url: "{{URL::to('tree-topic')}}",
   method:"GET",
   data : { 'topicId': topicId},
   success: function(datas)  
   {
   var msg=$.parseJSON(datas);
    console.log(msg);
      var rows = "";
   
                      $.each(msg, function( index, value ) {
                      param='id='+ value.CoursePackage +'&&CourseName='+value.CourseName;
                      rows += '<tr><td><a target="_blank" href="course-details?CourseID='+ value.ID +'">' + value.CourseName + '</a></td><td><img   width="15" height="15" src="images/'+ value.StatusImage +'"/>' + value.CourseStatus + '</td><td>' + value.Duration + '</td><td><a href=javascript:void(0)>Launch</a></td><td>' + value.TimeSpend + '</td><td><a class="download" href="download?'+param+'"><img  src="images/download.png" align="middle" width="15" height="15"></a></td></tr>';
        }); 
                         
                         if(msg){
                            $("#div_"+topicId).empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td><b>Course Name</b></td><td><b>Course Status</b></td><td><b>Duration</b></td><td><b>Assessment</b></td><td><b>Time Spend</b></td><td><b>Download</b></td></tr><tr>'+rows+'</tr></table>');
                         }else{
                            $("#div_"+topicId).empty().append('No Result Found');
                         }
                         $("#div_"+topicId).toggle();
   },

 });
    });
   },

 });





</script>



</script>
<script src="js/jquery.treemenu.js"></script>
<script>
$(function(){
        $(".tree").treemenu({delay:300}).openActive();
    });
var prv_cheked;
var curr_checked_id;
  $('.dir_checkbox').click(function(){


     if(prv_cheked){
      $('#'+prv_cheked).attr('checked', false);
     }
     curr_checked_id=$(this).attr('data-id');
     
     prv_cheked=$(this).attr('id');

    
  });
</script>


