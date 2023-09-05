<?php

session_start();
include('../frontend/config.php');

$con= new mysqli('localhost','root','','db_shopping_cart');

if(isset($_POST['save'])){

    $pname= $_POST['pname'];
    $cname= $_POST['cname'];
    $price= $_POST['price'];
    $image= $_FILES['image']['name'];

    if(file_exists("upload/" . $_FILES["image"]["name"]))
    {
        $store = $_FILES["image"]["name"];
        $_SESSION['status'] = "Image already exists.'.$store.'";
        header('location: manageproduct.php');
    }else{
        $query = "INSERT INTO products (p_name,c_name,price,image) 
        VALUES ('$pname','$cname','$price','$image')";

        $query_run = mysqli_query($con,$query);

        if($query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES["image"]["name"]);

            $_SESSION['success'] = "Product Added successfully";
            header('location: manageproduct.php');

        }else{
            $_SESSION['success'] = "Product Added Failed";
            header('location: manageproduct.php');

        }
    }

}

// update product
if(isset($_POST['update'])){
    $id= $_POST['edited_id'];
    $pname= $_POST['pname'];
    $cname= $_POST['cname'];
    $image= $_FILES['image']['name'];
    $price= $_POST['price'];

    
 $query = "UPDATE products SET p_name= '$pname', c_name = '$cname', image= '$image',price= '$price' WHERE id='$id'";
 $query_run = mysqli_query($con, $query);

 if($query_run) 
 {
          

    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES['image']['name']);
    $_SESSION['success'] ="DATA Updated";
    header('location: manageproduct.php');

}else{
    $_SESSION['success'] ="Data not updated";
    header('location:manageproduct.php');
 }
};


//  delete product
if(isset($_POST['data_delete'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM products WHERE id='$id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){

        $_SESSION['success'] = "DATA deleted";
        header('location:manageproduct.php');
    }else{

        $_SESSION['success'] = "DATA not deleted";
        header('location:manageproduct.php');
    }
}


?>