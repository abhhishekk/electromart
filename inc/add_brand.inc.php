<?php

 if (isset($_POST['submit'])) {
 	include "dbh.inc.php";
 	
 	$bname = $_POST['bname'];
 	$bemail = $_POST['bemail'];
 	$bplace = $_POST['bplace'];
 	$bcontact = $_POST['bcontact'];
 	$baddress = $_POST['baddress'];


    if (empty($bname) || empty($bemail) || empty($bplace) || empty($bcontact) || empty($baddress)) {

    	header("Location: ../mindex.php?type=empty");
    	exit();
    	
    } else {

    	if (!filter_var($bemail, FILTER_VALIDATE_EMAIL)) {
    		
    		header("Location: ../mindex.php?type=invalidemail");
    	    exit();

    	} else {

    		$insert = "insert into brands (bname, bemail, bplace, bcontactno, baddress) 
 		values ('$bname', '$bemail', '$bplace', '$bcontact', '$baddress');";

 		mysqli_query($con, $insert);

 		header("Location: ../mindex.php?type=success");
    	exit();
    	}
    }

 } else {
 	header("Location: ../index.php?type=invalidacces");
 	exit();
 }