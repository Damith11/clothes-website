<?php
 include('includes/connect.php');

    if(isset($_GET['delete_categories'])){
        $delete_id=$_GET['delete_categories'];
        $delete_query=mysqli_query($con,"DELETE FROM `categories` WHERE category_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:view_categories.php');
        }
        else{
            echo "Product not delect";
            header('location:view_categories.php');
        }
    }


?>