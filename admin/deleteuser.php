<?php
 require_once '../cpLIB/config.php';
if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $table = 'tbl_register';

  if ($cppl->deleteuser($table,$id)) {
    header("location:viewuser.php");
  }
}
?>