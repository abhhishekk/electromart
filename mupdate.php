<?php
session_start();
include "inc/dbh.inc.php";
if(!isset($_SESSION['u_name'])){
header("location: mlogin.php");
exit();
}
?>
<?php
if (isset($_POST['submit'])) {
$pname = $_POST['pname'];
$pprice = $_POST['pprice'];
$pdescription = $_POST['pdescription'];
$pid = $_GET['id'];

if (empty($pname) || empty($pprice) || empty($pdescription)){
echo "<script>alert('empty fields')</script>";
} elseif (!filter_var($pprice, FILTER_VALIDATE_INT)) {
echo "<script>alert('invalid price')</script>";
} else {
$update = "update products set pname='$pname', pprice='$pprice', pdescription='$pdescription' where pid='$pid';";
mysqli_query($con, $update);
header("Location: medit.php?edit=success");
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <title>Electromart</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <!--navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Electromart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#contact">Contact Us</a>
      </li>
       
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            <?php echo $_SESSION['u_name']; ?>
          </span>
          <img class="img-profile rounded-circle" src="images/bm.png" style="height: 2rem; width: 2rem;">
        </a>
         <!-- Dropdown - Customer Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
      </li>
    </ul>
  </div>
</nav>
    <!--end navigation-->

 <!--logout model-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below to end your current session</div>

        <form method="POST" action="inc/logout.inc.php">
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger" name="submit">Logout</button>
        </div>
      </form>

      </div>
    </div>
  </div>
 <!--logout model-->

<div class="jumbotron">
 <?php
   $brand = $_SESSION['u_name'];
    $check = "select bname from brands where buname='$brand';";
     $result = mysqli_query($con, $check);
      $resultcheck = mysqli_num_rows($result);
     if ($resultcheck > 0) {
      while ( $row = mysqli_fetch_assoc($result)) {
      $_SESSION['bname'] = $row['bname'];          
    }
   }
 ?>
  <h1 style="font-size: 63px;">Hello <?php echo $_SESSION['bname']; ?>!</h1> 
	<p class="pt-3" style="font-size: 23px;">Manage Your Control Panel From Here</p>
</div>
  <div class="container">
   	<div class="row">
   	  <div class="col-md-4 ">
            <div class="mylist list-group">
              <a href="liveorders.php" class="list-group-item">New Orders</a>
              <a href="mview.php" class="list-group-item ">View Products</a>
              <a href="madd.php" class="list-group-item ">Add Products</a>
              <a href="medit.php" class="list-group-item active">Edit Products</a>
              <a href="mdelete.php" class="list-group-item ">Delete Products</a>
              <a href="delivperson.php" class="list-group-item ">Delivery Personnels</a>
            </div>    
      </div>

       <div class="col-md-8 pt-1 pb-3">
           <legend style="border: 1px solid black; border-radius: 6px; color: black; font-size: 20px; font-weight: 500; margin: 0 auto; background-color: #FAFAFA;" class="pl-3 pr-3 pb-3">

            <center style="text-transform: uppercase; font-size: 30px;">Update Products</center>
            <br>
          
                <?php
               	 $pid = $_GET['id'];
                 $sql = "select * from products where pid='$pid';";
                 $result = mysqli_query($con, $sql);
                 $resultcheck = mysqli_num_rows($result);
                 
                 if ($resultcheck > 0) {
                 	while ($row = mysqli_fetch_assoc($result)) {
               	?>
               <form method="POST">
               	<div class="form-group">
                <label>Product Name</label>
                <input type="text" name="pname" autocomplete="off" placeholder="Product Name" class="form-control" value="<?php echo $row['pname']; ?>">   
                </div>
                <div class="form-group">
                <label>Product Price</label>
                <input type="text" name="pprice" autocomplete="off" placeholder="Price" class="form-control" value="<?php echo $row['pprice']; ?>">
                </div>
                <div class="form-group">
                <label>Product Description</label>
                <input class="form-control" name="pdescription" placeholder="Description" value="<?php echo $row['pdescription']; ?>">
                </div>
                <?php } } ?>
                <button class="btn btn-success" name="submit">Update</button>
               </form>  

           </legend>
     </div>
   </div>
  </div>


         


<?php
 include 'footer.php';
?>