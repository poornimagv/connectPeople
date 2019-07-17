<?php
session_start();

   unset($_SESSION['user_name']);
      session_destroy();
      echo "<br><br><br><br><center><img src=img/Logout1a.png /><br><br><a href=index.php><font size=+3>Ok</font></a></center>";


?>