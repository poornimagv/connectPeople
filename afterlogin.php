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
<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>

   -->
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
  

        <header id="navigation" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
                    </button>
          <!-- /responsive nav button -->
          
          <!-- logo -->
          <h1 class="navbar-brand">
            <a href="#body"><img src="img/09logo.png"  width="100" alt=""></a>
          </h1>
          <!-- /logo -->
                </div>

        <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav menu">
                       
                      <li><a href="userindex.php">Home</a></li>
                      <li><a href="">Refferral</a></li>
                       <li><a href="afterlogin.php">Details</a></li>
                        <li><a href="#">My Earning</a></li>
                        <li><a href="logout.php">Logout</a></li>

                        <?php
                          foreach ($result as $value);
                        ?>
                      <li>
                        <a href=""><?php echo $value['uname']; ?></a>
                      </li> 
                        
                    </ul>
                </nav>
        <!-- /main nav -->
        
            </div>
        </header>
<body>
<div class="container">

<div class="row"  style="margin-top: 150px;">

<div class="col-xs-12">
  <center><h3><b>Your Details</b></h3></center>
<form method="post">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
 <!--   <tr>
    <th><a href="logout.php"><button type="button" class="btn btn-primary pull-right">Logout</button></a>

</th>


  </tr> -->
<tr>
<th>sno</th>
<th>FName</th>
<th>LName</th>
<th>Email</th>
<th>Phone</th>
<th>Bank</th>
<th>Acc name</th>
<th>Acc num</th>
<th>Uname</th>
<!-- <th>Pass</th> -->
<th>Plan</th>
<th>Reference</th>

</tr>
</thead>
<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr>            
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['fname']; ?> </td>
<td><?php echo $value ['lname']; ?> </td>
<td><?php echo $value ['email']; ?> </td>
<td><?php echo $value ['phone']; ?> </td>
<td><?php echo $value ['bank']; ?> </td>
<td><?php echo $value ['aname']; ?> </td>
<td><?php echo $value ['anumber']; ?> </td>
<td><?php echo $value ['uname']; ?> </td>
<!-- <td><?php echo $value ['upassword']; ?> </td> -->
<td><?php echo $value ['plan']; ?> </td>
<td><?php echo $paytwo=$value ['reference']; ?> </td>
</tr>

<?php $slnoo++; } ?>
</table>
</div>
</div>



<div class="row">
<div class="col-md-12">
<?php
  $table='tbl_register';
  $reference=$paytwo;
  $result=$cppl->afterlogin2($table,$reference); 
?>
   <center><h3><b>Your First Level Sponsor</b></h3></center>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
 <thead>
<tr>
<th>Sl no</th>
<th>FName</th>
<th>LName</th>
<th>Email</th>
<th>Phone</th>
<th>Bank & IFSC</th>
<th>Acc name</th>
<th>Acc num</th>
<!-- <th>Uname</th>
<th>Pass</th>
<th>Plan</th> -->

</tr>
</thead>
<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr>            
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['fname']; ?> </td>
<td><?php echo $value ['lname']; ?> </td>
<td><?php echo $value ['email']; ?> </td>
<td><?php echo $value ['phone']; ?> </td>
<td><?php echo $value ['bank']; ?> </td>
<td><?php echo $value ['aname']; ?> </td>
<td><?php echo $value ['anumber']; ?> </td>
<!-- <td><?php echo $value ['uname']; ?> </td>
<td><?php echo $value ['upassword']; ?> </td>
<td><?php echo $value ['plan']; ?> </td> -->
<?php  $paythree=$value ['reference']; ?>
</tr>

<?php $slnoo++; } ?>
</table>   
</div>
</div>
<br/>



<div class="row">
<div class="col-md-12">
<?php
$table='tbl_register';
$reference=$value ['reference'];
if($reference != 'Direct')
{
  $result=$cppl->afterlogin2($table,$reference); 
  ?>
<center><h3><b>Your Top Level Sponser</b></h3></center>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
   
<thead>
<tr>
<th>Sl no</th>
<th>FName</th>
<th>LName</th>
<th>Email</th>
<th>Phone</th>
<th>Bank & IFSC</th>
<th>Acc name</th>
<th>Acc num</th>
<!-- <th>Uname</th>
<th>Pass</th>
<th>Plan</th> -->


</tr>
</thead>
<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr>            
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['fname']; ?> </td>
<td><?php echo $value ['lname']; ?> </td>
<td><?php echo $value ['email']; ?> </td>
<td><?php echo $value ['phone']; ?> </td>
<td><?php echo $value ['bank']; ?> </td>
<td><?php echo $value ['aname']; ?> </td>
<td><?php echo $value ['anumber']; ?> </td>
<!-- <td><?php echo $value ['uname']; ?> </td>
<td><?php echo $value ['upassword']; ?> </td>
<td><?php echo $value ['plan']; ?> </td> -->
<?php  $value ['reference']; ?>
</tr>

<?php $slnoo++; } } ?>
</table>
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



</form>


</body></html>


