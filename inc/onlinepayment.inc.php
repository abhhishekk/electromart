<?php


   if (isset($_POST['submit'])) {
   	
   	include "dbh.inc.php";
   	session_start();

   	$cardnum = $_POST['cardnum'];
   	$cardexp = $_POST['cardexp'];
   	$cardcvc = $_POST['cardcvc'];
   	$holdername = $_POST['holdername'];


     if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    include "dbh.inc.php";
    $grandtotal = 0;
 	foreach ($_SESSION['cart'] as $key => $value) {
 		
 		$pid = $value['item_pid'];
 		$pname = $value['item_pname'];
 		$pprice = $value['item_pprice'];
 		$pqty = $value['item_qty'];
 		$pbrand = $value['item_pbrand'];
 		$total = ($value['item_pprice'] * $value['item_qty']);
 		$user = $_SESSION['u_name'];
 		$orderdate = date('y-m-d');
 		$payment_type = 'online';
 		$res_status = 'waiting';

 		$grandtotal = $grandtotal + ($value['item_qty'] * $value['item_pprice']);        
        
            $run = "insert into orders (pid, pname, pprice, pbrand, qty, ordereduser, totalprice, ordered_date, payment_type, res_status) 
 		    values ('$pid', '$pname', '$pprice', '$pbrand', '$pqty', 
 	 	    '$user', '$total', '$orderdate', '$payment_type', '$res_status');";

 	 	     mysqli_query($con,$run);
            
 	 	    //header("Location: ../products.php?order=submitted");
        echo "<script>alert('Please wait, Your Transaction is being processing')</script>";
        echo "<script>window.location= '../orderplaced.php?order=submitted'</script>";
   
       }



 	echo "<pre>";
 	print_r($_SESSION);	

 	

 }


   }