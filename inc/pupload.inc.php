<?php

 if (isset($_POST['submit'])) {
 	include "dbh.inc.php";
    session_start();

 	$pname = $_POST['pname'];
 	$pprice = $_POST['pprice'];
 	$pdescription = $_POST['pdescription'];
    $bname = $_POST['bname'];
 	$file = $_FILES['file'];
    $manager = $_SESSION['u_name'];
    $pstatus = "available";
    
 	$filename = $_FILES['file']['name'];
 	$filetmpname = $_FILES['file']['tmp_name'];
 	$fileerror = $_FILES['file']['error'];
 	$filetype = $_FILES['file']['type'];

 	$fileext = explode('.', $filename);
 	$fileactualext = strtolower(end($fileext)); 
    $allowed = array('jpg', 'jpeg', 'png', 'jfif');


    if (empty($pname) || empty($pprice) || empty($pdescription) || empty($file)) {
    	
    	header("Location: ../madd.php?type=empty");
    	exit();
    } elseif (!filter_var($pprice, FILTER_VALIDATE_INT)) {
    	
    	header("Location: ../madd.php?type=price");
    	exit();
    } elseif (in_array($fileactualext, $allowed)) {
    	if ($fileerror === 0) {
    			$filenewname = uniqid('', true).".".$fileactualext;
    			$filedestination = '../uploads/'.$filenewname;
    			move_uploaded_file($filetmpname, $filedestination);

    			$sql = "insert into products (pname, pprice, pdescription, pbrands, pimage, manager, pstatus) 
 		            values ('$pname', '$pprice', '$pdescription', '$bname', '$filenewname', '$manager', '$pstatus');";
 		        mysqli_query($con, $sql);
 		        
 		        header("Location: ../madd.php?type=success");
 		        exit();    
    	
    	} else {
    		header("Location: ../madd.php?type=fileerror");
    	    exit();
    	}
    } else {

    	header("Location: ../madd.php?type=filetype");
    	exit();
    }


 } else {
 	header("Location ../index.php?type=invalidaccess");
 	exit();
 }
