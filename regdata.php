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
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'copyHtml5',
            // 'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
        ]
    } );
} );
</script>

  <?php  
  session_start();
    if( isset( $_SESSION['user_name'] ) )
  {
    $session_user=$_SESSION['user_name'];
  }
  else
  {
    echo "<center><font color=red size=18>Un authorized access is Denied</font><br><br><a href=login.php>Login to continue</a> </center>";
    exit();
  }
  ?>

</head>
<?php
require_once 'cpLIB/config.php';
  $table='tbl_register';
 $result=$cppl->fetch_regdetails($table);
?>
<body>
    <div class="container">
<div class="row">

<div class="col-xs-12">
<form method="post">

<br>

   <table id="example" class="table table-striped table-bordered" style="width:100%">
   
<thead>
  <tr>
    <th><a href="register.php"><button type="button" class="btn btn-primary pull-right">Register</button></a>
</th>
    <th><a href="logout.php"><button type="button" class="btn btn-primary pull-right">Logout</button></a>
</th>
 <th colspan="8"><h3><marquee><b>Connect People Admin Panel</b></marquee></h3>
</th>
  </tr>
<tr>
<th>Sl no</th>
<th>FName</th>
<th>LName</th>
<th>Email</th>
<th>Phone</th>
<th>Bank & IFSC</th>
<th>Acc name</th>
<th>Acc num</th>
<th>Uname</th>
<!-- <th>Pass</th>
<th>Plan</th> -->
<th>Referrer</th>

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
<!-- <td><?php echo $value ['upassword']; ?> </td>
<td><?php echo $value ['plan']; ?> </td> -->
<td><?php echo $value ['reference']; ?> </td>
</tr>

<?php $slnoo++; } ?>
</table>
      
        

    </form>
</div>

</div></div>
  

</div>
</body></html>


