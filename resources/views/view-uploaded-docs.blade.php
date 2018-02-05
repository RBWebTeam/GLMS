@include('layout.header')
 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link  rel="stylesheet" type="text/css" href="{{URL::to('css/mysite.css')}}"/>
<link href="{{URL::to('css/freshslider.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/jquery.treemenu.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


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

<div class="container" id="fh5co-hero">
</div>
<div class="fh5co-contact animate-box">
                         <div class="container">
                          <div class="row">
                        <center>
                        
                       <!--  <h3><p class="sub-title" >Where teaching is made easy..!! </p></h3> -->
                      </center>
                      
                      <div class="col-md-2"></div>
                            <div class="col-md-8 box-shadow white-bg">
                            
                            <div class="row text-left comp-pg rate">
                            <form >
                                 <h1 class="loan-head">View Uploaded Docs</h1>
                                 <div id="docs"></div>
                                 </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
</br>
@include('layout.footer')


<script type="text/javascript">
 

  
   //  $(".tree").treemenu({delay:300}).openActive();
       $.ajax({ 
        method:"GET", 
        url: "{{URL::to('uploaded')}}",
       
    success: function(msg){

      
      console.log(msg);
   
    var tablerows = new Array();
                         $.each(msg, function( index, value ) {
            tablerows.push('<tr><td style="font-family: monospace">' + value.CourseType + '</td><td style="font-family: monospace"><a href=' + value.CoursePackage + '>localhost:8000/' + value.CoursePackage + '</a></td></tr>');
        }); 

       if(msg){
                            $('#docs').empty().append('<table class="table table-striped table-bordered"><tr class="text-capitalize"><td style="font-family: monospace">Course Type</td><td style="font-family: monospace">Course Package</td></tr><tr>'+tablerows+'</tr></table>');
                         }else{
                            $('#docs').empty().append('No Result Found');
                         }
          
   }

  });

 



 
</script>

