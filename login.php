<?php
require_once 'cpLIB/config.php';
if(isset($_POST['login'])){
	$table="tbl_login";
	$uname=$_POST['uname']; 
	$upassword=$_POST['upassword'];

	if($result=$cppl->fetch_blockedUsers($table,$uname,$upassword)) {
		echo "<div class='error_msg' style='color:red;text-align:center;padding-top:115px;'>your board has been completed suceessfully. please contact admin for new login</div>";
	}

	elseif($result=$cppl->fetch_reglogin($table,$uname,$upassword)) {
		$u_name=$result['uname'];
		$u_password=$result['upassword'];
		$u_role=$result['role'];
		$status=1;

		if ($u_name==$uname &&  $u_password==$upassword) {
			session_start();
			if($u_role=="admin" && $status=="1") {
				$_SESSION['user_name']=$uname;
				header("location:admin/dashboard.php");
			}
			elseif($u_role=="user" && $status=="1") {
				$_SESSION['user_name']=$uname;
				header("location:userindex.php");
			}
		}
	}
	else{
		echo "<div class='error_msg' style='color:red;text-align:center;padding-top:115px;'>incorrect username and password</div>";
	}
}

?>
<?php include 'loginheader.php';?>

<div class="wrapper">
<div class="container">
<div class="row">

<div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
<div id="login" style="margin-top: 150px;">
<div id="login-row" class="row justify-content-center align-items-center">
<form id="login-form" class="form" action="" method="post">
<h3 class="text-center text-info"><b>Login</b></h3>

<div class="form-group">
<label for="username" class="text-info">Username:</label><br>
<input type="text" name="uname" id="username" class="form-control">
</div>
<div class="form-group">
<label for="password" class="text-info">Password:</label><br>
<input type="password" name="upassword" id="password" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="login" id="login" class="btn btn-info center-block" value="login">
</div>

<div id="register-link" class="text-right">
<a href="Directregister.php" class="text-info">Register here</a>
</div>
</form>

</div>

</div>


</div>


</div>
</div>

<!-- <?php include 'footer.php';?> -->