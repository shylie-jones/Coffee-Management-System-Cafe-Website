<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Product</title>
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
     include('../frontend/dashboard.php');

  ?>

    <div class="modal fade" id="demo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="categoryview.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">

      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="cname" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Category Code</label>
        <input type="text" name="ccode" class="form-control" required>
      </div>
       
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">
    <?php
      if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
        echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);
      }
         if(isset($_SESSION['status']) && $_SESSION['status']!=''){
            echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
         }

?>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#demo">
    Add Category
</button>
</div>

<div class="table-responsive">
    <?php
        $con= new mysqli('localhost','root','','db_shopping_cart');
        $query = "SELECT * FROM category";
        $query_run = mysqli_query($con, $query);

   ?>
    <table class="table table-bordered" id="dataTable" width="70%" cellspacing="0">
    <thead>   
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Code</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
           if(mysqli_num_rows($query_run) > 0){
               while($row = mysqli_fetch_assoc($query_run)){
           
        ?>
        <tr>
        <td> <?php echo $row['cid'] ?></td>
        <td> <?php echo $row['cname'] ?></td>
        <td> <?php echo $row['ccode'] ?></td>
          <td>
        <form action="editcategory.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['cid'] ?>">
            <button type="submit" name="data_edit" class="btn btn-info">EDIT</button>
               </form>
        </td>
        <td>
        <form action="categoryview.php" method="post">
            <input type="hidden" name="delete_id" value="<?php echo $row['cid'] ?>">
            <button type="submit" name="data_delete" class="btn btn-danger">DELETE</button>
               </form>

        </td>
        </tr>
        <?php
               }
            }else{
                echo "No record found";
            }  
            ?>
    </tbody>
    
    </table>
</div>



  </body>
</html>