
 <?php include 'userheader.php';
 require_once 'cpLIB/config.php';
 $id = $_GET['id'];
 $table='tbl_register';
 $result=$cppl->fetch_uname($table,$id);

 if(isset($_POST['transition'])) // button 
{
$sendby = $_POST['sendby'];
$uname=$_POST['uname']; 
$t_id=$_POST['t_id']; 
$amount=$_POST['amount']; 
$my_file=$_FILES['my_file']['name'];
// $image= addslashes(file_get_contents($_FILES['my_file']['tmp_name']));
$image_name= addslashes($_FILES['my_file']['name']);
move_uploaded_file($_FILES['my_file']['tmp_name'],"images/" .time(). $_FILES['my_file']['name']);
$photo_path="images/".time(). $_FILES['my_file']['name'];

$cppl->insert_transaction($sendby,$uname,$t_id,$amount,$photo_path);
}
 ?>
<body id="top">

<div class="col-md-offset-2 col-md-6 col-sm-12" style="margin-top: 120px;margin-left: 25.666667%" >
<center><h2>Send Transactions Details</h2></center>

<form  action="" method="post" enctype='multipart/form-data' onsubmit="return inputvaluecheck()" name="formValidation">
<div class="modal-body">
<?php  
$uname=$susername;
$result=$cppl->afterlogin($table,$uname);

foreach ($result as $value)
?>
<div class="form-group">
<label >Send By:</label>
<input type="text" class="form-control" name="sendby" value="<?php echo $value ['uname']; ?> " readonly>
</div>

<?php
$result=$cppl->fetch_uname($table,$id);
foreach ($result as $value)
    ?>
    
<div class="form-group">
<label >Send To:</label>
<!-- <input type="text" class="form-control" value="<?php echo $value ['id']; ?> "> -->
<input type="text" class="form-control" name="uname" value="<?php echo $value ['uname']; ?> " readonly>
</div>


<div class="form-group">
<label >Transaction ID:</label>
<input type="text" class="form-control" name="t_id" id="t_id" placeholder="Enter transition  id" >
</div>

<div class="form-group">
<label>Amount:</label>
<input type="text" class="form-control" name="amount" id="amount" placeholder="Enter transition amount" >
</div>

<div class="form-group">
<label>Teansaction Image:</label>
<input type="file" name="my_file" id="my_file" accept="image/x-png,image/gif,image/jpeg"/>
</div> 
</div>

<div class="modal-footer">
<a href="userdetails.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Back</button></a>
<button type="submit" class="btn btn-primary" name="transition">Send</button>
</div>
</form>
</div>
<script> 
function inputvaluecheck()                                    
{ 
    var t_id = document.forms["formValidation"]["t_id"];
    var amount = document.forms["formValidation"]["amount"];     
    var my_file = document.forms["formValidation"]["my_file"];  
   
    if (t_id.value == "")                                  
    { 
        window.alert("Please enter Transaction ID."); 
        t_id.focus(); 
        return false; 
    } 
      if (amount.value == "")                                  
    { 
        window.alert("Please enter Transaction amount."); 
        amount.focus(); 
        return false; 
    } 
  if (my_file.value == "")                                  
    { 
        window.alert("Please select a Transaction image."); 
        my_file.focus(); 
        return false; 
    } 
    return true; 

}
</script> 

