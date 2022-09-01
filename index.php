<?php
 include 'header.php';
 include 'inc/dbh.inc.php';
?>
     
    
     <div id="home">
     	<div class="landingtxt">
     		<h1>Welcome to Electromart</h1>
     		<a class="btn btn-default btn-lg" href="login.php"> Order Now</a>
     	</div>
     </div>
     <!--end Landing-->

     
     <!--grid-->
      <div id="grid">
      	<div class="container-fluid">
           <h3>Exclusive Products</h3>
      		<div class="row justify-content-center pt-2 pb-5">
            <?php
              $sql = "select * from products order by pid desc limit 9;";
              $result = mysqli_query($con, $sql);
              $resultcheck = mysqli_num_rows($result);
              if ($resultcheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
             ?>
      			<div class="col-lg-4 col-md-4 col-sm-12">
      				<div class="card text-center">  
               <img class="card-img-top img-fluid" style="height:300px;" src="uploads/<?php echo $row['pimage']; ?>" alt="product image">  
                      <div class="card-body">
                        <h4 class="card-title"><?php echo $row['pname']; ?></h4>
                         <p class="card-text"><?php echo $row['pdescription']; ?></p>
                         <a href="login.php" class="btn btn-default"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                      </div>
       			    </div>
      		    </div>
      		   <?php
                }
              } else {
                echo " <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/anton-porsche-4nHpGXcgq7I-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>
              <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/brooke-lark-HlNcigvUi4Q-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>
              <div class='col-lg-4 col-md-4 col-12 text-center'>
              <div class='card' style='width:400px'>
                      <img class='card-img-top img-responsive' src='images/brooke-lark-4j059aGa5s4-unsplash.jpg' alt='Card image'>
                      <div class='card-body'>
                        <h4 class='card-title'>Sample</h4>
                         <p class='card-text'>Some example text.</p>
                         <a href='login.php' class='btn btn-default'><i class='fas fa-shopping-cart'></i> Buy Now</a>
                      </div>
                </div>
              </div>";
              }
             ?>

      	    </div>
         </div>
     </div>
     <!--end grid-->

      <!--contact-->
      <div id="contact">
      	<div class="con text-center p-4">
      		<p>Contact Us</p>
      	</div>
      	<div class="contact">
      		<form method="POST" action="inc/contact.inc.php">
      			<div class="form-group">
      				<label>Username</label>
      				<input type="text" name="name" autocomplete="off" class="form-control">
      			</div>
      			<div class="form-group">
      				<label>Email Id</label>
      				<input type="text" name="email" autocomplete="off" class="form-control">
      			</div>
      			<div class="form-group">
      				<label>Text</label>
      				<textarea class="form-control" name="txt"></textarea>
      			</div>
      			<button class="btn btn-default btn-md" name="submit">Submit</button>
      		</form>
      	</div>
      </div>
      <!--end contact-->
      
<?php
 include 'footer.php';
?>