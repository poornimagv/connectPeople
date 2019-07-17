
<!DOCTYPE html>
<html>
<head>
    <title>Connectpeople</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
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
      li{
        font-weight: 700;
        font-size: 20px;
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
<li><a href="refferal.php">Referral</a></li>
<li><a href="userdetails.php">Transactions </a></li>
<li><a href="myearning.php">My Earning</a></li>
<!-- <li><a href="usersupport.php">Support</a></li> -->

<!-- Dropdown -->
<li class="nav-item dropdown">
<?php
foreach ($result as $value);
?>
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
<?php echo $susername; ?> Profile
</a>
<ul>
<div class="dropdown-menu">
  <li><a href="editprofile.php?id=<?php echo $value['id']; ?>">Edit Profile</a></li>
  <li><a href="usersupport.php">Support</a></li>
  <li><a href="usernotification.php">Notification</a></li>
<li><a  href="logout.php">Logout</a></li>


</div>
</ul>
</li>




</ul>
</nav>
<!-- /main nav -->

</div>
</header>