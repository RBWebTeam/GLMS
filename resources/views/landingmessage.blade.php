<!DOCTYPE html>
<html>
<head>
    <title></title>

<!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">

    @import url('https://fonts.googleapis.com/css?family=Titillium+Web:300,700,900');
@import url('https://fonts.googleapis.com/css?family=Palanquin:300');
@import url('https://afeld.github.io/emoji-css/emoji.css');


.buttonnext{
    /*height: 6px;*/
    position: absolute;
    bottom: 0;
    right: 0;
    text-decoration: none !important;
}

.buttonnext:hover{
    color: white !important;
}
.buttonprevious:hover{
    color: white !important;
}

.buttonprevious{
    /*height: 6px;*/
    position: absolute;
    bottom: 0;
    left : 0;
    text-decoration: none !important;
}

body {
    /*height: 100vh;*/
    width: 100%;
    margin: 0;
    font-family: 'Palanquin', sans-serif;
    font-size: 21px;
    color: #8f959a;
    line-height: 1.5;
    /*background: linear-gradient(0deg, #6a11cb 0%, #2575fc 100%);*/
    background: #1190b3;
}

.container {
    margin: 2em auto;
    width: 100% !important;
}

img{
/*height: 500px;*/
width: 700px;
margin: 0 auto;
display: block;
}
.inner-container {
    position: relative;
    /*max-width: 20%;*/
    min-width: 360px;
    height: 300px;
    width: 100%;
    margin: 0 auto;
}

.content {
    position: absolute;
    opacity: 0;
    top: 2em;
    left: 2%;
    width: 95%;
    margin: 0 auto;
}

.active {
    display: block !important;
    /*margin: 0 auto;*/
    margin: -40px 0 0 auto;
    opacity: 1;
    transition: ease-in-out 1s;
}

.progress-container {
        background: rgba(#2575fc, 0.2);
        height: 6px;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        border-radius: 0 0 5px 5px;
      
       
    }
     .step {
            background-color: #2575fc;
            height: 6px;
            width: 33%;
            border-radius: 0 0 0 5px;
        }

.card {
    position: relative;
    background: #fff;
    padding: 2em 0;
    height: 480px;
    width: 100%;    
    box-sizing: border-box;
    transition: .3s ease;
    margin: 0 auto;
    overflow: scroll;
    box-shadow: 0 3px 10px -2px rgba(0,0,0,0.35);

  
    
}


    &:first-child,
    &:nth-child(2) {
        background: darken(#00CED1, 2%);
        height: 8px;
        border-radius: 5px 5px 0 0;
        padding: 0;
        box-shadow: none;
    }
  
    &:first-child {
        margin: 0 20px;
        background: darken(#00CED1, 6%);
    }
  
    &:nth-child(2) {
        margin: 0 10px;
    }

h1 {
    font-family: 'Titillium Web', sans-serif;
    font-weight: 700;
    font-size: 3rem;
    color: darken(#00CED1, 3%);
    margin: 0;
    text-align: center;
    padding: 10px;
}

.heading1{
    text-align: center;
}

p {
    margin-top: 0;
}

a {
    /*color: #00CED1;*/
    color: #5F33CD;
    text-decoration: none;
    position: relative;

    &:before {
        content: '';
        position: absolute;
        bottom: 2px;
        left: 0;
        width: 0%;
        border-bottom: 2px solid #00CED1;
        transition: 0.3s;
    }

    &:hover:before {
        width: 80%;
    }
}
</style>

    <script type="text/javascript">
        $(document).ready(function() {
        $('.container').hide();
        $('.notavailable').hide();
        $('#finish').hide();
        var newcounter =0;
        var message;
        $.ajax({
           url: "{{URL::to('GetLandmarkLandingMessage')}}",
           method:"GET",
           data : "usercode="+getParameterByName('usercode')+"&sptype="+getParameterByName('sptype'),
           success: function(data)  {
            // var data=$.parseJSON(datas);
            message = data;
            console.log(data);
            if(data.length>0){
              $('.container').show();
              $('.notavailable').hide();  
                //SubmitLandingMessageLog(message[newcounter].LandmarkLandingMessageID);
                bindCard();
            }
            else{
                   // window.location = "http://landmarktimes.policyboss.com/EIS/index.php";
                   $('.container').hide();
                    $('.notavailable').show();
            }
        }

    });

        function SubmitLandingMessageLog(messageid) {
            $.ajax({
           url: "{{URL::to('SubmitLandingMessageLog')}}",
           method:"POST",
           data : "messageid="+messageid + "&usercode="+getParameterByName('usercode'),
           success: function(datas)  {
            console.log('Saved');
        }

    });
    }

function getParameterByName(name) {
     url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}       

function bindCard() {
    var countcard = message.length;
            $('.newcard').empty();
                if(message[newcounter].Description==""){
                    $('.newcard').append("<div class='content active'><h1 class='heading1'>"+message[newcounter].Header+"</h1><div class='col-md-12'><img class='img-responsive' src='/images/landmark/"+message[newcounter].ImagePath+"'></div></div></div>");
                }
                else{
                    $('.newcard').append("<div class='content active'><h1 class='heading1'>"+message[newcounter].Header+"</h1><div class='col-md-8'><img class='img-responsive' src='/images/landmark/"+message[newcounter].ImagePath+"'></div><div class='col-md-4'><p>"+message[newcounter].Description+"</p></div></div>");
                }
                //$('.step').animate({width: '20%'});
                var animatevalue = ((newcounter+1) / countcard) * 100;
                $('.step').animate({width: animatevalue +'%'});
                if(newcounter==0){
                    $('#previousFirstnew').hide();
                }
                else{
                    $('#previousFirstnew').show();
                }

                if(newcounter==countcard-1){
                    $('#lastNextnew').hide();
                    if(getParameterByName('sptype')==1){
                        $('#finish').show();
                    }
                    else{
                        $('#finish').hide();
                    }
                }
                else{
                    $('#lastNextnew').show();
                    $('#finish').hide();
                }
    }


    $('#finish').click(function () {
        if(getParameterByName('sptype')==1){
            SubmitLandingMessageLog(message[newcounter].LandmarkLandingMessageID);
            window.location = "http://landmarktimes.policyboss.com/EIS/index.php";
        }
        // window.location = "http://landmarktimes.policyboss.com/EIS/index.php";
            $.ajax({
           url: "http://landmarktimes.policyboss.com/EIS/glmsvalidation.php?status=1",
           method:"POST",
           // data : "messageid="+messageid + "&usercode="+getParameterByName('usercode'),
           success: function(datas)  {
            console.log(datas);
        }

    });
        }); 

$('#lastNextnew').click(function () {
        if(getParameterByName('sptype')==1){
                SubmitLandingMessageLog(message[newcounter].LandmarkLandingMessageID);
        }
        newcounter++;
        bindCard();
        
        
    }); 

    $('#previousFirstnew').click(function () {
        newcounter--;
        bindCard();
    }); 
});

 

    </script>
</head>
<body>
<div class="notavailable" style="color: white; text-align: center;">No Data Available</div>
<div class="container">
    <div class="inner-container">
       <!--  <div class="card inactive-1"></div>
        <div class="card inactive-2"></div> -->
         <div class="btm" style="position: relative;background: #fff;
    /*padding:10px 0;*/
    height: 5px;
    width: 100%;
    box-sizing: border-box;
    transition: .3s ease;
    margin: 0 auto;">
            <div class="progress-container">
                <div class="step"></div>
            </div> 
<div style="bottom: 0px; margin-top: 10px;">
                <a class="prevbutton buttonprevious"  id="previousFirstnew" >&larr; Previous </a>
                 <a class="button buttonnext" id="lastNextnew" >Next &rarr;</a>
                 <a class="button buttonnext" id="finish" >Finish</a>
        </div>
        </div>
        <div class="card">
        <div class="newcard"></div>
              <div class="content active">

               <!-- <h1>Step 1</h1>        
               <div class="col-md-8"><img src="/images/chicago.jpg"></div>
                <div class="col-md-4"><p>Make perfectly hot homemade coffee. Carefully pour into coffee cup. </p></div> -->
                
            </div> 
          
           
        </div>
      

        
            
    </div>
</div>
</body>
</html>