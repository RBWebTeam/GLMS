<!DOCTYPE html>
<html lang="en">
<head>
  <title>GLMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
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

</script>
</head>
<body>
<div class="container">
  <h2>Landmark Landing Message Update</h2>
  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    <img src="/images/{{ Session::get('path') }}">
    @endif
  <form class="form-horizontal" action="{{url('update')}}" enctype="multipart/form-data" method="POST">
  {{ csrf_field() }}
   <input type = "hidden" name ="id" value ="{{$user->LandmarkLandingMessageID}}">
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Header</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="l_header" value="{{$user->Header}}" name="l_header" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Description</label>
      <div class="col-sm-8">          
        <textarea type="text" class="form-control" id="l_disc"  name="l_disc" value="">{{$user->Description}}</textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">Expiry Date</label>
      <div class="col-sm-4">          
        <input type="date" class="form-control" id="l_date"  name="l_date" value="{{$user->ExpiryDate}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">IsActive</label>
      <div class="col-sm-4">
         @if($user->IsActive =='1') 
         <input type="radio"  name="editcheck" checked="true" value="1"> Yes
         <input type="radio" name="editcheck" value="0">  No 
        @else
        <input type="radio" name="editcheck" value="1">  Yes
         <input type="radio" checked="true" name="editcheck" value="0">  No
         @endif
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-4" for="">Image</label>
      <div class="col-sm-4">
      <img src="{{ URL::to('images/landmark/' . $user->ImagePath) }}"  height="50%" width="50%">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="">Image</label>
      <div class="col-sm-4">          
        <input type="file" class="form-control" id="l_image"  name="l_image" onchange="ValidateSingleInput(this);">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-7 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </div>
  </form>
  </body>
</html>