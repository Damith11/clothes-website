<?php
include('./admin/includes/connect.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script> -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-brands/css/uicons-brands.css'>

    <link rel="stylesheet" href="assets/css/sign_in.css" />
    <title>Sign in & Sign up Form</title>
    <style>
      .input-field .error{
        margin-left: 55px;
        color: #ff3860;
        font-size: 0.8rem;
      }

      .input-field.success{
        border: 1px solid green;
      }
      .input-field.error{
        border: 1px solid #ff3860 ;
      }

      .input-login{
        background-color: #f0f0f0;
        margin: 10px 0 30px;
        height: 55px;
        border-radius: 55px;
        padding: 0 0.4rem;
        position: relative;
      }

      .input-login input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 55px;
            color: #333;
            position: relative;
            top: 0;
            left: 36px;
            width: 230px;
        }

        
        .input-login i {
            text-align: center;
            line-height: 55px;
            color: #acacac;
            transition: 0.5s;
            font-size: 1.1rem;
            position: relative;
            top: 3px;
            left: 20px;
        }

      .size_login{
        max-width: 345px;
        width: 100%;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="#" method="post" id="form" class="sign-in-form">

            <h2 class="title">Sign in</h2>

            <div class="input-login size_login">
               <i class="fi fi-ss-envelope"></i>
               <input type="email" placeholder="Email" id="email" name="user_email" />
               <p class="error"></p>
            </div>

            <div class="input-login size_login">
              
              <i class="fi fi-ss-lock"></i>
              <input type="password" placeholder="Password" id="password" name="user_password"/>
              <p class="error"></p>
            </div>
            
            <input type="submit" value="Login" class="btn solid" name="user_login" />

            <p class="social-text">Or Sign in with social platforms</p>

            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fi fi-brands-facebook"></i>
              </a>

              <a href="#" class="social-icon">
                <i class="fi fi-brands-twitter-alt-circle"></i>
              </a>

              <a href="#" class="social-icon">
                <i class="fi fi-brands-google"></i>
              </a>

              <a href="#" class="social-icon">
                <i class="fi fi-brands-linkedin"></i>
              </a>
            </div>

          </form>




          <!-- -==============================-------------------- -->

          <form action="#" method="post" id="form_reg" enctype="multipart/form-data" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="form_grid">

                    <div class="input-field size_input">
                      <i class="fi fi-ss-user"></i>
                      <input type="text" placeholder="Username" id="username"  name="user_username" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-envelope"></i>
                      <input type="email" placeholder="Email" id="useremail" name="user_email" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Password" id="userpassword"  name="user_password" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Confirm Password" id="comfirmpass" name="user_confirm_password"/>
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-house-chimney"></i>
                      <input type="text" placeholder="Address" id="useraddress" name="user_address" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-rr-smartphone"></i>
                      <input type="text" placeholder="Mobile" id="usermobile" name="user_mobile" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field reg_img">
                      <i class="fi fi-ss-cloud-upload-alt"></i>
                      <input type="file" name="user_image" id="userimage" class="reg_img_input">
                      <p class="error"></p>
                    </div>

          </div>

            <input type="submit" class="btn" value="Sign up" name="user_register"/>

            <p class="social-text">Or Sign up with social platforms</p>

            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fi fi-brands-facebook"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fi fi-brands-twitter-alt-circle"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fi fi-brands-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fi fi-brands-linkedin"></i>
              </a>
            </div>

          </form>

          
        </div>
      </div>

      <div class="panels-container">

        <div class="panel left-panel">
          <div class="content">
            <h3>New User ?</h3>
            <p>
              If you are a new customer 
              Please register frist.....!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="assets/img/signin/login.svg" class="image" alt="" />
        </div>
        
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Log in if you are already our customer....!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="assets/img/signin/re.svg" class="image" alt="" />
        </div>
      </div>
    </div>

  

    <?php
// Database connection



// User Registration
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_confirm_password = $_POST['user_confirm_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $temp_image = $_FILES['user_image']['tmp_name'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        echo "<script>alert('Username or Email already in use')</script>";
    } elseif ($user_password != $user_confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        move_uploaded_file($temp_image, "./assets/img/signin/$user_image");

        $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_address, user_mobile) 
                         VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_address', '$user_mobile')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Registration successful')</script>";
            // echo "<script>window.open('login.php', '_self')</script>";
        }
    }
}

// User Login
if (isset($_POST['user_login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0 && password_verify($user_password, $row_data['user_password'])) {
        $_SESSION['user_email'] = $user_email;

        // Check if user has items in the cart
        $select_query_cart = "SELECT * FROM `cart` WHERE user_email='$user_email'";
        $select_cart = mysqli_query($con, $select_query_cart);
        $row_count_cart = mysqli_num_rows($select_cart);

        echo "<script>alert('Login successful')</script>";
        if ($row_count_cart == 0) {
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>window.open('index.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
}
?>

<script src="assets/js/sign_in.js"></script>

  </body>
</html>
