<?php
include('./admin/includes/connect.php');


?>




<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Damith's Food Hub - Registration Page</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <style>
    .form-container form .flex .col{
      display: grid;
      grid-template-columns: 265px 265px;
      gap: 0 5rem;
    }
  </style>
</head>
<body>
  <!-- Your form here -->
 

  <div class="form-container">
    <form action="" method="post" enctype="multipart/form-data" class="register">
      <h3>Register Now</h3>
      <div class="flex">
        <div class="col">

          <div class="input-field">
            <p>Your Name <span>*</span></p>
            <input type="text" name="user_username" placeholder="Enter your name.." maxlength="50" required class="box">
          </div>

          <div class="input-field">
            <p>Your Email <span>*</span></p>
            <input type="text" name="user_email" placeholder="Enter your email.." maxlength="50" required class="box">
          </div>

          <div class="input-field">
            <p>Your Password <span>*</span></p>
            <input type="text" name="user_password" placeholder="Enter your password.." maxlength="50" required class="box">
          </div>

          <div class="input-field">
            <p>Confrim Password <span>*</span></p>
            <input type="text" name="user_confirm_password" placeholder="Retype your password.." maxlength="50" required class="box">
          </div>

          <div class="input-field">
            <p>Your Address <span>*</span></p>
            <input type="text" name="user_address" placeholder="Enter your Address.." maxlength="50" required class="box">
          </div>

          <div class="input-field">
            <p>Your Mobile <span>*</span></p>
            <input type="text" name="user_mobile" placeholder="Enter your Mobile.." maxlength="50" required class="box">
          </div>

        </div>
      </div>
          <div class="input-field">
            <p>Your Profile <span>*</span></p>
            <input type="file" name="user_image" accept="image/*" required class="box_with">
          </div>

          <input type="submit" name="user_register" value="register" class="btn">

          <p class="link">already have an account? <a href="login.php"> Login Now </p>
    </form>

  </div>

    <?php 
    
    if(isset($_POST['user_register'])){
      $user_username=$_POST['user_username'];
      $user_email=$_POST['user_email'];
      $user_password=$_POST['user_password'];
      $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
      $user_confirm_password=$_POST['user_confirm_password'];
      $user_address=$_POST['user_address'];
      $user_mobile=$_POST['user_mobile'];

      $user_image=$_FILES['user_image']['name'];
      $temp_image=$_FILES['user_image']['tmp_name'];


      $select_query="SELECT * FROM `user_table` WHERE username='$user_username' or user_email='$user_email'";
      $result=mysqli_query($con,$select_query);
      $row_count=mysqli_num_rows($result);
      if($row_count>0){
        echo "<script>alert('User name already use')</script> ";
      }
      elseif($user_password!=$user_confirm_password){
        echo "<script>alert(' password is not match')</script> ";
      }

      else{

        move_uploaded_file($temp_image,"../img/signin/$user_image");

      $insert_query="INSERT INTO `user_table` (username,user_email,user_password,user_image,user_address,user_mobile) VALUE ('$user_username','$user_email','$hash_password','$user_image','$user_address','$user_mobile')";
      $sql_execute=mysqli_query($con,$insert_query);

      if($sql_execute){
        echo "<script>alert('Register sucessfull')</script> ";
      }

    }


    // $select_cart_items="SELECT * FROM `cart` WHERE user_email='$user_email'";

    // $result_cart=mysqli_query($con,$select_cart_items);
    // $row_count=mysqli_num_rows($result_cart);
    // if($row_count>0){
    //   $_SESSION['user_email']=$user_email;
    //   echo "<script>alert('you have item in your cart')</script> ";
    //   echo "<script>window.open('checkout.php','_self')</script> ";
    // }
    // else{
    //   echo "<script>window.open('index.php','_self')</script> ";
    // }


  }
    
    
    
     
    
    
    ?>



  
<!-- Sweetalert cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- costom js link -->
 <script src="..js/script.js"></script>


</body>
</html>