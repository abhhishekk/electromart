<?php
 session_start();

 if(!isset($_SESSION['u_name'])){
 header("location: login.php"); 
}
include "inc/dbh.inc.php";
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <title>Electromart</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://kit.fontawesome.com/041a644664.js" crossorigin="anonymous"></script>
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
      <li class="nav-item pr-1">
        <form method="POST" class="form-inline mt-1" action="search.php">
          <input type="text" name="search" placeholder="search" class="form-control mr-1">
            <button class="btn btn-light btn-outline-success btn-md" name="submit-search"><i class="fas fa-search"></i>
            </button>
        </form>
      </li>

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            <?php echo $_SESSION['u_name']; ?>
          </span>
          <?php
            $img = $_SESSION['u_name'];
            $avatar = "select profile from customers where username = '$img';";
            $result = mysqli_query($con, $avatar);
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <img class="img-profile rounded-circle" src="<?php echo $row['profile']; ?>" style="height: 2rem; width: 2rem;">
        </a>
        <?php } ?>
         <!-- Dropdown - Customer Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="userprofile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
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

    <!--jumbotron code-->
 <div class="jumbotron text-center">
   <h1>Your Search Results Is Here</h1>
 </div>
 <!--jumbotron code-->
   
 <!--cart-->
  <div class="container">  
   <div class="row">
<?php
if (isset($_POST['submit-search']) or ($_GET['search'])){
$search = $_POST['search'];
$sql = "select * from products where pname like '%$search%' or pdescription like '%$search%';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
if ($resultcheck > 0) {
while ($row = mysqli_fetch_assoc($result)) {
?>
      
       <div class="col-md-3 pb-3">
        <form method="POST" action="inc/cartcheck.inc.php?pid=<?php echo $row['pid']; ?>">
         <div class="card">
           <img class="card-img-top img-fluid" style="height:300px;" src="uploads/<?php echo $row['pimage']; ?>" alt="pimage">
           <div class="card-body text-center">
           <h4 class="card-title" style="font-size:20px;"><?php echo $row['pname']; ?></h4>
           <h6 class="card-text">&#8377; <?php echo $row['pprice']; ?></h6>
           <p class="card-text" style="font-size: 14px;"><?php echo $row['pdescription']; ?></p>
           <p style="font-size: 15px;">Quantity: <select name="qty">
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>9</option>
             <option>10</option>
           </select></p>
           <input type="hidden" name="hidden_pname" value="<?php echo $row['pname'] ?>">
           <input type="hidden" name="hidden_pprice" value="<?php echo $row['pprice'] ?>">
           <input type="hidden" name="hidden_pbrand" value="<?php echo $row['pbrands'] ?>">
           <button class="btn btn-success" name="submit"><i class="fa fa-cart-plus"></i> Add To Cart</button>
          </div>
         </div> 
        </form> 
       </div>
<?php
}
} else {
echo "<script>alert('There is no result for your search query')</script>";
echo "<script>window.location='products.php'</script>";
}
}
?>       
    </div>
  </div>
<!--cart-->


  <?php
   include "footer.php";
  ?>