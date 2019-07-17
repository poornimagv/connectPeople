<?php
include 'userheader.php'; //include header

require_once 'cpLIB/config.php';
if(isset($_POST['support'])) // button 
{

$s_name=$_POST['s_name']; 
$s_email=$_POST['s_email']; 
$s_mobile=$_POST['s_mobile']; 
$s_query=$_POST['s_query']; 
$cppl->insert_query($s_name,$s_email,$s_mobile,$s_query);
}
?>
<?php
foreach ($result as $value);
?>

<div class="col-md-offset-3 col-md-8 col-sm-12" style="margin-top: 150px;" >
<center><h2>Send your Query</h2></center>
<form action="" method="post" onsubmit="return inputvaluecheck()" name="formValidation">
<br>
<div class="row">

	
<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" name="s_name" value="<?php echo $value['uname']; ?> ">
</div>
</div>

<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="s_email" value="<?php echo $value['email']; ?> ">
</div>
</div> 
<div class="col-md-4 col-xs-12 col-sm-12">
<div class="form-group">
<label>Mobile</label>
<input type="text" class="form-control" name="s_mobile" value="<?php echo $value['phone']; ?> ">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 col-xs-12 col-sm-12">
<div class="form-group">
<label>Query</label>
<textarea rows="5" cols="50" class="form-control" name="s_query"></textarea>
</div>

</div>
</div>

<div class="row">
<div class="form-group">
<button type="submit" class="btn btn-success pull-right" name="support" style="margin-top: 23px;"><b>Send</b></button>
</div>
</div>
</form>
</div>


<script> 
function inputvaluecheck()                                    
{ 
    var s_query = document.forms["formValidation"]["s_query"];
    if (s_query.value == "")                                  
    { 
        window.alert("Please enter your Query."); 
        s_query.focus(); 
        return false; 
    } 
    return true; 

}
</script> 

