<!DOCTYPE html>
<html lang="en">
<head>
  <title>GLMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->

  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
<!--   <script>tinymce.init({ selector:'textarea' });</script> -->
  <script type="text/javascript">
    tinymce.init({
    selector: 'textarea',
    height: 500,
    theme: 'modern',
    plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
    templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
    });
  </script>
<style>
.scrollit {
    overflow:scroll;
    height:400px;
}
</style>
<!-- Image validation check -->
<script type="text/javascript">
var _validFileExtensions = [".jpg"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
  
//Boostrap flash massage

     window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
 </script>
 
</head>
<body>
<div class="container">
  <h2>Landmark Landing Message</h2>
 
  <form class="form-horizontal" action="{{url('insert')}}" enctype="multipart/form-data" method="POST">
  {{ csrf_field() }}
 
  @if (Session::has('message'))
  <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}  
  </div>
 @endif
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Header</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="l_header" placeholder="" name="l_header" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">Description</label>
      <div class="col-sm-8">          
        <textarea type="text"  class="form-control" id="disc"  name="l_disc" ></textarea>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-4" for="">Image</label>
      <div class="col-sm-4">          
        <input type="file" class="form-control" id="l_image"  name="l_image" onchange="ValidateSingleInput(this);" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">Expiry Date</label>
      <div class="col-sm-4">          
        <input type="date" class="form-control" id="l_date"  name="l_date" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">IsActive</label>
      <div class="col-sm-1">          
         <input type="radio" name="optradio" id="optradio" value="1" checked>Yes
      </div>
      <div class="col-sm-1">  
         <input type="radio" name="optradio" id="optradio" value="0">No
      </div>
    </div>

    
    <div class="form-group">        
      <div class="col-sm-offset-7 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

  </form>
  <center>
  <div class="col-sm-offset-2 col-sm-8">
  <div class="scrollit">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Header</th>
        <th>Description</th>
        <th>Image</th>
        <th>Expiry Date</th>
        <th>IsActive</th>
        <th>Edit</th>
        <th>Deactivate</th>
      </tr>
    </thead>
    <tbody>
    @foreach($user as $row)
      <tr>
        <td>{{ $row->LandmarkLandingMessageID }}</td>
        <td>{{ $row->Header }}</td>
        <td>{{ $row->Description }}</td>
        <td>{{ $row->ImagePath }}</td>
        <td>{{ $row->ExpiryDate }}</td>
        @if($row->IsActive =='1')    
        <td>{{'Yes' }}</td>
        @else
        <td>{{'No' }}</td>        
        @endif
        <td><a href="edit/{{ $row->LandmarkLandingMessageID }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a href="delete_landmark/{{ $row->LandmarkLandingMessageID }}" onclick="return confirm('Are you sure you want to deactivate ?')"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
  </div>
  </center>
</div>

</body>
</html>
