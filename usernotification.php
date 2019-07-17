
   
<?php include 'userheader.php';?>

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
  $table='tbl_replay';
  $uname=$susername;
  $result=$cppl->fetch_replay($table,$uname);
?>

 <body >
    <div class="container">
<div class="row" style="margin-top: 150px;">

<div class="col-xs-12">
<form method="post">

<br>

   <table id="example" class="table table-striped table-bordered" style="width:100%">
   
<thead>
<tr>
<th>Sl no</th>
<th>Name</th>
<th>Query sent</th>
<th>Replay message</th>
<th>Action</th>
</tr>
</thead>
<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr>            
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['s_name']; ?> </td>
<td><?php echo $value['r_query']; ?> </td>
<td><?php echo $value['r_replay']; ?> </td>
<td><a class="btn btn-danger btn-sm" href='deletequery.php?id=<?php echo $value['id']; ?>'>Delete</a>


</td>
</tr>

<?php $slnoo++; } ?>
</table>
      
        

    </form>
</div>

</div></div>
  

</div>
</body>



