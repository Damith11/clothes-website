<?php
 include('includes/connect.php');

    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];
        $delete_query=mysqli_query($con,"DELETE FROM `user_orders` WHERE order_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:all_order.php');
        }
        else{
            echo "Product not delect";
            header('location:all_order.php');
        }
    }


?>