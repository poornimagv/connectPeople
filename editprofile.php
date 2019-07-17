<?php
include 'userheader.php'; //include header

require_once 'cpLIB/config.php';
$table='tbl_register';
if(isset($_POST['update'])) // button 
{

$id = $_POST['id'];
$u_fname=$_POST['u_fname']; 
$u_lname=$_POST['u_lname']; 
$u_email=$_POST['u_email'];
$u_phone=$_POST['u_phone'];
$u_bank=$_POST['u_bank'];
$u_aname=$_POST['u_aname']; 
$u_anumber=$_POST['u_anumber'];   
// $u_uname=$_POST['uname']; 
$u_upassword=$_POST['u_upassword'];

$cppl->update_user($table,$id,$u_fname,$u_lname,$u_email,$u_phone,$u_bank,$u_aname,$u_anumber,$u_upassword);



$table1='tbl_login';
$role='user';
$cppl->update_userlogin($table1,$id,$u_upassword);
echo'<script>confirm("Profle Update Successfully... please reload the page")</script>';  
}

?>

<div class="col-md-offset-3 col-md-8 col-sm-12" style="margin-top: 150px;" >
<center><h2>Update Your Profile</h2></center>
<?php
foreach ($result as $value);
?>

<form action="" method="post">
<br>
<div class="row">

	
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
<label>Name</label>
<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
<input type="text" class="form-control" name="u_fname" value="<?php echo $value['fname']; ?> " >
</div>
</div>

<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
<label>Last name</label>
<input type="text" class="form-control" name="u_lname" value="<?php echo $value['lname']; ?> ">
</div>
</div> 
</div>



<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="u_email" value="<?php echo $value['email']; ?> " >
</div>
</div>


<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" name="u_phone" value="<?php echo $value['phone']; ?> " minlength="10" maxlength="12" >
</div>
</div>
</div>
<hr>

<div class="row">

<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Bank Name</label>
<input type="text" class="form-control" name="u_bank" value="<?php echo $value['bank']; ?> " >
</div>
</div>

<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Account Name</label>
<input type="text" class="form-control" name="u_aname" value="<?php echo $value['aname']; ?> " >
</div>
</div>

<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Account Number</label>
<input type="text" class="form-control" name="u_anumber" value="<?php echo $value['anumber']; ?> " >
</div>
</div>
</div>
<hr>



<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
    <label>Password</label>
<input type="text" class="form-control" name="u_upassword" value="<?php echo $value['upassword']; ?>"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
</div>
</div> 

<div class="form-group">

<button type="submit" class="btn btn-success pull-right" name="update" style="margin-top: 23px;"><b>Update Profile</b></button>
</div>
</div>
<hr>
</form>

</div>


