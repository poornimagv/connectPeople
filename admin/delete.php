<?php
 require_once '../cpLIB/config.php';
if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $table = 'tbl_package';

  if ($cppl->deletepackage($table,$id)) {
    header("location:package.php");
  }
}
?>

