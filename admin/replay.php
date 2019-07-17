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
 $id = $_GET['id'];
 $table='tbl_query';
 $result=$cppl->fetch_queryreplay($table,$id);

if(isset($_POST['send'])) // button 
{
$s_name=$_POST['s_name'];
$r_query=$_POST['r_query'];
$r_replay=$_POST['r_replay']; 
$cppl->insert_replay($s_name,$r_query,$r_replay);
}

?>



<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>User Support</h1>
   
    </section>
    <br>
<?php
foreach ($result as $value);
?>
<section class="content">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Replay for Clients Queries</h3>
</div>
<section class="content">
<div class="row">
<form class="form-horizontal" method="post" action="" >
<div class="box-body">

<div class="form-group">
<label class="col-sm-3 control-label">Username</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="s_name" value="<?php echo $value['s_name']; ?>" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Query</label>
<div class="col-sm-6">
<input type="hidden" name="" value="<?php echo $value['id']; ?>"> 

<input type="text" class="form-control" name="r_query" value="<?php echo $value['s_query']; ?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Replay</label>
<div class="col-sm-6">
<textarea class="form-control" rows="4" cols="50" name="r_replay" required> </textarea>
</div>
</div>

</div>
<div class="modal-footer">
<a href="support.php"><button type="button" class="btn btn-danger">cancle</button></a>
<button type="submit" class="btn btn-primary " name="send" onclick="return confirm('please confirm to send replay to <?php echo $value['s_name']; ?>');">Send replay</button>

</div>
<!-- /.box-footer -->
</form>




</div>
</section>




</div>
</div>
</div>
</section>
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
