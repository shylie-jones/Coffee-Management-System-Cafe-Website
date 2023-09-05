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
<html>
	<head>
        <title>Products</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
		<?php include "navbar.php"; ?>

<div class="container py-5">
<h1 class="text-center"><u>Menus of Eternal Cafe </u></h1>
  <div class="row mt-5">
 <?php
      
      include('./config.php');

      $query = "SELECT * FROM products";
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
                <h4 class="card-title "><?php echo $row['p_name']; ?></h4>
                <p class="card-text">Price:$<?php echo $row['price']; ?>
                </p>
                  <!-- <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-success mx-5" style="text-decoration:none;">VIEW DETAILS</a> -->
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
<?php include('./footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 