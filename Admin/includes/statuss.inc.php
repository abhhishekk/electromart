<?php

 session_start();

if (!isset($_SESSION['ad_uname'])) {
 header("Location: ../../../electromart/index.php");
 exit();
} else {

 $res = $_GET['bid'];
 $stats = "disable";
 include "../../inc/dbh.inc.php";

 //echo $res;
 //echo $stat;

 //Giving enable option to brand

  $run = "select status from brands where bid='$res';";
  $result = mysqli_query($con, $run);
  $resultcheck = mysqli_num_rows($result);

  if ($resultcheck > 0) {
  	$newresult = mysqli_fetch_assoc($result);

  	//print_r($newresult);//
    
    if ($newresult == $stats) {
    	header("Location: ../../../electromart/admin/admin_brand.php?access=alreadydenined");
    	exit();
    } elseif ($newresult != $stats) {
    	$sql = "update brands set status='$stats' where bid='$res';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../electromart/admin/admin_brand.php?access=denied");
    	exit();
    }
  }

}