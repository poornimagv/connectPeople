<?php
require_once 'cpLIB/config.php';
$table='tbl_transaction';
if(isset($_GET['u_id'])){
echo $id=$_GET['u_id'];
$result=$cppl->fetch_transaction_status($table,$id);
$st=$result['status'];
if($st=='0')	
{
$status2=1;
}
elseif($st=='1')
{
$status2=0;
}
echo $status2;

$results=$cppl->update_transaction_status($table,$id,$status2);


header("Location:myearning.php");

}

?>