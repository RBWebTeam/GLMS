@include('layout.adminheader')
<style type="text/css">
  tr:hover {
          background-color: #5bc0de;
        }
</style>


<form id="EditAssessment_form" role="form" method="post">
	<div class="col-md-9">
  <h3>Edit Assessment Details</h3>
  <hr>
<table class="table">
    <thead>
        <tr class="btn-primary" style="font-weight: bold; height:30px;">
                        <th align="left" style="padding-left: 4px; width: 4%">Sr No</th>
                        <th align="left" style="padding-left: 4px; width: 20%">Assessment Name</th>
                        <th align="left" style="padding-left: 4px; width: 15%">Topic Name</th>
                        <th align="left" style="padding-left: 4px; width: 8%">Passing(%)</th>
                        <th align="left" style="padding-left: 4px; width: 10%">Start Date</th>
                        <th align="left" style="padding-left: 4px; width: 10%">End Date</th>
                        <th align="left" style="padding-left: 4px; width: 10%">Action</th></tr>
    </thead>
    <tbody>
         
         @foreach($query as $val)

        <tr class="tblcomp">
          <td align="left" style="padding-left: 4px"  width="4%"><?php echo $val->AssessmentId;?></td>
          <td align="left" style="padding-left: 4px"  width="20%"><?php echo $val->AssessmentName;?></td>
          <td align="left" style="padding-left: 4px"  width="15%"><?php echo$val->name;?></td>
          <td align="left" style="padding-left: 4px"  width="8%"><?php echo $val->PassingPercentage?>%</td>
          <td align="left" style="padding-left: 4px"  width="10%"><?php echo date("m/d/Y", strtotime($val->StartDate)); ?></td>
          <td align="left" style="padding-left: 4px"  width="10%"><?php echo date("m/d/Y", strtotime($val->EndDate));?></td>
          <td align="left" style="padding-left: 4px"  width="10%"><span><a class="btn btn-primary" href="{{url('edit-assessment')}}/<?php echo $val->AssessmentId;?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('edit-assessment-details')}}/<?php echo $val->AssessmentId;?>" onclick="return confirm('Are you sure want to delete this record?')"><span class="glyphicon glyphicon-trash"></span></a></span></td>
        </tr>
        @endforeach
</table>

</div>
</form>
