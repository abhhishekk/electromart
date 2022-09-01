<?php
 
  if (isset($_POST['submit'])) {
  	session_start();
  	session_unset();
  	session_destroy();

  	header("Location:../../../electromart/admin/index.php?logout=success");
  	exit();
  } else {
  	header("Location: ../../../electromart/index.php");
  	exit();
  }