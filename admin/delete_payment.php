<?php
 include('includes/connect.php');

    if(isset($_GET['delete_payment'])){
        $delete_id=$_GET['delete_payment'];
        $delete_query=mysqli_query($con,"DELETE FROM `payment_order` WHERE pay_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:all_payment.php');
        }
        else{
            echo "Product not delect";
            header('location:all_payment.php');
        }
    }


?>