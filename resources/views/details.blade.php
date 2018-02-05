@include('layout.header')
@include('layout.adminheader')

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


<style>
.mutliSelect li{ list-style: none; color:#46CFB0;}
</style>

<div class="container">
</div>
<div class="fh5co-contact animate-box">
                         <div class="container">
                          <div class="row">
                        <center>
                        
                       
                      </center><br>
                      
                      <div class="col-md-3"></div>
                            <div class="col-md-8 box-shadow">
                            <!--  <h1 style="padding:0px;background:#d9534f;color:#fff;margin-bottom:0px;">Module</h1> -->
                            <div class="row text-left white-bg pad1 rate">
                                 <form class="" id="details_form" name="details_form" role="form" method="POST" >
                                 {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group">
                                    <div class="col-md-6">
                                        <fieldset>
                                     <label style="font-family: cursive">Audience:</label>
                                          <select class="form-control block drop-arr select-sty audience" name="audience[]" id="audience" multiple="multiple">
                                             <option disabled selected value=""></option>
                                            @foreach ($audience as $value)
                                              <option  value="{{$value->id}}">{{$value->audiancename}}</option>
                                            @endforeach
                                            </select>

                                        </fieldset>
                                        </div> 
                                        
                                        <div class="col-md-6">
                                        <fieldset>
                                     <label style="font-family: cursive">Course Name:</label>
                                          <select class="form-control block drop-arr select-sty course_name" name="coursename[]" id="coursename" multiple="multiple">
                                             <option disabled selected value=""></option>
                                            @foreach ($coursename as $value)
                                              <option  value="{{$value->ID}}">{{$value->CourseName}}</option>
                                            @endforeach
                                            </select>

                                        </fieldset>
                                        </div>
                                       
                                        </div>
                                        </div>
                                        <div style="text-align: center;">
                                          <a  style="font-family: cursive" class="btn btn-primery btn-outline with-arrow mrg-top" id="submit">Submit</a></div>
                                      </div>

                                    <hr>
                                    
                                </div>
                                
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
</br>



<script type="text/javascript">
  $('#submit').click(function(){
        $.ajax({  
         type: "POST",  
         url: "{{URL::to('submission')}}",
         data : $('#details_form').serialize(),
         success: function(msg){
            console.log(msg);
            if (msg.status==0) {
             alert('Audience Successfully Mapped With Course');
            } else {
             alert('Something Went Wrong');
            }
        }  
      }); 
  });
</script>

<script type="text/javascript">

var current_checked;
 $(document).on('click', '.audience', function()
{
     // alert('okae');
     if(current_checked)current_checked+=',';
     else current_checked='';
     current_checked+=$(this).attr('value');
      
});
</script>

<script type="text/javascript">

var curr_checked;
 $(document).on('click', '.course_name', function()
{
     // alert('okae');
     if(curr_checked)curr_checked+=',';
     else curr_checked='';
     curr_checked+=$(this).attr('value');
      
});
</script>

