<?php
 include('includes/connect.php');

    if(isset($_GET['delete_user'])){
        $delete_id=$_GET['delete_user'];
        $delete_query=mysqli_query($con,"DELETE FROM `user_table` WHERE user_id=$delete_id")
        or die("Query Failed");

        if($delete_query){
            header('location:user_list.php');
        }
        else{
            echo "Product not delect";
            header('location:user_list.php');
        }
    }


?>