<?php
 include('includes/connect.php');

    if(isset($_GET['delete_brand'])){
        $delete_id=$_GET['delete_brand'];
        $delete_query=mysqli_query($con,"DELETE FROM `brands` WHERE brand_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:view_brand.php');
        }
        else{
            echo "Product not delect";
            header('location:view_brand.php');
        }
    }


?>