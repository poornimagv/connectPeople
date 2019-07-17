<?php
 require_once 'cpLIB/config.php';
if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $table = 'tbl_replay';

  if ($cppl->deletequery($table,$id)) {
    header("location:usernotification.php");
  }
}
?>