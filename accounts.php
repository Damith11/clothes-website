<?php

include('./admin/includes/connect.php');
include('./function/common_function.php');
session_start();


if(isset($_GET['remove'])){
  $remove_id=$_GET['remove'];
  
  mysqli_query($con,"DELETE FROM `orders` WHERE order_id=$remove_id");
  header('location:accounts.php');   

}



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <!--=============== FLATICON ===============-->
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-rounded/css/uicons-regular-rounded.css'>
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-brands/css/uicons-brands.css'>

     <!--=============== SWIPER CSS ===============-->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"  />            
           
     <!--=============== CSS ===============-->
       <link rel="stylesheet" href="assets/css/styles.css" />     
       <link rel="stylesheet" href="assets/css/heder.css">
       <style>
        .user_profile{
          width: 125px;
          text-align: center;
          position: relative;
          left: 300px;
          border-radius: 65px;
          cursor: pointer;
        }

        .user_uplod_img{
          width: 103px;
          position: relative;
          left: 312px;
          top: -65px;
          opacity: 0;
          cursor: pointer;
        }

        .user_uplod_img:hover{
          opacity: 1;
        }
        .user_profile:hover{
          opacity: 0.5;
        }

        .order_count{
          color: hsl(176, 88%, 27%);
          text-align: center;
          margin: 10px;
        }

        .order_Zero_count{
          color: red;
          text-align: center;
          margin: 10px;
        }

        .icon_order{
          font-size: 20px;
          cursor: pointer;
        }

       </style>


    <title>Ecommerce Website-My Account</title>
  </head>
  <body>

    <!--=============== HEADER ===============-->
    <nav class="nav-bar ">

      <div class="nav-wapper nav_menu">

        <input type="radio" name="muenu" id="menu_btn" class="radio_btn">
       

        <label for="menu_btn" class="btns menu_btn">
          <i class="fi fi-rr-menu-burger"></i>
        </label>

          <a href="index.php" class="logo">
              <img src="assets/img/Black White Minimalist Logo.png" alt="" class="logo-img">
          </a>

      

          <ul class="links">

             <input type="radio" name="muenu" id="close_btn" class="radio_btn_close">
              <label for="close_btn" class="close_btn">
                <i class="fi fi-rr-cross-small"></i>
              </label>

              <li><a href="index.php" class="">Home</a></li>
              <li>
                  <a href="shop.php" class="hide">Shop</a>
                  <input type="checkbox" id="mega" class="mega_input" >
                  <label for="mega" class="mega_label">Shop</label>

                  <div class="megaMenu">
                      <div class="content">

                          <div class="row">
                              <img src="assets/img/p4.jpg" alt="">
                          </div>

                          <div class="row">
                              <header><a href="shop.php">Mens</a></header>
                              <ul class="megalinks">
                                  <li><a href="#">office</a></li>
                                  <li><a href="#">Wedding</a></li>
                                  <li><a href="#">Shoes</a></li>
                                  <li><a href="#">Watch</a></li>
                              </ul>
                          </div>

                          <div class="row">
                              <header><a href="">Women</a></header>
                              <ul class="megalinks">
                                  <li><a href="#">office</a></li>
                                  <li><a href="#">Wedding</a></li>
                                  <li><a href="#">Shoes</a></li>
                                  <li><a href="#">Watch</a></li>
                              </ul>
                          </div>

                          <div class="row">
                              <header><a href="">Kids</a></header>
                              <ul class="megalinks">
                                  <li><a href="#">Sport</a></li>
                                  <li><a href="#">Wedding</a></li>
                                  <li><a href="#">Shoes</a></li>
                                  <li><a href="#">Watch</a></li>
                              </ul>
                          </div>

                          <div class="row">
                              <header><a href="">Other</a></header>
                              <ul class="megalinks">
                                  <li><a href="#">Gift</a></li>
                                  <li><a href="#">Bags</a></li>
                                  <li><a href="#">Shoes</a></li>
                                  <li><a href="#">Toys</a></li>
                              </ul>
                          </div>

                      </div>
                  </div>

              </li>
              <?php

                if(isset($_SESSION['user_email'])){
                  echo "
                        <li><a href='accounts.php'>My Account</a></li>
                  ";
                }
                else{
                  echo "
                        <li><a href='sign_in_out.php'>Register</a></li>
                  ";
                }

                ?>
              <li><a href="contact.php">Contact</a></li>

              <li>
                <a href="about_us.php">About Us</a>
              </li>
          </ul>

          <div class="header_search">
              <input type="text" class="form_input" placeholder="Search for items....">

              <a href="" class="search_btn">
                <i class="fi fi-rs-search"></i>
              </a>
  
          </div>

          <div class="header-btn">

          <?php  
                if(!isset($_SESSION['user_email'])){
                  echo "
                        <a href='cart.php' class='header-action-btn'>
                          <i class='fi fi-rs-shopping-cart header_icon'></i>
                          <span class='count_one'>0</span>
                        </a>
                  ";

                }
                else{
                  $user_email=$_SESSION['user_email'];
                  $select_product=mysqli_query($con,"SELECT * FROM `cart` WHERE user_email='$user_email'");
                  $row_count=mysqli_num_rows($select_product);
                  echo"
                  <a href='cart.php' class='header-action-btn'>
                    <i class='fi fi-rs-shopping-cart header_icon'></i>
                    <span class='count_one'>$row_count</span>
                  </a>
                  ";
                }

                
                ?>                

              <?php  
                if(!isset($_SESSION['user_email'])){
                  echo "
                        <a href='wishlist.php' class='header-action-btn'>
                          <i class='fi fi-rs-heart header_icon'></i>
                          <span class='count'>0</span>
                        </a>
                  ";

                }
                else{
                  $user_email=$_SESSION['user_email'];
                  $select_product=mysqli_query($con,"SELECT * FROM `wishlist` WHERE user_email='$user_email'");
                  $row_count=mysqli_num_rows($select_product);
                  echo"
                        <a href='wishlist.php' class='header-action-btn'>
                          <i class='fi fi-rs-heart header_icon'></i>
                          <span class='count'>$row_count</span>
                        </a>
                  ";
                }

                
                ?>

<?php 
             if(isset($_SESSION['user_email'])){
              $user_email=$_SESSION['user_email'];
              $select_product=mysqli_query($con,"SELECT * FROM `user_table` WHERE user_email='$user_email'");
              
              $row_data=mysqli_fetch_assoc($select_product);
              $user_name=$row_data['username'];
              $user_img=$row_data['user_image'];


              echo"                  
                    <div class='profile'>
                      <i class='fi fi-rs-user header_icon'> </i>
                      <ul class='profile-link'>
                          <li><a href='' ><img src='./assets/img/signin/$user_img' class='user_img' alt=''></a></li>
                          <li><a href='accounts.php' class='user_details'><i class='fi fi-rs-user' ></i>$user_name</a></li>
                          
                          <li><a href='login_out.php' class='user_details'><i class='fi fi-rs-exit'></i>Log out</a></li>
                      </ul>
                    </div>
              ";
            }
            else{
                  
              echo"             
                     <div class='profile'>
                      <i class='fi fi-rs-user header_icon'> </i>
                      <ul class='profile-link'>
                          <li><a href='' ><img src='assets/img/avatar-1.jpg' class='user_img' alt=''></a></li>
                          <li><a href='#' class='user_details'><i class='fi fi-rs-user' ></i>User Name</a></li>
                          
                          <li><a href='sign_in_out.php' class='user_details'><i class='fi fi-rs-sign-in-alt'></i>Log in</a></li>
                      </ul>
                    </div>
               ";
  
            }
            
            
            ?>
  

          </div>

      </div>



    </nav>


    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb-list flex container">
          <li><a href="index.php" class="breadcrumb-link">Home</a></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">My Account</span></li>
        </ul>
      </section>

      <!--=============== ACCOUNTS ===============-->
      <section class="accounts section-lg">
        <div class="accounts-container container grid">
          <div class="account-tabs">

            <p class="account-tab active-tab" data-target="#dashboard">
              <i class="fi fi-rs-settings-sliders"></i> Dashboard
            </p>

            <p class="account-tab" data-target="#orders">
             
              <i class="fi fi-rs-shopping-bag"></i> Orders
              
            </p>

            <!-- <a href="accounts.php?my_orders"class="account-tab" >
            <i class="fi fi-rs-shopping-bag"></i> Orders
            </a> -->

            <p class="account-tab" data-target="#update-profile">
              <i class="fi fi-rs-user"></i> Update Profile
            </p>

            <!-- <p class="account-tab" data-target="#address">
              <i class="fi fi-rs-marker"></i> My Address
            </p> -->

            <p class="account-tab" data-target="#Change-password">
              <i class="fi fi-rs-user"></i> Delete Account
            </p>

            <a href="login_out.php" class="account-tab">
                <i class="fi fi-rs-exit"></i> Logout
            </a>

          </div>

          <div class="tabs-content">
            <div class="tab-content active-tab" content id="dashboard">
              <?php
              if(isset($_SESSION['user_email'])){
              $user_email=$_SESSION['user_email'];
              $user_details="SELECT * FROM `user_table` WHERE user_email='$user_email'";
              $result=mysqli_query($con,$user_details);
              $row=mysqli_fetch_assoc($result);
              $username=$row['username'];
              
              ?>
              <h3 class="tab-header">Hello <?php echo $username ?>!</h3>
                <?php } 
                else{
                    echo"
                  <h3 class='tab-header'>Hello!</h3>
                  ";
                }
                
                
                ?>
              <div class="tab-body">
                <p class="tab-description">
                 <?php get_user_order_details(); ?>
                </p>
              </div>
            </div>

            <?php
            if(!isset($_SESSION['user_email'])){

            }
            else{
            $user_email=$_SESSION['user_email'];
            $get_user="SELECT * FROM `user_table` WHERE user_email='$user_email'";
            $result=mysqli_query($con,$get_user);
            $row_fetch=mysqli_fetch_assoc($result);
            $user_id=$row_fetch['user_id'];
            }
            ?>

            <div class="tab-content" content id="orders">
              <h3 class="tab-header">Your Order</h3>

              <div class="tab-body">
                <table class="placed-order-table">
                  <tr>
                    <th>Product Name</th>

                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Payment Mode</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                  </tr>

                  <?php
                  
                  $get_order_details="SELECT * FROM `orders` WHERE user_id=$user_id";
                  $result_order=mysqli_query($con,$get_order_details);
                  while($row_order=mysqli_fetch_assoc($result_order)){
                    $order_id=$row_order['order_id'];
                    $product_title=$row_order['product_title'];
                    $date=$row_order['date'];
                    $quantity=$row_order['quantity'];
                    $price=$row_order['price'];
                    $payment_method=$row_order['payment_method'];
                   ?>
                   
                  
                          <tr>
                            <td><?php echo $product_title ?></td>
                            
                            <td><?php echo $quantity ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $payment_method ?></td>
                            <td><?php echo $date ?></td>
                            
                            
                            <td>
                              <!-- <a href='order_print.php?report=<?php echo $order_id ?>' class='view-order'><i class="fi fi-rs-file-download"></i></a> -->
                              <form method="GET" action="order_print.php">
                                  <input type="hidden" name="order_id" value="<?php echo $order_id ?>"> <!-- Replace with actual order ID -->
                                  <button type="submit" class="view-order"><i class="fi fi-rs-file-download icon_order"></i></button>
                              </form>

                             
                            </td> 
                            
                            <td>
                             
                              <a href='accounts.php?remove=<?php echo $order_id ?>' onclick="return confirm('Are you sure want to delete this Order Item?');" class='view-order'><i class="fi fi-rs-trash table-trash icon_order"></i></a>
                            </td> 
                            
                          </tr>
                        
                            
                       
                    <?php 
                  }

          
                  
                  ?>
                  

              

                </table>

              </div>

            </div>

            <div class="tab-content" content id="update-profile">
              <h3 class="tab-header">Update Profile</h3>

              <div class="tab-body">
             
                <form action="" class="form grid" method="post" enctype="multipart/form-data">
                <?php 
                
                $user_email=$_SESSION['user_email'];
                $user_details="SELECT * FROM `user_table` WHERE user_email='$user_email'";
                $result=mysqli_query($con,$user_details);
                $row=mysqli_fetch_assoc($result);
                $user_id=$row['user_id'];
                $user_img=$row['user_image'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];

                  
               if(isset($_POST['user_update'])){
                $update_id=$user_id;
                $username=$_POST['username'];
                $user_email=$_POST['user_email'];
                $user_address=$_POST['user_address'];
                $user_mobile=$_POST['user_mobile'];
                $user_img=$_FILES['user_image']['name'];
                $user_img_tmp=$_FILES['user_image']['tmp_name'];

                move_uploaded_file($user_img_tmp,"./assets/img/$user_img");

                $update_data="UPDATE `user_table` SET username='$username',user_email='$user_email',user_image='$user_img',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
                $update_result=mysqli_query($con,$update_data);
                if($update_result){
                  echo"<script>alert('update successfull')</script>";
                }

              }

            
                
                
                ?>
                  <img src="./assets/img/<?php echo $user_img ?>" class="user_profile" alt="">
             
                  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                  <input type="file" class="user_uplod_img" placeholder="Image" class="form-input" name="user_image">
                  <input type="text"  class="form-input" value="<?php echo $username ?>" name="username">
                  <input type="text" placeholder="Email" class="form-input" value="<?php echo $user_email ?>" name="user_email">
                  <input type="text" placeholder="Address" class="form-input" value="<?php echo $user_address ?>" name="user_address">
                  <input type="text" placeholder="Mobil" class="form-input" value="<?php echo $user_mobile ?>" name="user_mobile">

                  <div class="form-btn">
                    <input type="submit" value="Update" class="btn btn-md" name="user_update">
                    
                  </div>

                </form>
               <?php
             
               
               
               
               ?>
              </div>
              
            </div>

            <!-- <div class="tab-content" content id="address">
              <h3 class="tab-header">Shipping Address</h3>

              <div class="tab-body">
                <address class="address">
                  Temple Road <br>
                  Embulgaswewa <br>
                  kekirawa <br>
                  50100
                </address>
                <p class="city">Kandy</p>
                <a href="" class="edit">Edit</a>
              </div>

            </div> -->

            <div class="tab-content" content id="Change-password">
              <h3 class="tab-header">Deleting Account </h3>

              <div class="tab-body">
                <form action="" method="post" class="form grid">      

                  <div class="form-btn">
                    <input type="submit" value="Delete Account" name="delete" class="btn btn-md">
                  </div>

                  <div class="form-btn">
                    <input type="submit" value="Don't Delete Account" name="dont_delete" class="btn btn-md">
                  </div>

                </form>

                <?php
                  $user_email=$_SESSION['user_email'];
                  if(isset($_POST['delete'])){
                   
                  $delete_query="DELETE FROM `user_table` WHERE user_email='$user_email'";
                  $delete_result=mysqli_query($con,$delete_query);
                  if($delete_result){
                    session_destroy();
                    echo"<script>alert('Account Deleted Successfully')</script>";
                    echo"<script>window.open('index.php','_self')</script>";
                  }
                  }
                
                
                ?>
               
              </div>
              
            </div>

          </div>

        </div>
      </section>

      <!--=============== NEWSLETTER & FOOTER===============-->
      <?php include('./includes/footer.php') ?>
    
    <!--=============== SWIPER JS ===============-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>

  </body>
</html>
