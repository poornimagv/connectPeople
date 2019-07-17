<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Connectpeople</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

 

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

 <?php 
 include 'navbar.php'; 

     require_once '../cpLIB/config.php';
     if(isset($_POST['save'])) // button 
{
   
    $package=$_POST['package']; 
    $amount=$_POST['amount']; 
    $management=0; 

   $cppl->insert_package($package,$amount,$management);
}

 $table='tbl_package';
 $result=$cppl->fetch_packagedata($table);
  ?> 


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Package Management</h1>
      <ol class="breadcrumb">
        <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><b>+ ADD NEW</b></button></li>
        
      </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="row">



<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
 
<tr>
<th>Sl no</th>
<th>Package </th>
<th>Amount</th>
<th>Management</th>
<th>Action</th>
</tr>
</thead>


<?php
$slnoo=1;
foreach ($result as $value) {
?>
<tr> 
 <input type="hidden" value="<?php echo $value['id']; ?>">           
<td><?php echo $slnoo; ?> </td>
<td><?php echo $value['package']; ?> </td>
<td><?php echo $value ['amount']; ?> </td>


 <?php $management=$value['management']; ?>
<td>
  <?php if(($management)=='1'){ ?>
            <a href="management.php?user_id=<?php echo $value['id'];?>" onclick="return confirm('Really You Need to Deactive <?php echo $value['package'];?> ');"><button class="btn btn-primary btn-sm">Active</button></a>

         <?php }if(($management)=='0'){ ?>
             <a href="management.php?user_id=<?php echo $value['id'];?>" onclick="return confirm('Really You Need to Active <?php echo $value['package'];?>');"><button class="btn btn-warning btn-sm">Pending</button></a>
      
          <?php }if(($management)=='-1'){ ?>
             <a href="management.php?user_id=<?php echo $value['id'];?>" onclick="return confirm('Really You Need to Pending <?php echo $value['package'];?>');"><button class="btn btn-danger btn-sm">Deactive</button></a>
         <?php } ?>


</td>
<td>

<a href="delete.php?id=<?php echo $value['id']; ?>"><button type="button" onclick="return confirm('Do you want delete this record')" class="btn btn-danger">Delete</button></a>
</td>
</tr>

<?php $slnoo++; } ?>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Package</h4>
        </div>
        
        <div class="modal-body">
          
         <form class="form-horizontal" method="post" action="" >
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-3 control-label">Package Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="package" placeholder="Please enter package name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount" placeholder="Please enter Amount">
                  </div>
                </div>


              
              </div>
             <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="save">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
              <!-- /.box-footer -->
            </form>

        </div>
        
      </div>
      
    </div>
  </div>
  
</div>
  <!-- /.content-wrapper -->
<?php include 'footercontent.php';?>



  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
