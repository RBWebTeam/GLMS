<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- <link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<!-- <link src="css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<style type="text/css">
  .navbar-inverse {
    background-color: #222;
    border-color: #080808;
}
.navbar-brand {
    float: left;
    /*height: 50px;*/
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
}
.navbar-form {
    width: auto;
    padding-top: 0;
    padding-bottom: 0;
    margin-right: 0;
    margin-left: 0;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.navbar-right {
    float: right!important;
    margin-right: -15px;
}
</style>
<script type="text/javascript">

  $(document).ready(function function_name(argument) {
    $(".navbar-nav li").removeClass("active");
    var current = location.pathname.slice('1');
    $("#"+current).addClass("active");
  });
</script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="index" class="active"><a href="index">HOME</a></li>
      <li id="learning"><a href="#">LEARNING</a></li>
       
      <li id="assessment"><a href="assessment">EVALUATION</a></li>
      <li id="training" ><a href="javascript:void(0)">CLASSROOM TRAINING</a></li>
    </ul>
    <!-- <form class="navbar-form navbar-right">
    <a href="AdminHome">Switch To Admin</a>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <a class="btn btn-default" type="submit">
           <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </form> -->

  </div>
</nav>
</body>
</html>