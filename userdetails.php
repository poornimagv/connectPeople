<!DOCTYPE html>
<html>
<head>
    <title>Connectpeople</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
 <link rel="stylesheet" type="text/css" href="assets/style2.css">




   <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/image.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css"> 
   <style type="text/css">
     table th{
      background-color: #64a50dc2;
      color: #ffffff;
      font-weight: bold;
     }
   </style>
</head>
<?php  
  session_start();
    if( isset( $_SESSION['user_name'] ) )
  {
    $susername=$_SESSION['user_name'];
  }


  else
  {
    echo "<center><font color=red size=18>Un authorized access is Denied</font><br><br><a href=login.php>Login to continue</a> </center>";
    exit();
  }
 

require_once 'cpLIB/config.php';
  $table='tbl_register';
  $uname=$susername;
  $result=$cppl->afterlogin($table,$uname);
?>

  <body id="top">
  
<?php include 'userheader.php';?>
        

<body>
<div class="container">

<div class="row"  style="margin-top: 150px;">

<div class="col-md-4">
  <center></center>
<form method="post">
 <table id="example" class="table table-striped table-bordered">
<thead>
  <?php
$slnoo=1;
foreach ($result as $value){
?>

<tr colspan=2>
  <center><h3><b>Your Details</b></h3></center>
  </tr>
  <tr></tr>
<tr>
<td>Sl no</td>
<td><?php echo $slnoo; ?></td>
</tr>
<tr>
  <td>First Name</td>
  <td><?php echo $value['fname']; ?></td>
</tr>

<tr>
<td>Last Name</td>
<td><?php echo $value ['lname']; ?> </td>
</tr>
<tr>
  <td>Email</td>
  <td><?php echo $value ['email']; ?> </td>
</tr>
<tr>
  <td>Phone</td>
  <td><?php echo $value ['phone']; ?> </td>
</tr>
<tr>
  <td>Bank</td>
  <td><?php echo $value ['bank']; ?> </td>
</tr>
<tr>
  <td>Acc name</td>
<td><?php echo $value ['aname']; ?> </td>
</tr>
<tr>
  <td>Acc num</td>
  <td><?php echo $value ['anumber']; ?> </td>
</tr>
<tr>
  <td>Uname</td>
  <td><?php echo $value ['uname']; ?> </td>
</tr>
<tr>
  <td>Plan</td>
  <td><?php echo $value ['plan']; ?> </td>
</tr>
<tr>
  <td>Reference</td>
  <td><?php echo $paytwo=$value ['reference']; ?> </td>

</tr>

<?php $slnoo++; } ?>
</table>
</div>



<div class="col-md-4">
<?php

  $table='tbl_register';
  $reference=$paytwo;
  $result=$cppl->afterlogin2($table,$reference); ?>
   <center><h3><b>Your First Level Sponsor</b></h3></center>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
  <?php
$slnoo=1;
foreach ($result as $value) {
?>
 <thead>
  <tr></tr>
<tr>
<td>Sl no</td>
<td><?php echo $slnoo; ?> </td>
</tr>
<tr>
<td>First Name</td>
<td><?php echo $value['fname']; ?> </td>
</tr>
<tr>
<td>Last Name</td>
<td><?php echo $value ['lname']; ?> </td>
</tr>
<tr>
<td>Email</td>
<td><?php echo $value ['email']; ?> </td>
</tr>
<tr>
<td>Phone</td>
<td><?php echo $value ['phone']; ?> </td>
</tr>
<tr>
<td>Bank Name</td>
<td><?php echo $value ['bank']; ?> </td>
</tr>
<tr>
<td>A/C name</td>
<td><?php echo $value ['aname']; ?> </td>
</tr>
<tr>
<td>A/c Num</td>
<td><?php echo $value ['anumber']; ?> </td>
</tr>
<tr>
<td>Send Money</td>
<td><a href="transaction.php?id=<?php echo $value['id']; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  send
  </button></a></td>
<?php  $paythree=$value ['reference']; ?>
</tr>

</thead>
</table> 
 
  <?php $slnoo++; } ?>

</div>


<div class="col-md-4">
<?php
$table='tbl_register';
$reference=$value ['reference'];
if($reference != 'Direct')
{
  $result=$cppl->afterlogin2($table,$reference); ?>
<center><h3><b>Your Top Level Sponser</b></h3></center>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
   <?php
$slnoo=1;
foreach ($result as $value) {
?>
<thead>
  <tr></tr>
<tr>
<td>Sl no</td>
<td><?php echo $slnoo; ?> </td>
</tr>

<tr>
<td>First Name</td>
<td><?php echo $value['fname']; ?> </td>
</tr>
<tr>
<td>Last Name</td>

<td><?php echo $value ['lname']; ?> </td>
</tr>
<tr>
<td>Email</td>
<td><?php echo $value ['email']; ?> </td>
</tr>
<tr>
<td>Phone</td>
<td><?php echo $value ['phone']; ?> </td>
</tr>
<tr>
<td>Bank</td>
<td><?php echo $value ['bank']; ?> </td>
</tr>
<tr>
<td>A/c name</td>
<td><?php echo $value ['aname']; ?> </td>
</tr>
<tr>
<td>A/c num</td>
<td><?php echo $value ['anumber']; ?> </td>
</tr>
<tr>
<td>Send Money</td>
<td><a href="transaction.php?id=<?php echo $value['id']; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Send</button></a></td>
<?php  $value ['reference']; ?>
</tr>
</thead>

</table>
<?php $slnoo++; } } ?>
</div>

</div>





<div class="row">
<center><h3><b>Other Account Details</b></h3></center>
<table id="example" class="table table-striped table-bordered" style="width:100%"> 
<thead>
<tr>
<th>Sl no</th>
<th>FName</th>
<th>LName</th>
<th>Email</th>
<th>Phone</th>
<th>Bank & IFSC</th>
<th>Acc. name</th>
<th>Acc. num</th>
<!-- <th>Uname</th>
<th>Pass</th>
<th>Plan</th> -->


</tr>
</thead>
<tr>
<td>1</td>
<td>SHEKAR</td>
<td>P</td>
<td>shekar1234@grediffmail.com</td>
<td>8073111382</td>
<td>IDBI Bank(IFSC:IBKL0000364)</td>
<td>SHEKAR P</td>
<td>0364104000076261 </td>

</tr>
</table>
</div>





