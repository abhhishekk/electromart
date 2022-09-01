<?php
  session_start();
  if (!isset($_SESSION['u_name'])) {
  	 header("Location: ../index.php?type=invalidentry");
     exit();
  } else {
 include "dbh.inc.php";
 $id = $_GET['id'];
 $sql = "delete from products where pid = '$id'";
 mysqli_query($con, $sql);

 header("Location: ../mdelete.php?delete=success");
 exit();

}
