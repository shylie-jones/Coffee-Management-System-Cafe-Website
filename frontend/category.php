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
?>
<!doctype html>
<html lang="en">
<html>
	<head>
    <title>Categories</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
    <style>
    body {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../images/blog-img2.png);
    }

    .card {
      color: brown;
      background: white;
      opacity: 0.8;
      text-align: center;
    }

    .card:hover {
      transform: scale(1.1);
      transition: .5s;
      background-color: lightblue;
      opacity: 0.6;
      color: white;

    }

    .card a {
      text-decoration: none;
      color: brown;

    }

    h1 {
      color: white;
    }
  </style>
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
<h1 class="text-center"><u>Categories</u></h1>
    <div class="row mt-5">
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="coffe.php">COFFEE
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="Tea.php">TEA
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="smooth.php">SMOOTHIE
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="past.php">PASTRIES
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="cook.php">COOKIES
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="ice.php">ICE-CREAM
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="brunch.php">BRUNCH
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="toast.php">TOAST
                  </a>
                </h4>
              </div>
            </div>
        </div>
          <div class="col-md-3 mt-5">
            <div class="card" style="width: 260px;">
              <div class="card-body" style="height: 200px; ">
                <h4 class="card-title mx-4 my-5" style="font-size: 2em;">
                  <a href="sand.php">SANDWICH
                  </a>
                </h4>
              </div>
            </div>
        </div>

      
    </div>
  </div>

<!-- card ends -->

<!-- footer starts -->
<?php 
  include('footer.php');
  ?>
  


<!-- footer ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>




  