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
    <link rel="stylesheet" href="assets/css/about_us.css">

    
    <style>
      .search_btn {
        top: 4px;
        right: 5px;
      }
    </style>


    <title>Ecommerce Website-About Us</title>
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
                    <a href="shop.php">Shop</a>
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
                <li><a href="contact.php">Contact</a></li>

                <li>
                  <a href="about_us.php" class="active_link">About Us</a>
                </li>
            </ul>

            <div class="header_search">
            <input type="search" class="form_input" name="search_data" placeholder="Search for items....">

            <button type="submit" name="search_data_product" class="search_btn"><i class="fi fi-rs-search"></i></button> 

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
          <li><a href="index.html" class="breadcrumb-link">Home</a></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">About Us</span></li>
        </ul>
      </section>


      <!--=============== HOME ===============-->

      <section  class="home section-lg">

              <div class="section_bg">
                <div class="container_home">
                  <div class="content_section_about">
                    <div class="title">
                      <h1>Our Story</h1>
                    </div>
                    <div class="content_font">
                      <h4>To be the most favorite retailer in Sri Lanka.</h4>
                      <p>There are over 30,000 high quality fashion items falling into the main categories of Men, Women, Kids, School Uniform, Shoes, Bags, Accessories, Household Items and Many more to fulfill your fashion & home needs. We also offer numerous value added services such as AD Treasure card & AD Credit card facilities, whilst creating an atmosphere of friendliness, service and quality with value for money.</p>
                    </div>
                    <div class="social_about">
                        <a href=""> 
                          <i class="fi fi-brands-facebook footer-social-icon facebook"></i>
                        </a>
                        
                        <a href=""> 
                          <i class="fi fi-brands-instagram footer-social-icon instagram"></i>
                        </a>
                        
                        <a href=""> 
                        <i class="fi fi-brands-twitter-alt-circle footer-social-icon twitter"></i>
                        </a>
                        
                        <a href=""> 
                          <i class="fi fi-brands-whatsapp footer-social-icon whatsapp"></i>
                        </a>
                        
                        <a href=""> 
                          <i class="fi fi-brands-youtube footer-social-icon youtube"></i>
                        </a>
                    </div>

                  </div>

                  <div class="image_section">
                    <img src="assets/img/b3.jpg" alt="">
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