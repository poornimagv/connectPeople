<?php
require_once '../cpLIB/config.php';
$table='tbl_register';
$table2='tbl_login';
if(isset($_GET['user_id'])){
$id=$_GET['user_id'];
$username=$_GET['username'];
$result=$cppl->fetch_status($table,$id);

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

$results=$cppl->update_status($table,$table2,$id,$status2,$username);


header("Location:viewuser.php");

}

?>