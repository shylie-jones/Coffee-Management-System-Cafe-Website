<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>

  <?php

     session_start();
     include('../frontend/config.php');

  ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>

                  
            <div class="card-body">

            <?php
                   $con= new mysqli('localhost','root','','db_shopping_cart');
                    if(isset($_POST['data_edit'])){
                        $id=$_POST['edit_id'];

                        $query = "SELECT * FROM products WHERE id='$id' ";
                        $query_run = mysqli_query($con, $query);

                        foreach($query_run as $row){
                            ?>
                    
                    <form action="productview.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="edited_id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="pname" value="<?php echo $row['p_name']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cname" value="<?php echo $row['c_name'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Updated Image</label>
                        <input type="file" name="image" id="p_image" value="<?php echo $row['image']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price </label>
                        <input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <a href="manageproduct.php"><button type="button" class="btn btn-secondary">CANCEL</button></a>
                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                    </div>

                    </form>
                    
           
              
                    <?php
                        }
                    }
                    ?>
                    

            </div>
        </div>
    </div>


  </body>
</html>