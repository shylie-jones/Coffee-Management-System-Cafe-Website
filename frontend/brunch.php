<?php 
	include "config.php";
	session_start();
	  
	include "cart.class.php";
	$cart=new Cart();
  
	$data=[];
	$sql="select * from products";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$data[]=$row;
		}
	}
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brunch</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info ">
<div class='container'>
  <a class="navbar-brand" href="index.php">Eternal Cafe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="index.php">Products</a>
      <a class="nav-item nav-link" href="./category.php">categories</a>
      <a class="nav-item nav-link" href="view_cart.php">Cart (<?php echo $cart->get_cart_count();?>)</a>
      <a href="./frontend/logout.php" class="nav-item nav-link">Logout</a>
    </div>
    
  </div>
  </div>
</nav>
<!-- navbar ends -->


<!-- card starts -->

<div class="container py-5">
  <div class="row mt-5">

  <h1 class="text-center">BRUNCH </h1><hr>
  <?php
      
      include('./config.php');

      $query = "SELECT * FROM products WHERE c_name like 'brunch%'";
      $query_run = mysqli_query($con,$query);
      $result = mysqli_num_rows($query_run)>0;

      if($result){
        while ($row=mysqli_fetch_assoc($query_run))
         {
           ?>
           <div class="col-md-3 mt-3">
            <div class="card">
              <!-- image start-->
              <img src="../backend/upload/<?php echo $row['image']; ?>" alt="Product Image" width="260px" height="250px">
              <div class="card-body">
                <h4 class="card-title mx-2"><?php echo $row['p_name']; ?></h4>
                <p class="card-text">>Price:$<?php echo $row['price']; ?>
                 </p>
                 <a href="view_details.php?id=<?php echo $row['id']; ?>" class="btn btn-success mx-5" style="text-decoration:none;">VIEW DETAILS</a>
              </div>
            </div>
           </div>
           <?php
      }
    }
    else{
      echo "No Product Found";
    }

?>
  </div>
</div>

<!-- card ends -->

<!-- footer starts -->
<!-- <?php 
  include('footer.php');
  ?> -->
  
<!-- footer ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>