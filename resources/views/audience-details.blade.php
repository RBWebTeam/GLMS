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



<div class="container" id="fh5co-hero">
</div>
<div class="fh5co-contact animate-box">
                         <div class="container">
                          <div class="row">
                        <center>
                        <h1 style="padding:0px;background:#d9534f;color:#fff;margin-bottom:0px;" class="loan-head">Audience To User</h1>
                       
                      </center><br>
                      
                      <div class="col-md-4"></div>
                            <div class="col-md-8 box-shadow white-bg">
                            
                            <div class="row text-left comp-pg rate">
                                 <form class="" id="user_form" name="user_form" role="form" method="POST" >
                                 {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group">
                                    <div class="col-md-6">
                                     <fieldset>
                                     <label style="font-family: cursive">Audience:</label>
                                          <select class="form-control block drop-arr select-sty" name="audience" id="audience" required>
                                          <option disabled selected value=""></option>
                                            @foreach ($audience as $value)
                                              <option  value="{{$value->id}}">{{$value->audiancename}}</option>
                                            @endforeach
                                          </select>
                                        </fieldset> 
                                        </div>
                                        
                                        <!-- <div class="col-md-6">
                                        <fieldset>
                                     <label style="font-family: cursive">Users:</label>
                                          <select class="form-control block drop-arr select-sty" name="users[]" id="users" size="users" multiple="multiple">
                                             <option disabled selected value=""></option>
                                            </select>

                                        </fieldset>
                                        </div> --> 
                                        <div class="col-md-6">
                                        <label>Users:</label>
                                        <fieldset style="background-color:#2C3E50;">
                                         
                                        <dl class="dropdown"> 
                                        <dt>
                                        <a href="javascript:void(0)">
                                              
                                          
                                        </a>
                                        </dt>
                                        <dd>
                                          <div class="mutliSelect">
                                         
                                            <ul class="users">
                                              @foreach ($user as $value)
                                              <li><input type="checkbox" class="user"  name="users[]" value="{{$value->id}}" data-id="{{$value->id}}" /><span style="padding:4pt">{{$value->name}}</span></li>
                                            @endforeach
                                              
                                            </ul>
                                          </div>
                                        </dd>
                                          
                                        </dl>
                                        </fieldset>
                                        </div>
                                       <!--  <input type="text" name="user_details[]" id="user_details"> -->
                                        </div>

                                      </div>
                                    <hr>
                                    <div style="text-align: center;">
                                <a  style="font-family: cursive" class="btn btn-primery btn-outline with-arrow mrg-top" id="submit">Submit</a></div>
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
         url: "{{URL::to('user_submission')}}",
         data : $('#user_form').serialize(),
         success: function(msg){
          console.log(msg);
            if (msg.status==0) {
             alert('Audience Successfully Mapped With User');
            } else {
             alert('Something Went Wrong');
            }
        }  
      }); 
  });
</script>

<script type="text/javascript">

var current_checked;
 $(document).on('click', '.user', function()
{
     // alert('okae');
     if(current_checked)current_checked+=',';
     else current_checked='';
     current_checked+=$(this).attr('value');
      // alert(current_checked);
     // $('#company_name').val(current_checked);
});
</script>

