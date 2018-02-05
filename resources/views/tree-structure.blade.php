@include('layout.header')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




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
</style>
<link src="css/jquerysctipttop.css" rel="stylesheet" type="text/css">

</head>

<body>
<ul class="tree"></ul>
<form id="add_form" name="add_form" method="POST">
{{ csrf_field() }}
<input type="text" name="name" id="name">
<input type="hidden" name="courseid" id="courseid">
                      <a class="btn btn-danger btn-outline with-arrow mrg-top" id="add">ADD<i class="icon-arrow-right"></i></a>
              </form>    

</body>
</html>
 




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


     if(prv_cheked){
      $('#'+prv_cheked).attr('checked', false);
     }
     curr_checked_id=$(this).attr('data-id');
     
     prv_cheked=$(this).attr('id');

    
  });
</script>
<script type="text/javascript">
  $('#add').click(function(){
    $("#courseid").val(curr_checked_id);
   // alert(curr_checked_id);
  $.ajax({  
         type: "POST",  
         url: "{{URL::to('add-tree')}}",
         data : $('#add_form').serialize(),
         success: function(msg){
            console.log(msg);
            if (msg == 'true') {
              window.location.reload();
             alert('Added Successfully');
            }else{
               alert('Couldnt Add. Error In Adding');
            }
         }  
      });   
     
  });
</script>