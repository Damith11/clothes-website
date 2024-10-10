<?php
 include('includes/connect.php');

    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $delete_query=mysqli_query($con,"DELETE FROM `product` WHERE product_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:view_product.php');
        }
        else{
            echo "Product not delect";
            header('location:view_product.php');
        }
    }


?>