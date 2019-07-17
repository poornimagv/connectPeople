<?php
require_once '../cpLIB/config.php';
$table='tbl_register';
if(isset($_GET['user1_id'])){
$status=$_GET['user1_id'];
$result=$cppl->fetch_status($table,$status);

$st=$result['status'];
if($st=='0')
{
$status2=1;
}
elseif($st=='1')
{
$status2=-1;
}
elseif($st=='-1')
{
$status2=0;
}
echo $status2;
$results=$cppl->update_status($table,$status,$status2);
header("Location:blockeduser.php");

}

?>