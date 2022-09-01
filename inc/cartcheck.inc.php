<?php 

 if (isset($_POST['submit'])) {
  session_start();
  
  if (isset($_SESSION['cart'])) {
    
    $item_array_id = array_column($_SESSION['cart'], 'item_pid');
    if (!in_array($_GET['pid'], $item_array_id)) {
      
      $count = count($_SESSION['cart']);
      $item_array = array(
      'item_pid' => $_GET['pid'],
      'item_pname' => $_POST['hidden_pname'],
      'item_img' => $_POST['hidden_img'],
      'item_pprice' => $_POST['hidden_pprice'],
      'item_qty' => $_POST['qty'],
      'item_pbrand' => $_POST['hidden_pbrand'] 
    );
     $_SESSION['cart'][$count] = $item_array;  

    } else {
          header("Location: ../cart.php?item=alreadyadded");
          exit();
    }

  } else {

    $item_array = array(
      'item_pid' => $_GET['pid'],
      'item_pname' => $_POST['hidden_pname'],
      'item_img' => $_POST['hidden_img'],
      'item_pprice' => $_POST['hidden_pprice'],
      'item_qty' => $_POST['qty'],
      'item_pbrand' => $_POST['hidden_pbrand'] 
    );
    $_SESSION['cart'][0] = $item_array;
  }

   header("Location: ../cart.php");
   exit();
} else {
  header("Location: ../index.php?entry=invalid");
  exit();
}