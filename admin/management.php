<?php
 require_once '../cpLIB/config.php';
 $table='tbl_package';
if(isset($_GET['user_id'])){
$management=$_GET['user_id'];
$result=$cppl->fetch_management($table,$management);

$st=$result['management'];
if($st=='0')
{
$management2=1;
}
elseif($st=='1')
{
$management2=-1;
}
elseif($st=='-1')
{
$management2=0;
}
echo $management2;
$results=$cppl->update_management($table,$management,$management2);
header("Location:package.php");

}

?>