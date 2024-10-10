<?php

include('./admin/includes/connect.php');
include('./function/common_function.php');
session_start();

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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
      />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/heder.css">
    <style>
      .Error_msg{
        color: red;
        text-align: center;
        position: absolute;
        right: 420px;
        margin: 20px;

      }
      .pagination {
          position: absolute;
          bottom: -560px;
      }


      .search_btn {
        top: 4px;
        right: 5px;
      }
   
    </style>

    <title>Ecommerce Website</title>
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
            <a href="shop.php" class="hide " >Shop</a>
            <input type="checkbox" id="mega" class="mega_input" >
            <label for="mega" class="mega_label">Shop</label>

            <div class="megaMenu">
                <div class="content">

                    <div class="row">
                        <img src="assets/img/p4.jpg" alt="">
                    </div>

                    <div class="row">
                        <header><a href="">Mens</a></header>
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
        <li><a href="contact.php" class="active_link">Contact</a></li>

        <li>
          <a href="about_us.php">About Us</a>
        </li>
    </ul>

    <form action="search_product.php" method="get">
            <div class="header_search">
              
                <input type="search" class="form_input" name="search_data" placeholder="Search for items....">
                <!-- <input type="submit" value="search" name="search_data_product"> -->
            
                 <button type="submit" name="search_data_product" class="search_btn"><i class="fi fi-rs-search"></i></button> 
                
                
            </div>
          </form>

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
          <li><span class="breadcrumb-link">Contact Us</span></li>
        </ul>
      </section>


      <!--=============== HOME ===============-->
      <section class="home section-lg">
              <div class="home-container container ">
                  
                    <div class="box">
                        <div class="contact form">
                            <h3 class="form-name">Send a Message</h3>

                            <form action="">
                                <div class="formBox">
                                    <div class="row50">

                                        <div class="inputBox">
                                            <span>Frist Name</span>
                                            <input type="text" placeholder="Jone">
                                        </div>

                                        <div class="inputBox">
                                            <span>Last Name</span>
                                            <input type="text" placeholder="Doe">
                                        </div>

                                    </div>

                                    <div class="row50">

                                        <div class="inputBox">
                                            <span>Email</span>
                                            <input type="email" placeholder="Jonedoe25@gmail.com">
                                        </div>

                                        <div class="inputBox">
                                            <span>Mobile</span>
                                            <input type="text" placeholder="+9477 862 5465">
                                        </div>

                                    </div>

                                    <div class="row100">

                                        <div class="inputBox">
                                            <span>Message</span>
                                            <textarea name="" id="" placeholder="Write your message here...."></textarea>
                                        </div>

                                    </div>

                                    <div class="row100">

                                        <div class="inputBox">
                                            <input type="submit" value="Send">
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="contact info">
                            <h3 class="contact-info">Contact Info</h3>

                            <div class="infoBox">
                                <div>
                                    <span><i class="fi fi-rs-marker"></i></span>
                                    <p>Anuradhapura , Kekirawa <br>Sri Lanka</p>
                                </div>
                                <div>
                                    <span><i class="fi fi-rs-envelope"></i></span>
                                    <a href="mailto:damith20@gmail.com">damith20@gmail.com</a>
                                </div>
                                <div>
                                    <span><i class="fi fi-rs-phone-call"></i></span>
                                    <a href="tel:+9477 845 6312">+9477 5612 388</a>
                                </div>

                                <ul class="sci">
                                    <li><a href=""><i class="fi fi-brands-facebook social-icon facebook"></i></a></li>
                                    <li><a href=""><i class="fi fi-brands-instagram social-icon instagram"></i></a></li>
                                    <li><a href=""><i class="fi fi-brands-whatsapp social-icon whatsapp"></i></a></li>
                                    <li><a href=""><i class="fi fi-brands-twitter-alt-circle social-icon twitter"></i></a></li>
                                </ul>

                            </div>
                        </div>

                        <div class="contact map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7901.246351696404!2d80.59527709099561!3d8.037729417956847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afc97c546820a2f%3A0x7f48f41fda30ba52!2sKekirawa%20Town%2C%20Kekirawa!5e0!3m2!1sen!2slk!4v1718640727754!5m2!1sen!2slk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    <script src="assets/js/login.js"></script>


    
</body>
</html>