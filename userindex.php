<?php include 'userheader.php';?>

<body>


<div class="container">
<div class="row"  style="margin-top: 150px;">

<br>
<?php
require_once 'cpLIB/config.php';
$table='tbl_news_events';
$result=$cppl->fetch_news($table);
?>

<div class="row">
<div class="col-md-8">
<center><h1>Hello</h1><br>
<h3>Welcome to user Dashboard</h3><br>
<h2><?php echo $value['fname']; ?><img src="img/grp.png" width="10%"></h2>
</center>
</div>

<div class="col-md-4">
<div class="box box-danger box-solid">
<div class="box-header">
<center><h3 class="box-title"><b>News and Events</h3></center>
</div>

<div class="box-body">

<marquee behavior=scroll direction="up" scrollamount="2">
<table class="table table-striped table-bordered" style="width:100%">

<?php
$slnoo=1;
foreach ($result as $value) {
?>
<center>
<div class="row>">  
<?php echo $value['title']; ?>
</div>
<div class="row>">  
<?php echo $value ['dos']; ?> 
</div>
<div class="row>"><?php echo $value ['description']; ?>
</div>
</center>
</tr>

<?php $slnoo++; } ?>
</table>
</marquee>
</div>
</div>
</div>

</div>
</div>

