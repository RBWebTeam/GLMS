
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/calendarstyle.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/calendar.css" rel="stylesheet" type="text/css" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">

  <style>

 .nav-tabs.nav-justified>.active>a {background:#ff0000 !important; font-weight:normal; color:#fff !important;}
 .pad {padding:10px; background:#efe7e7; border:1px solid #f1f1f1;}
 body {font-size:12px; background:#f8f8f8;}
 .box-shadow:1px 1px 3px 1px #666;
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="javascript:void(0)">HOME</a></li>
      <li class="active"><a href="#">LEARNING</a></li>
       
      <li><a href="#">EVALUATION</a></li>
      <li ><a href="#">CLASSROOM TRAINING</a></li>
      <li ><a href="{{ url('user-course-get-request') }}">USER COURSE REQUEST</a></li>
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
      @if($IsSupperAdmin[0]->IsSupperAdmin=='1')
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="AdminHome"><b>Switch To Admin</b></a>
      @else
            ---
      @endif
    </form>

  </div>
</nav>

@if(Session::has('UserID'))
{{Session::get('UserID')}}
@endif


<div class="container">
<div >
  <div class="container">
  <div class="col-md-4">
 <div class="pad box-shadow">
<!-- /////////////////// -->
<div class="wthree-grids"> 
        <div class="custom-calendar-wrap">
          <div id="custom-inner" class="custom-inner">
            <div class="w3ls-header">
              <nav>
                <span id="custom-prev" class="custom-prev"></span>
                <span id="custom-next" class="custom-next"></span>
                <span id="custom-current" class="custom-current" title="Go to current date"></span>
              </nav>  
              <h2 id="custom-month" class="w3layouts-month">MARCH</h2>
              <h3 id="custom-year" class="w3-agileits-year">2016</h3>
            </div>
            <div class="clear"> </div>
            <div id="calendar" class="fc-calendar-container fc-agile"></div>
          </div>
        </div> 
        <!-- js -->
       
      </div>

<!-- //////////////////////////// -->

 </div>
  </div>
  <div class="col-md-8 pad box-shadow">
  <ul class="nav nav-tabs nav-justified nav-bar">
    <li class="active"><a id="recentlyAssignedTab" class="tabactive" data-toggle="pill" href="#home"><b>RECENTLY ASSIGNED COURSE</b></a></li>
    <li><a id="recentlyAccessedTab" data-toggle="pill" href="#menu1"><b>RECENTLY ACCESSED COURSE</b></a></li>
    
  </ul>


  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
      <div id="get_details"></div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div id="recently_accessed"></div>
    </div>
    
    
  </div>
  </div>
</div>
</div>
</br>
</div>



<script type="text/javascript">


  $( document ).ready(function() {
$('#recentlyAssignedTab').click(function() {
  $('#recentlyAssignedTab').addClass('tabactive');
  $('#recentlyAccessedTab').removeClass('tabactive');
});

$('#recentlyAccessedTab').click(function() {
  $('#recentlyAccessedTab').addClass('tabactive');
  $('#recentlyAssignedTab').removeClass('tabactive');
});


   $.ajax({ 
   url: "{{URL::to('get-course')}}",
   method:"GET", 
   success: function(data)  
   {
    var msg=$.parseJSON(data);
      console.log(msg);
          
   }
  });

   $.ajax({ 
   url: "{{URL::to('get-course-name')}}",
   method:"GET", 
   success: function(data)  
   {
    var msg=$.parseJSON(data);
      console.log(msg);
      //var tablerows = new Array();
      var rows = "";
     // console.log(tablerows);
          $.each(msg, function( index, value ) {
            param='id='+ value.CoursePackage +'&&CourseName='+value.CourseName;
            rows += '<tr><td><a target="_blank" href="course-details?CourseID='+ value.ID +'">' + value.CourseName + '</a></td><td>' + value.CourseStatus + '</td><td>' + value.Duration + '</td><td><a class="download" href="download?'+param+'"><i class="fa fa-download" aria-hidden="true"></i></a ></td></tr>';
        }); 
                         
                         if(msg){
                            $('#get_details').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td><b>Course Name</b></td><td><b>Course Status</b></td><td><b>Duration</b></td><td><b>Download</b></td></tr><tr>'+rows+'</tr></table>');
                         }else{
                            $('#get_details').empty().append('No Result Found');
                         }
          
   }
  });

   $.ajax({ 
   url: "{{URL::to('get-recently-accessed-course')}}",
   method:"GET", 
   success: function(data)  
   {
    var msg=$.parseJSON(data);
      console.log(msg);
      var rows = "";
     // console.log(tablerows);
          $.each(msg, function( index, value ) {
            param='id='+ value.CoursePackage +'&&CourseName='+value.CourseName;
            rows += '<tr><td><a target="_blank" href="course-details?CourseID='+ value.ID +'">' + value.CourseName + '</a></td><td>' + value.CourseStatus + '</td><td>' + value.Duration + '</td><td><a class="download" href="download?'+param+'"><i class="fa fa-download" aria-hidden="true"></i></a ></td></tr>';
        }); 
                         
                         if(msg){
                            $('#recently_accessed').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td><b>Course Name</b></td><td><b>Course Status</b></td><td><b>Duration</b></td><td><b>Download</b></td></tr><tr>'+rows+'</tr></table>');
                         }else{
                            $('#recently_accessed').empty().append('No Result Found');
                         }
          
   }
  });

     }); 
</script>




        <script src="js/jquery-1.11.1.min.js"></script>
                <!-- <script src="js/modernizr-2.6.2.min.js"></script>  -->

        <script src="js/modernizr.custom.63321.js"></script> 
        <script type="text/javascript" src="js/jquery.calendario.js"></script>
        <script type="text/javascript" src="js/data.js"></script>
        <!-- //js -->
        <script type="text/javascript"> 
          $(function() {
            function updateMonthYear() {
              $( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
              $( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
            }
            
            $(document).on('finish.calendar.calendario', function(e){
              $( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
              $( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
              $( '#custom-next' ).on( 'click', function() {
                $( '#calendar' ).calendario('gotoNextMonth', updateMonthYear);
              } );
              $( '#custom-prev' ).on( 'click', function() {
                $( '#calendar' ).calendario('gotoPreviousMonth', updateMonthYear);
              } );
              $( '#custom-current' ).on( 'click', function() {
                $( '#calendar' ).calendario('gotoNow', updateMonthYear);
              } );
              $( '#custom-current' ).on( 'click', function() {
                $( '#calendar' ).calendario('gotoNow', updateMonthYear);
              } );
            });
            
            $('#calendar').on('shown.calendar.calendario', function(){
              $('div.fc-row > div').on('onDayClick.calendario', function(e, dateprop) {
                console.log(dateprop);
                if(dateprop.data) {
                  showEvents(dateprop.data.html, dateprop);
                }
              });
            });
          
            var transEndEventNames = {
              'WebkitTransition' : 'webkitTransitionEnd',
              'MozTransition' : 'transitionend',
              'OTransition' : 'oTransitionEnd',
              'msTransition' : 'MSTransitionEnd',
              'transition' : 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            $wrapper = $( '#custom-inner' );

            function showEvents( contentEl, dateprop ) {
              hideEvents();
              var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateprop.monthname + ' '
              + dateprop.day + ', ' + dateprop.year + '</h4></div>' ),
              $close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents);
              $events.append( contentEl.join('') , $close ).insertAfter( $wrapper );
              setTimeout( function() {
                $events.css( 'top', '0%' );
              }, 25);
            }
            
            function hideEvents() {
              var $events = $( '#custom-content-reveal' );
              if( $events.length > 0 ) {   
                $events.css( 'top', '100%' );
                Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();
              }
            }
            
            $( '#calendar' ).calendario({
              caldata : events,
              displayWeekAbbr : true,
              events: ['click', 'focus']
            });
          
          });
        </script>

