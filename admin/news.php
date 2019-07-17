<?php include 'header.php';?>
<div class="wrapper">
<div class="content-wrapper">

<section class="content-header">
<h1>News and Events</h1>
</section>


<section class="content">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Post News and Events </h3>
</div>
<?php
require_once '../cpLIB/config.php';
if(isset($_POST['submit'])) // button 
{

$title=$_POST['title']; 
$dos=$_POST['dos']; 
$description=$_POST['description']; 

$cppl->insert_news($title,$dos,$description);
}
?>
<!-- form start -->
<form class="form-horizontal" method="post" action="">
<div class="box-body">
<div class="form-group">
<label class="col-sm-2 control-label">Title</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="title" placeholder="Enter News title">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Date</label>
<div class="col-sm-8">
<input type="date" class="form-control" id="datepicker" name="dos" placeholder="Enter News title">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Description</label>
<div class="col-sm-8">
<textarea class="form-control" rows="4"  name="description" placeholder="Enter description"></textarea>
</div>
</div>

</div>
<!-- /.box-body -->
<div class="box-footer">
<label class="col-sm-2 control-label"></label>
<div class="col-sm-8">
<button type="submit" class="btn btn-info pull-right" name="submit"><b>POST</b></button>
</div>
</div>
<!-- /.box-footer -->
</form>
</div>
</div>
</div>
</section>






</div>
</div>

<?php include 'footer.php';?>