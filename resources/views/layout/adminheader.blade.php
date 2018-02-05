<!DOCTYPE html>
<html>
<head>
<title>Admin Home</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/adminmenuactive.js"></script>
<style type="text/css">

.nav-side-menu {
overflow: auto;
font-family: verdana;
font-size: 12px;
font-weight: 200;
background-color: #2e353d;
position: fixed;
/*top: 0px;*/
width: 300px;
height: 100%;
color: #e1ffff;
}
.nav-side-menu .brand {
background-color: #23282e;
line-height: 50px;
display: block;
text-align: center;
font-size: 14px;
}
.nav-side-menu .toggle-btn {
display: none;
}
.nav-side-menu ul,
.nav-side-menu li {
list-style: none;
padding: 0px;
margin: 0px;
line-height: 35px;
cursor: pointer;
/*    
  .collapsed{
     .arrow:before{
               font-family: FontAwesome;
               content: "\f053";
               display: inline-block;
               padding-left:10px;
               padding-right: 10px;
               vertical-align: middle;
               float:right;
          }
   }
*/
}
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
font-family: FontAwesome;
content: "\f078";
display: inline-block;
padding-left: 10px;
padding-right: 10px;
vertical-align: middle;
float: right;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
border-left: 3px solid #d19b3d;
background-color: #4f5b69;
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
color: #d19b3d;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
background-color: #181c20;
border: none;
line-height: 28px;
border-bottom: 1px solid #23282e;
margin-left: 0px;
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
background-color: #020203;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
font-family: FontAwesome;
content: "\f105";
display: inline-block;
padding-left: 10px;
padding-right: 10px;
vertical-align: middle;
}
.nav-side-menu li {
padding-left: 0px;
border-left: 3px solid #2e353d;
border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
text-decoration: none;
color: #e1ffff;
}
.nav-side-menu li a i {
padding-left: 10px;
width: 20px;
padding-right: 20px;
}
.nav-side-menu li:hover {
border-left: 3px solid #d19b3d;
background-color: #4f5b69;
-webkit-transition: all 1s ease;
-moz-transition: all 1s ease;
-o-transition: all 1s ease;
-ms-transition: all 1s ease;
transition: all 1s ease;
}
@media (max-width: 767px) {
.nav-side-menu {
  position: relative;
  width: 100%;
  margin-bottom: 10px;
}
.nav-side-menu .toggle-btn {
  display: block;
  cursor: pointer;
  position: absolute;
  right: 10px;
  top: 10px;
  z-index: 10 !important;
  padding: 3px;
  background-color: #ffffff;
  color: #000;
  width: 40px;
  text-align: center;
}
.brand {
  text-align: left !important;
  font-size: 22px;
  padding-left: 20px;
  line-height: 50px !important;
}
}
@media (min-width: 767px) {
.nav-side-menu .menu-list .menu-content {
  display: block;
}
}
body {
margin: 0px;
padding: 0px;
}



</style>
</head>
<body>
<div class="col-md-3">
<div class="nav-side-menu">

  <!-- <div class="brand">Logo</div> -->
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

      <div class="menu-list">

          <ul id="menu-content" class="menu-content collapse out">
              <li>
                <a href="#">
                <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
              </li>

              <li  data-toggle="collapse" data-target="#useraudience" class="collapsed active">
                <a href="#"><i class="fa fa-user fa-lg"></i> User & Audience Management <span class="arrow"></span></a>
              </li>
              <ul class="sub-menu collapse" id="useraudience" >
                  <li class="active"><a href="javascript:void(0)">Manage User</a></li>
                  <li id="audiencemaster"><a href="audiencemaster">Audience Master</a></li>
                  <li id="audience_rule"><a href="audiencerule">Audience Rule</a></li>
                  <li id="details"><a href="details">Assign Audience To Course Group</a></li>
                  <li id="designation_master"><a href="Designationmaster">Designation Master</a></li>
                  <li id="auadience-details"><a href="audience-details">User To Audience</a></li>
                  
             
              </ul>


              <li data-toggle="collapse" data-target="#coursemanagement" class="collapsed">
                <a href="javascript:void(0)"><i class="fa fa-book fa-lg"></i> Course Management <span class="arrow"></span></a>
              </li>  
              <ul class="sub-menu collapse" id="coursemanagement">
                <li class="active"><a href="course-form">Manage Course</a></li>
                <!-- <li ><a href="javascript:void(0)">Course Detail</a></li> -->
                <li ><a href="categorymaster">Course Category</a></li>
                <li ><a href="coursegroup">Course Group</a></li>
                <li ><a href="course-to-coursegroup-mapping">Assign Course to Course Group</a></li>
                <li ><a href="tree-structure">Manage Topic</a></li>
              </ul>

              <li data-toggle="collapse" data-target="#assessmentmanagement" class="collapsed">
                <a href="javascript:void(0)"><i class="fa fa-book fa-lg"></i> Assessment Management <span class="arrow"></span></a>
              </li>  
              <ul class="sub-menu collapse" id="assessmentmanagement">
                <li class="active"><a href="assessment-question-mapping">Assessment Question Mapping</a></li>
                <li ><a href="add-assessment">Add Assessment</a></li>
                <li ><a href="questionbank">Question Bank</a></li>
               
              </ul>
          </ul>
   </div>
</div>
</div>
</body>
</html>

