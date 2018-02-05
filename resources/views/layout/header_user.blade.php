<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">GLMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{URL::to('index')}}">HOME</a></li>
      <li ><a href="{{URL::to('tree-page')}}">LEARNING</a></li>
       
      <li><a href="javascript:void(0)">EVALUATION</a></li>
      <li ><a href="javascript:void(0)">CLASSROOM TRAINING</a></li>
    </ul>
    <form class="navbar-form navbar-right">
    <a href="{{URL::to('AdminHome')}}" style="color: #fff;">Switch To Admin</a>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <a class="btn btn-default" type="submit">
           <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <i class="fa fa-user fa-3x" aria-hidden="true"></i>
      <i class="fa fa-cog fa-3x" aria-hidden="true"></i>
    </form>

  </div>
</nav>
