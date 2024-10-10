<?php
include('includes/connect.php');
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




    <link rel="stylesheet" href="css/sign_in.css" />
    <title>Sign in & Sign up Form</title>

  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="" method="post" class="sign-in-form">

            <h2 class="title">Sign in</h2>

            <div class="input-login size_login">
               <i class="fi fi-ss-envelope"></i>
               <input type="email" placeholder="Email" name="admin_email" />
               
            </div>

            <div class="input-login size_login">
           
              <i class="fi fi-ss-lock"></i>
              <input type="password" placeholder="Password" name="admin_password"/>
            </div>
            
            <input type="submit" value="Login" class="btn solid" name="admin_login" />

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

          <form action="" method="post" id="form_reg" enctype="multipart/form-data" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="form_grid">

                    <div class="input-field size_input">
                      <i class="fi fi-ss-user"></i>
                      <input type="text" placeholder="Username" id="username" name="admin_name" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-envelope"></i>
                      <input type="email" placeholder="Email" id="useremail" name="admin_email" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Password" id="userpassword" name="admin_password" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Confirm Password" id="comfirmpass" name="admin_confirm_password"/>
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-ss-house-chimney"></i>
                      <input type="text" placeholder="Address" id="useraddress" name="admin_address" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field size_input">
                      <i class="fi fi-rr-smartphone"></i>
                      <input type="text" placeholder="Mobile" id="usermobile" name="admin_mobile" />
                      <p class="error"></p>
                    </div>

                    <div class="input-field reg_img">
                      <i class="fi fi-ss-cloud-upload-alt"></i>
                      <input type="file" name="admin_image" class="reg_img_input">
                    </div>

          </div>

            <input type="submit" class="btn" value="Sign up" name="admin_register"/>

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
            <h3>New Admin ?</h3>
            <p>
             Good day...!
             Are you a new admin?. So plese registered frist.... 
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/login.svg" class="image" alt="" />
        </div>
        
        <div class="panel right-panel">
          <div class="content">
            <h3>Are You Admin ?</h3>
            <p>
              Good day...! Are you an old admin? So please log in
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/re.svg" class="image" alt="" />
        </div>
      </div>
    </div>

   

    <?php
// Database connection



// User Registration
if (isset($_POST['admin_register'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_confirm_password = $_POST['admin_confirm_password'];
    $admin_address = $_POST['admin_address'];
    $admin_mobile = $_POST['admin_mobile'];
    $admin_image = $_FILES['admin_image']['name'];
    $temp_image = $_FILES['admin_image']['tmp_name'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

    // Check if adminname or email already exists
    $select_query = "SELECT * FROM `admin` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        echo "<script>alert('Username or Email already in use')</script>";
    } elseif ($admin_password != $admin_confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        move_uploaded_file($temp_image, "img/$admin_image");

        $insert_query = "INSERT INTO `admin` (admin_name,admin_email,admin_password,admin_image,admin_address,admin_mobile) 
                         VALUES ('$admin_name','$admin_email','$hash_password','$admin_image','$admin_address','$admin_mobile')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Registration successful')</script>";
            // echo "<script>window.open('login.php', '_self')</script>";
        }
    }
}

// User Login
if (isset($_POST['admin_login'])) {
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin` WHERE admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0 && password_verify($admin_password, $row_data['admin_password'])) {
        $_SESSION['admin_email'] = $admin_email; 

        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       
    } else {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
}
?>


 <script src="js/sign_in.js"></script>
  </body>
</html>
