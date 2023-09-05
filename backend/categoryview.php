<?php
session_start();
include('../frontend/config.php');

$con= new mysqli('localhost','root','','db_shopping_cart');

if (isset($_POST['save'])) {
    $cname = $_POST['cname'];
    $ccode = $_POST['ccode'];

 
    $query = "INSERT INTO category (cname, ccode) VALUES ('$cname', '$ccode')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Category added successfully!";
        header('Location: managecategory.php');
    } else {
        $_SESSION['status'] = "Failed to add category";
        header('Location: managecategory.php');
    }
}
?>


<!-- update category -->

 <?php
session_start();
include('../db/dbconfig.php');

if (isset($_POST['update'])) {
    $edit_id = $_POST['edited_id'];
    $cname = $_POST['cname'];
    $ccode = $_POST['ccode'];

    $db = new mysqli('localhost', 'root', '', 'ecafe');
    $query = "UPDATE category SET cname='$cname', ccode='$ccode' WHERE cid='$edit_id'";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        $_SESSION['success'] = "Category updated successfully!";
        header('Location: managecategory.php');
    } else {
        $_SESSION['status'] = "Failed to update category";
        header('Location: managecategory.php');
    }
}


?> 






<!-- update ends -->


<!-- delete category -->
<?php
// session_start();
include('../db/dbconfig.php');

if (isset($_POST['data_delete'])) {
    $delete_id = $_POST['delete_id'];

    $db = new mysqli('localhost', 'root', '', 'ecafe');
    $query = "DELETE FROM category WHERE cid='$delete_id'";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        $_SESSION['success'] = "Category deleted successfully!";
        header('Location: managecategory.php');
    } else {
        $_SESSION['status'] = "Failed to delete category";
        header('Location: managecategory.php');
    }
}
?>

