<?php include 'header.php';?>
<div class="wrapper">
<div class="content-wrapper">

<section class="content-header">
<h1>User Management<small>(Add User)</small></h1>
</section>

<?php 
 require_once '../cpLIB/config.php';
 $id = $_GET['id'];
 $table='tbl_register';
 $result=$cppl->fetch_regdetails3($table,$id);
?>

<?php
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
    // $u_uname=$_POST['u_uname']; 
    $u_upassword=$_POST['u_upassword'];

    $cppl->update_user($table,$id,$u_fname,$u_lname,$u_email,$u_phone,$u_bank,$u_aname,$u_anumber,$u_upassword);
       


   $table1='tbl_login';
   $role='user';
   $cppl->update_userlogin($table1,$id,$u_upassword);
   echo'<script>alert("Profle Update Successfully..please reload the page.")</script>';  
}
?>

<section class="content">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">EDIT USER DETAILS</h3>
</div>
<!-- /.box-header -->
<!-- form start -->

<?php
foreach ($result as $value);
?>
<form  method="post" action="" name="formValidation" onsubmit="return inputvaluecheck()">
<div class="box-body">

<div class="form-group">
<div class="col-md-6 col-sm-12">
<label >First Name</label>
<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
<input type="text" class="form-control" name="u_fname" value="<?php echo $value['fname']; ?>" placeholder="Enter first Name">
</div> 

<div class="col-md-6 col-sm-12">
<label >Last Name</label>
<input type="text" class="form-control" name="u_lname" value="<?php echo $value['lname']; ?>" placeholder="Enter last Name">
</div>
</div>

<div class="form-group">   
<div class="col-md-6 col-sm-12">
<label >Email</label>
<input type="email" class="form-control" name="u_email"  value="<?php echo $value['email']; ?>" placeholder="Enter email id">
</div>

<div class="col-md-6 col-sm-12">
<label>Phone number</label>
<input type="text" class="form-control" name="u_phone"  value="<?php echo $value['phone']; ?>" placeholder="Phone number">
</div>
</div>

<div class="form-group">   
<div class="col-md-4 col-sm-12">
<label >Bank Name & IFSC</label>
<input type="text" class="form-control" name="u_bank"  value="<?php echo $value['bank']; ?>" placeholder="Enter bank name and IFSC">
</div>

<div class="col-md-4 col-sm-12">
<label>Account Name</label>
<input type="text" class="form-control" name="u_aname" value="<?php echo $value['aname']; ?>"  placeholder="Account name">
</div>
<div class="col-md-4 col-sm-12">
<label>Account Number</label>
<input type="text" class="form-control" name="u_anumber"  value="<?php echo $value['anumber']; ?>" placeholder="Account number">
</div>
</div>


<div class="form-group">   
<!-- <div class="col-md-6 col-sm-12">
<label >Username</label>
<input type="text" class="form-control" name="u_uname" value="<?php echo $value['uname']; ?>" placeholder="Choose a username">
</div> -->

<div class="col-md-6 col-sm-12">
<label>Password</label>
<input type="Password" class="form-control" name="u_upassword" value="<?php echo $value['upassword']; ?>"  placeholder="Enter password">
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-sm-12">
<label>Re Password</label>
<input type="password" class="form-control"  name="u_repassword"   placeholder="Re enter password">
</div>
<div class="col-md-6 col-sm-12">
<label>Select Plan</label>
<select class="form-control" name="u_reference" value="<?php echo $value['reference']; ?>">Select a Plan:
<option value="Direct">Company</option>
<?php 
$table='tbl_register';
$result=$cppl->fetch_regdetails2($table);
foreach ($result as $value) { ?>
<option value="<?php echo $value['uname']; ?>"><?php echo $value ['fname'];echo "(Rid:-".$value ['reference'].")";?></option>
<?php } ?>
</select>
</div> 
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right" name="update"><b>UPDATE</b></button>
</div>
<!-- /.box-footer -->
</form>

 
</div>
</div>
</div>
</section>

</div>
</div>

<?php include 'footer.php';?>


<script> 
function inputvaluecheck()                                    
{ 
var u_fname = document.forms["formValidation"]["u_fname"];
var u_lname = document.forms["formValidation"]["u_lname"];     
var u_email = document.forms["formValidation"]["u_email"];
var u_phone = document.forms["formValidation"]["u_phone"];
var u_bank = document.forms["formValidation"]["u_bank"];  
var u_aname = document.forms["formValidation"]["u_aname"];
var u_anumber = document.forms["formValidation"]["u_anumber"];  
var u_uname = document.forms["formValidation"]["u_uname"]; 
var u_upassword = document.forms["formValidation"]["u_upassword"];
var reference = document.forms["formValidation"]["u_reference"]; 


var u_upassword=document.formValidation.u_upassword.value;  
var u_repassword=document.formValidation.u_repassword.value;   

if (u_fname.value == "")                                  
{ 
window.alert("Please enter your FirstName."); 
u_fname.focus(); 
return false; 
} 
if (u_lname.value == "")                                  
{ 
window.alert("Please enter your LastName."); 
u_lname.focus(); 
return false; 
} 
if (u_email.value == "")                                  
{ 
window.alert("Please enter your Email."); 
u_email.focus(); 
return false; 
} 
if (u_phone.value == "")                                  
{ 
window.alert("Please enter your Phone number."); 
u_phone.focus(); 
return false; 
} 
if (u_bank.value == "")                                  
{ 
window.alert("Please enter your Bank Name and IFSC."); 
u_bank.focus(); 
return false; 
} 
if (u_aname.value == "")                                  
{ 
window.alert("Please enter your Account name."); 
u_aname.focus(); 
return false; 
} 
if (u_anumber.value == "")                                  
{ 
window.alert("Please enter your Account number."); 
u_anumber.focus(); 
return false; 
} 
if (u_uname.value == "")                                  
{ 
window.alert("Please enter your Usrname."); 
u_uname.focus(); 
return false; 
} 

if (u_upassword.value == "")                                  
{ 
window.alert("Please enter your Password."); 
u_upassword.focus(); 
return false; 
} 


if(u_upassword==u_repassword){  
return true;  
}
else{  
alert("Your password and confirmation password doesn't match..!");  
return false;  
}
if (u_reference.value == "")                                  
{ 
window.alert("please enter Your reference."); 
u_reference.focus(); 
return false; 
}

return true; 
}
</script>