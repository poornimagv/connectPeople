<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>ConnectPeople</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- google fonts -->
    <!-- Css link -->
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

  </head>
  <?php
require_once 'cpLIB/config.php';
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

if($check==false) {
  $refererUser = $cppl->refererName($reference);
  $referer_referer = $refererUser[0]['reference'];
  $maxUsers = $cppl->maxReferer($referer_referer);

  // block user if user crosses 7 members
  if ($maxUsers == 6){
    $table = 'tbl_register';
    $test1 = $cppl->blockUser($table, $referer_referer);
    $table = 'tbl_login';
    $test2 = $cppl->blockUser($table, $referer_referer);
  }
  $table='tbl_register';
  $count = $cppl->countReferer($table,$reference);

  //echo '<pre>'; print_r($count); exit();

  if($count < 2){

  $cppl->insert_register($fname,$lname,$email,$phone,$bank,$aname,$anumber,$uname,$upassword,$plan,$refer_id,$reference);

  if($referer_referer == 'Direct'){
    $referer_referer = $reference;
  }
  $cppl->insert_referal_detail($uname,$reference,$referer_referer);


  $table1='tbl_login';
  $role='user';
  $cppl->insert_login($table1,$uname,$upassword,$role);
  $table2='tbl_trx';
  $cppl->insert_trx($table2,$fname,$refer_id,$reference);
  echo'<script>alert("registration Successfully done...")</script>';
  } else {
    echo'<script>alert("Referer has exceded the limit.")</script>';
  }

}
else{
echo'<script>alert("Username Already Taken,try another one..")</script>';
}
}
}
?> 
 


  <body id="top">
  

<?php include 'userheader.php';

require_once 'cpLIB/config.php';
$table='tbl_register';
  ?>
<div class="wrapper">
<div class="container">
<div class="row">


<div class="col-md-offset-3 col-md-8 col-sm-12" style="margin-top: 150px;" >
<center><h2>Register Here</h2></center>
<hr>

<form action="" method="post" name="formValidation" onsubmit="return inputvaluecheck()">

<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="form-group">
<input type="text" class="form-control" name="fname" placeholder="First Name" >
</div>
</div>


<div class="col-md-6 col-sm-12">
<div class="form-group">
<input type="text" class="form-control" name="lname" placeholder="Last Name">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group"> 
<input type="email" class="form-control" name="email" placeholder="Email">
</div>
</div>

<div class="col-md-6 col-sm-12">
<div class="form-group">
<input type="text" class="form-control" name="phone" placeholder="Phone Number">
</div>
</div>
</div>



<div class="row">
<div class="col-md-4 col-sm-12">
<div class="form-group"> 
<input type="text" class="form-control" name="bank" placeholder="Bank Name & IFSC">
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="form-group">
<input type="text" class="form-control" name="aname" placeholder="Account Name">
</div></div>

<div class="col-md-4 col-sm-12">
<div class="form-group">
<input type="text" class="form-control" name="anumber" placeholder="Account Number">
</div>
</div>
</div>
<hr>

<div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group"> 
<input type="text" class="form-control" name="uname" placeholder="Username">
</div>
</div>

<div class="col-md-6 col-sm-12">
<div class="form-group"> 
<input type="Password" class="form-control" name="upassword" placeholder="Password"> 
</div>
</div>
</div>


<div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group">
<input type="password" class="form-control"  name="repassword" placeholder="Re Password">
</div></div>


  
<div class="col-md-6 col-sm-12">
<div class="form-group"> 
<input type="text" class="form-control"  name="reference"  value="<?php echo $susername;?>">
</div>
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-info pull-right" name="adduser">ADD NEWUSER</button>
</div>
<hr>
</form>

</div>

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



</div>
</div>

    
<!-- <?php include 'footer.php';?> -->