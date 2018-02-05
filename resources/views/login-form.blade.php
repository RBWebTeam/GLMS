
 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 6px 15px;
    margin: 4px 0;
    font-size:14px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/*button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}*/

button:hover {
    opacity: 0.8;
}

/*.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}*/

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

/*.container {
    padding: 10px;
}*/

span.psw {
    float: right;
    padding-top: 16px;
}


.anchor{
  text-align: center;
}
label {margin:0px;padding:0px;}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}


</style>

<div class="container">
</div>
<div class="fh5co-contact animate-box">
                         <div class="container">
                          <div class="row">

                      
                         <div class="col-md-4"></div>
                            <div class="col-md-4 box-shadow white-bg">

                            
                            <div class="row text-left comp-pg rate">
                             <h1 class="loan-head">Login</h1>
                                 <form class="" id="login_form" name="login_form" role="form" method="POST" >
                                 {{ csrf_field() }}
                                <div class="row">
                                    <label>Username :</label>
                                    <input type="text" placeholder="Username" name="username" required>

                                    <label>Password :</label>
                                    <input type="password" placeholder="Password" name="psw" required>
                                        
                                    <div class="anchor">
                                    <a  style="font-family: cursive" class="btn btn-success btn-outline with-arrow mrg-top" id="login">Login</a></div>
                                    <input type="checkbox" checked="checked"> <b>Remember me</b>
                                     <span class="psw"><a href="javascript:void(0)"><b>Forgot password?</b></a></span>
                                </div>  
                                    <!-- <a  style="font-family: cursive" class="btn btn-success btn-outline with-arrow mrg-top" id="course_submission">Cancel</a> -->
                                   
                                    <div class="anchor">
                                      <a href="javascript:void(0)"><b>FAQ<b></a>
                                      | 
                                      <a href="javascript:void(0)"><b>Privacy Policy</b></a>
                                    </div>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
</br>


<script type="text/javascript">
  $('#login').click(function(){
//alert('hiee');
      if(! $('#login_form').valid())
       {
               alert('not valid');
        }
        else
        {
          
        $.ajax({  
         type: "POST",  
         url: "{{URL::to('login-submit')}}",
         data : $('#login_form').serialize(),
         success: function(msg){
            `
            if(typeof msg === 'string'){
                msg = JSON.parse(msg.replace(/\r?\n|\r/g, ''));
            }
             if (msg.data == 1) {
              window.location.href ="{{URL::to('index')}}";
             } 
             else {
                  alert('Could not fetch you.');
             }
        }  
      });   
     }
  });
</script>
