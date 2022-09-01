<?php

 $dbservername = "localhost"; //database servername
 $dbusername = "root"; //database username
 $dbpassword = ""; //database password
 $dbname = "electromart"; //database name

 $con = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    if (!$con) {
    	echo "problem in database connection";
    	exit();
    } /*else {
    	echo "database connected succesfully";
    }*/
    
 