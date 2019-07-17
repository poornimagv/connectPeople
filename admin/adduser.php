<?php include 'header.php';?> 
<div class="wrapper">
<div class="content-wrapper">

<section class="content-header">
<h1>User Management<small>(Add User)</small></h1>
</section>
<?php
require_once '../cpLIB/config.php';
if(isset($_POST['adduser'])) // button 
{

$fname=$_POST['fname']; 
$lname=$_POST['lname']; 
$email=$_POST['email'];
$phone=$_POST['phone'];
$bank=$_POST['bank'];
$aname=$_POST['aname']; 
$anumber=$_POST['anumber'];   
$uname=$_POST['uname']; 
$upassword=$_POST['upassword'];    
$plan=1;

//start select last refer id from DB
$Set_id=111001;
$table='tbl_register';
$result=$cppl->fetch_refer_id($table);

$count=$cppl->rowcount($table);
if ($count == 0)
{
$refer_id=$Set_id;	
foreach ($result as $value){
 $r_id=$value['refer_id'];
  $refer_id=$r_id+1; }
//end select last refer id from DB
$reference=$_POST['reference'];
$check=$cppl->checkuser($uname);
$check1=$cppl->check_refer_id($refer_id);
if($check==false)
{
$cppl->insert_register($fname,$lname,$email,$phone,$bank,$aname,$anumber,$uname,$upassword,$plan,$refer_id,$reference);

$table1='tbl_login';
$role='user';
$cppl->insert_login($table1,$uname,$upassword,$role);

$table2='tbl_trx';
$cppl->insert_trx($table2,$fname,$refer_id,$reference);

echo'<script>alert("registration Successfully done...")</script>';
}
else{
echo'<script>alert("Username Already Taken,try another one..")</script>';
}
}
}
?> 




<section class="content">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">ADD NEW USER</h3>
</div>

<form  method="post" action="" name="formValidation" onsubmit="return inputvaluecheck()">
<div class="box-body">

<div class="form-group">
<div class="col-md-6 col-sm-12">
<label >First Name</label>
<input type="text" class="form-control" name="fname" placeholder="Enter first Name">
</div> 


<div class="col-md-6 col-sm-12">
<label >Last Name</label>
<input type="text" class="form-control" name="lname" placeholder="Enter last Name">
</div>
</div>

<div class="form-group">   
<div class="col-md-6 col-sm-12">
<label >Email</label>
<input type="email" class="form-control" name="email" placeholder="Enter email id">
</div>

<div class="col-md-6 col-sm-12">
<label>Phone number</label>
<input type="text" class="form-control" name="phone"  placeholder="Phone number">
</div>
</div>

<div class="form-group">   
<div class="col-md-4 col-sm-12">
<label >Bank Name & IFSC</label>
<input type="text" class="form-control" name="bank" placeholder="Enter bank name and IFSC">
</div>

<div class="col-md-4 col-sm-12">
<label>Account Name</label>
<input type="text" class="form-control" name="aname"  placeholder="Account name">
</div>
<div class="col-md-4 col-sm-12">
<label>Account Number</label>
<input type="text" class="form-control" name="anumber"  placeholder="Account number">
</div>
</div>


<div class="form-group">   
<div class="col-md-6 col-sm-12">
<label >Username</label>
<input type="text" class="form-control" name="uname" placeholder="Choose a username">
</div>

<div class="col-md-6 col-sm-12">
<label>Password</label>
<input type="Password" class="form-control" name="upassword"  placeholder="Enter password">
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-sm-12">
<label>Re Password</label>
<input type="password" class="form-control"  name="repassword"  placeholder="Re enter password">
</div>


<div class="form-group">   
<div class="col-md-6 col-sm-12">
<label>Refer_id</label>
<select  class="form-control" name="reference">
<option value="Direct">Company</option>
<?php 
 $table='tbl_trx';
 $result=$cppl->fetch_regdetails2($table);
 foreach ($result as $value) { ?>
  <option value="<?php echo $value['refer_id']; ?>"><?php echo $value['refer_id']; echo "(Refered By:-".$value ['reference'].")";?></option>
</tr>
<?php } ?>
</select>
</div>
</div>


</div> 
</div>
<div class="box-footer">
<button type="submit" class="btn btn-info pull-right" name="adduser">ADD NEWUSER</button>
</div>

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
var fname = document.forms["formValidation"]["fname"];
var lname = document.forms["formValidation"]["lname"];     
var email = document.forms["formValidation"]["email"];
var phone = document.forms["formValidation"]["phone"];
var bank = document.forms["formValidation"]["bank"];  
var aname = document.forms["formValidation"]["aname"];
var anumber = document.forms["formValidation"]["anumber"];  
var uname = document.forms["formValidation"]["uname"]; 
var upassword = document.forms["formValidation"]["upassword"];
var reference = document.forms["formValidation"]["reference"]; 


var upassword=document.formValidation.upassword.value;  
var repassword=document.formValidation.repassword.value;   

if (fname.value == "")                                  
{ 
window.alert("Please enter your FirstName."); 
fname.focus(); 
return false; 
} 
if (lname.value == "")                                  
{ 
window.alert("Please enter your LastName."); 
lname.focus(); 
return false; 
} 
if (email.value == "")                                  
{ 
window.alert("Please enter your Email."); 
email.focus(); 
return false; 
} 
if (phone.value == "")                                  
{ 
window.alert("Please enter your Phone number."); 
phone.focus(); 
return false; 
} 
if (bank.value == "")                                  
{ 
window.alert("Please enter your Bank Name and IFSC."); 
bank.focus(); 
return false; 
} 
if (aname.value == "")                                  
{ 
window.alert("Please enter your Account name."); 
aname.focus(); 
return false; 
} 
if (anumber.value == "")                                  
{ 
window.alert("Please enter your Account number."); 
anumber.focus(); 
return false; 
} 
if (uname.value == "")                                  
{ 
window.alert("Please enter your Usrname."); 
uname.focus(); 
return false; 
} 

if (upassword.value == "")                                  
{ 
window.alert("Please enter your Password."); 
upassword.focus(); 
return false; 
} 


if(upassword==repassword){  
return true;  
}
else{  
alert("Your password and confirmation password doesn't match..!");  
return false;  
}
if (reference.value == "")                                  
{ 
window.alert("please enter Your reference."); 
reference.focus(); 
return false; 
}

return true; 
}
</script>

