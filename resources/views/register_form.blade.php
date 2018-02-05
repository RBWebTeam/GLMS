<!DOCTYPE html>
<html class="no-js"> 
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"> -->
    <title><?php if(isset($title))echo $title; else echo "RupeeBoss-Apply for a Loan";  ?></title>
    <!-- <meta name="google-signin-client_id" content="752185558821-9vlmac53np7bgdo3kn9d2e5ft39t7gud.apps.googleusercontent.com"> -->
    <meta name="msvalidate.01" content="3744048BDD61F7FE6837BD664522C8F9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if(isset($description))echo $description; else echo "RupeeBoss provides all kind of loans."; ?>" />
    <meta name="keywords" content="<?php if(isset($keywords))echo $keywords; else echo "rupeeboss loans getloan expressloan"; ?>" />
    <meta name="p:domain_verify" content="05d8ec5b6a704fa5b78abd5f636fdc24"/>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{URL::to('images/rb_fav.png')}}">
    <!-- <link rel="stylesheet" href="{{URL::to('fonts/Raleway.css')}}" type="text/css"> -->
    <!-- Animate.css -->

    <link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>






 <link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 

    <!-- Modernizr JS -->
    <!-- <link rel="manifest" href="{{URL::to('extension/manifest.json')}}"> -->
    @if( request()->url() == url('/') )
     <link rel="canonical" href="https://www.rupeeboss.com/" />
    @else
         <link rel="canonical" href="{!! request()->fullUrl() !!}"  />
    @endif
    
    
<meta name="google-site-verification" content="WX6V_57BIW9ttEdt8-lFFx9AWksmU0OzrSB8CqEW084" />
<script type="application/ld+json">
 { 
 "@context" : "http://schema.org",
 "@type" : "Organization",
 "name" : "Rupeeboss Financial Services Pvt Ltd",
 "url" : "http://www.rupeeboss.com/",
 "logo": "http://www.rupeeboss.com/images/logo.png",
 "email": "wecare@rupeeboss.com",
 "telephone": "1800-267-629-6",
 "sameAs" : [ 
 "https://www.facebook.com/rupeeboss",
 "https://www.linkedin.com/company/rupeeboss.com",
 "https://plus.google.com/113191059621763008376",
 "https://twitter.com/rupeeboss",
 "https://www.instagram.com/rupeeboss/"
 ]
 }

 </script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- BS JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 
    <body>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {float:left;width:50%}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.wrapper {
    text-align: center;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>

<body>

<h2 style="text-align: center;">Modal Signup Form</h2>
<div class="wrapper">
<a class="btn btn-info btn-outline with-arrow mrg-top" id="sign_up">SIGN UP <i class="icon-arrow-right"></i></a></div>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body">
          <form name="sign_up_form" id="sign_up_form" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="form" value="sign_up_form">
                  <div>
                    <fieldset>
                      <label>First Name:</label><input type="text" class="newsletter-name" name="first_name" id="first_name" placeholder="First Name" required>
                    </fieldset>
                    </div>
                    <div>
                    <fieldset>
                      <label>Last Name:</label><input type="text" class="newsletter-name" name="last_name" id="last_name" placeholder="Last Name" required>
                    </fieldset>
                    </div>
                  <div>
                    <fieldset>
                      <label>Email:</label><input type="text" class="newsletter-name" name="email" id="email"
                      oninput="mail('email')"  required  placeholder="Email address">
                      <div id="personal_mail" style="display:none;color: red; font-size: 10px">Please Enter Valid Email Id.</div>
                    </fieldset>                 
                    </div>
                    <div>
                    <fieldset>
                      <label>Password:</label><input type="text" class="newsletter-name" name="password" id="password"  required  placeholder="Password">
                    </fieldset>                 
                    </div>
                    <div>
                    <fieldset>
                      <label>Confirm Password:</label><input type="text" class="newsletter-name" name="confirm_password" id="confirm_password"  required  placeholder="Confirm Password">
                    </fieldset>                 
                    </div>
                    <div>
                    <fieldset>
                      <label>Gender:</label><input type="radio" id="male" value="M" name="gender"  /> Male <input type="radio" id="female" value="F" name="gender"/>Female
                    </fieldset>                 
                    </div>
                  <div class="wrapper">
                      <a class="btn btn-info btn-outline with-arrow mrg-top" id="register">Register<i class="icon-arrow-right"></i></a>
                  </div>
            </form>
            
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default close1" data-dismiss="modal">Close</a>
        </div>
      </div>
      
    </div>
  </div>

</body>



<script type="text/javascript">
  $('#sign_up').click(function(){
   // alert('hiee');
   $('#myModal2').modal('show');
  });
</script>

<script type="text/javascript">
  function mail(obj,val){
     console.log(val);
    if(obj=='email' ){
                   var str =$('#email').val();
                   var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
                   var res = str.match(emailPattern);
                   if(res){
                     // alert('Email valid one.!!');
                       $('#personal_mail').hide();

                  }else{
                     //alert('Oops.Please Enter Valid Email.!!');
                     $('#personal_mail').show();

                    return false;
                  }
                  
  }
}
</script>

<script type="text/javascript">
  $('#register').click(function(){
    if($('input[name=gender]:checked').length<=0)
     {
         alert("No radio checked")
         return false;
     }
     if(! $('#sign_up_form').valid())
       {
               alert('not valid');
        }
        else
        {
          
        $.ajax({  
         type: "POST",  
         url: "{{URL::to('register')}}",
         data : $('#sign_up_form').serialize(),
         success: function(msg){
            console.log(msg);
         
              if (msg.data==true){
            window.location.reload(); // This is not jQuery but simple plain ol' JS
            }   
              
        }  
      });   
     }

  });
</script>

