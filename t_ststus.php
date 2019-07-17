<?php
require_once '../cpLIB/config.php';
$table='tbl_register';
if(isset($_GET['user_id'])){
$id=$_GET['user_id'];
$username=$_GET['username'];
$result=$cppl->fetch_tstatus($table,$id);

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

$results=$cppl->update_transaction($table,$table2,$id,$status2,$username);


header("Location:viewuser.php");

}

?>