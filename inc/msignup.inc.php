<?php

  if (isset($_POST['submit'])) {
  	
                      include "dbh.inc.php";
                      $bname = mysqli_real_escape_string($con, $_POST['bname']);
                      $uname = mysqli_real_escape_string($con,$_POST['uname']);
                      $email = mysqli_real_escape_string($con,$_POST['email']);
                      $contact = mysqli_real_escape_string($con,$_POST['contact']);
                      $pwd = mysqli_real_escape_string($con,$_POST['pwd']);
                      $status = $_POST['status'];

                      if ( empty($bname) || empty($uname) || empty($email) || empty($contact) || empty($pwd) )
                      {
                        header("Location: ../msignup.php?msignup=empty");
                        exit();

                      } 
                      elseif (!preg_match("/^[a-zA-Z ]*$/",$bname)) {
                        header("Location: ../msignup.php?msignup=char");
                        exit();

                      } 

                      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      	header("Location: ../msignup.php?msignup=email");
                        exit();

                      } 
                      else {
                   
                       $sql = "select * from brands where buname = '$uname';";
                       $result = mysqli_query($con, $sql);
                       $resultcheck = mysqli_num_rows($result);

                       if ($resultcheck > 0) {
                   	     header("Location: ../msignup.php?msignup=user");
                   	     exit();

                      } 

                      else {

                       $run = "select * from brands where bemail = '$email';";
                       $result = mysqli_query($con, $run);
                       $resultcheck = mysqli_num_rows($result);

                       if ($resultcheck > 0) {
                        header("Location: ../msignup.php?msignup=checkemail");
                        exit();

                       } 
                       elseif (!filter_var($contact, FILTER_VALIDATE_INT)) {
                        header("Location: ../msignup.php?msignup=contact");
                        exit();

                       } else { 

                        $sql = "select bcontactno from brands where bcontactno='$contact';";
                        $result = mysqli_query($con, $sql);
                        $resultcheck = mysqli_num_rows($result);

                        if ($resultcheck > 0) {
                        header("Location: ../msignup.php?msignup=contact-alreadyexists");
                        exit();

                        } elseif (!preg_match("/^[6-9][0-9]{9}$/", $contact)) {
                          header("Location: ../msignup.php?msignup=invalidcontact");
                           exit();
                        }   
                        else {

                          $insert = "insert into brands (bname, buname, bemail, bcontactno, bpwd, status) values ('$bname', '$uname', '$email', '$contact', '$pwd', '$status');";
                             mysqli_query($con, $insert);

                             header("Location: ../mlogin.php?msignup=success");
                             exit();
                        }

                      }
                    }
                    }

   } else {
  	header("Location: ../index.php?msignup=invalidaccess");
  	exit();
  }