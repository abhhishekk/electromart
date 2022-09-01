<?php
  
   if (isset($_GET['id'])) {
   	include "../../inc/dbh.inc.php";
   	$did = $_GET['id'];
   	$status = $_GET['type'];
   	$currentstatus = $_GET['current'];

    if ($status == $currentstatus) {
    	
    	header("Location: ../../../electromart/admin/admin_dperson.php");
    	exit();

    } elseif ($status != $currentstatus) {
    	$sql = "update delivperson set status='$status' where id='$did';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../electromart/admin/admin_dperson.php");
    	exit();
    }
   }

   if (isset($_GET['button'])) {
      $did = $_GET['id'];
   	  $status = $_GET['type'];
   	  $currentstatus = $_GET['current'];

   	   if ($status == $currentstatus) {
    	
    	header("Location: ../../../electromart/admin/admin_dperson.php");
    	exit();

    } elseif ($status != $currentstatus) {
    	$sql = "update delivperson set status='$status' where id='$did';";
    	mysqli_query($con, $sql);

    	header("Location: ../../../electromart/admin/admin_dperson.php");
    	exit();
    }
   }