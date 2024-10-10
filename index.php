
<?php 

  include('./admin/includes/connect.php');
  include('./function/common_function.php');

  session_start();

  add_cart();
  add_wishlist();



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

   

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <!--=============== SWIPER CSS ===============-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
      />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/heder.css">

    <style>
      .search_btn {
        top: 4px;
        right: 5px;
      }

      .nav-bar .black {
          background: #fff; /* White background when scrolled */
          height: 50px;
  
      }

      .nav-bar .black {
          color: #000; /* Black text when scrolled */
      }
    </style>

    <title>Ecommerce Website</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <nav class="nav-bar">

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

              <li><a href="index.php" class="active_link">Home</a></li>
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
                  <a href="about_us.php" class="hide">About Us</a>
                  <!-- <input type="checkbox" id="drop" class="drop_input" >
                  <label for="drop" class="drop_label">Blog</label>

                  <ul class="dropdown">
                      <li><a href="#">About</a></li>
                      <li><a href="#">Careers</a></li>
                      <li><a href="#">Contact</a></li>
                  </ul> -->
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
                  <!-- <div class="profile">
                      <i class="fi fi-rs-user header_icon"> </i>
                      <ul class="profile-link">
                          <li><a href="" ><img src="assets/img/avatar-1.jpg" class="user_img" alt=""></a></li>
                          <li><a href="" class="user_details"><i class='fi fi-rs-user' ></i>User Name</a></li>
                          
                          <li><a href="" class="user_details"><i class="fi fi-rs-sign-in-alt"></i>Log in</a></li>
                      </ul>
                  </div> -->
        
  

          </div>

      </div>



    </nav>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== HOME ===============-->
      <section class="home section-lg">
              <div class="home-container  slider">

                <div class="slide fade"  style="display: block;">

                  <img src="assets/img/bg/b4.jpg" class="home-img" alt="">

                    <div class="home-content">
                          <span class="home-subtitle">Hot Promotions</span>
                          <h1 class="home-title">
                            Fashion Trending <br>
                            <span> Great Collection</span>
                          </h1>
                          <p class="home-description">
                            Save more with coupons & up to 20% off
                          </p>
                          <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="slide fade" >

                  <img src="assets/img/bg/home7-banner1.jpg" class="home-img" alt="">

                    <div class="home-content">
                          <span class="home-subtitle">New Arrivel</span>
                          <h1 class="home-title">
                            Fashion Trending <br>
                            <span> Great Collection</span>
                          </h1>
                          <p class="home-description">
                            Save more with coupons & up to 15% off
                          </p>
                          <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>
                
                <div class="slide fade" >

                  <img src="assets/img/bg/slide6-2.jpg" class="home-img" alt="">

                    <div class="home-content">
                          <span class="home-subtitle">New Arrivel</span>
                          <h1 class="home-title">
                            Fashion Trending <br>
                            <span> Great Collection</span>
                          </h1>
                          <p class="home-description">
                            Save more with coupons & up to 15% off
                          </p>
                          <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="slide fade" >

                  <img src="assets/img/bg/parallax.jpg" class="home-img" alt="">

                    <div class="home-content">
                          <span class="home-subtitle">New Arrivel</span>
                          <h1 class="home-title">
                            Fashion Trending <br>
                            <span> Great Collection</span>
                          </h1>
                          <p class="home-description">
                            Save more with coupons & up to 15% off
                          </p>
                          <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <a href="#" onclick="plusSlides(-1)" class="prev">&#10094</a>
                <a href="#" onclick="plusSlides(1)" class="next">&#10095</a>

                <div class="dotsbox">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                  <span class="dot" onclick="currentSlide(4)"></span>
                </div>

                 
              </div>
      </section>
      

      <!--=============== CATEGORIES ===============-->
      <section class="categories container section">
            <h3 class="section-title"><span>Popular</span> Categories</h3>

            <div class="categories-container swiper">
              <div class="swiper-wrapper">

              <?php 
                    
                    $select_categories="SELECT * FROM `categories`";
                    $result_categories=mysqli_query($con,$select_categories);
                    
                    

                    while($row_data=mysqli_fetch_assoc($result_categories)){
                      $category_title=$row_data['category_title'];
                      $category_img=$row_data['category_img'];
                      $category_id=$row_data['category_id'];
                      echo "
                          <a href='shop.php?category=$category_id' class='category-item swiper-slide'>
                            <img src='./admin/category_images/$category_img' class='category-img' alt='$category_title'>
                            <h3 class='category-title'> $category_title</h3>
                          </a>
                          ";
                    }      
              ?>




              </div>
              <div class="swiper-button-next"> <i class="fi fi-rs-angle-right"></i></div>
              <div class="swiper-button-prev"> <i class="fi fi-rs-angle-left"></i></div> 
            </div>
      </section>

      <!--=============== PRODUCTS ===============-->
      <section class="products section container">
          <div class="tab-btns">
              <span class="tab-btn active-tab" data-target="#featured">Featured</span>
              <span class="tab-btn" data-target="#popular">Popular</span>
              <span class="tab-btn" data-target="#new-added">New Added</span>
          </div>

          <div class="tab-items">
            <div class="tab-item active-tab" content id="featured">
                <div class="products-container grid">
                  
                    <?php 
                      
                      getproducts();
                          
                    ?>
                

                </div>
            </div>

          <!-- -----------------popular ---------------------->
       
            

            <div class="tab-item" content id="popular">
              <div class="products-container grid">
                      
             <?php 
             
             getPopular();
             
             
             ?>

              </div>
            </div>
            
            <!-- --------------------- New add ------------------------------>

            <div class="tab-item" content id="new-added">
              <div class="products-container grid">

             <?php 
             
             getNew_Added();
             
                      
             ?> 

              </div>
            </div>


          </div>
      </section>

      <!--=============== DEALS ===============-->
      <section class="deals section">

          <div class="deals-container container grid">

            <div class="deals-item">
                <div class="deals-group">
                  <h3 class="deals-brand">Deal of the Day </h3>
                  <span class="deals-category">Limited quantities.</span>
                </div>

                <h4 class="deals-title">Summer Collection New Morden Design</h4>

                <div class="deals-price flex">
                  <span class="new-price">$100</span>
                  <span class="old-price">$120</span>
                </div>

                <div class="deals-group">
                    <p class="deals-countdown-text">Hurry Up! Offer End In:</p>
              

                  <div class="countdown">
                      <div class="countdown-amount">
                          <p class="countdown-period">02</p>
                          <span class="unit">Days</span>
                      </div>

                      <div class="countdown-amount">
                        <p class="countdown-period">22</p>
                        <span class="unit">Hours</span>
                      </div>

                      <div class="countdown-amount">
                          <p class="countdown-period">57</p>
                          <span class="unit">Mins</span>
                      </div>

                      <div class="countdown-amount">
                        <p class="countdown-period">24</p>
                        <span class="unit">Sec</span>
                      </div>

                  </div>

                </div>

                 <div class="deals-btn">
                  <a href="shop.php" class="btn btn-md">Shop Now</a>
                 </div>
            </div>

             <!--------------------------- divide ------------------------------->

             
            <div class="deals-item">
              <div class="deals-group">
                <h3 class="deals-brand">Deal of the Day </h3>
                <span class="deals-category">Limited quantities.</span>
              </div>

              <h4 class="deals-title">Summer Collection New Morden Design</h4>

              <div class="deals-price flex">
                <span class="new-price">$100</span>
                <span class="old-price">$120</span>
              </div>

              <div class="deals-group">
                  <p class="deals-countdown-text">Hurry Up! Offer End In:</p>
            

                <div class="countdown">
                    <div class="countdown-amount">
                        <p class="countdown-period">02</p>
                        <span class="unit">Days</span>
                    </div>

                    <div class="countdown-amount">
                      <p class="countdown-period">22</p>
                      <span class="unit">Hours</span>
                    </div>

                    <div class="countdown-amount">
                        <p class="countdown-period">57</p>
                        <span class="unit">Mins</span>
                    </div>

                    <div class="countdown-amount">
                      <p class="countdown-period">24</p>
                      <span class="unit">Sec</span>
                    </div>

                </div>

              </div>

               <div class="deals-btn">
                <a href="shop.php" class="btn btn-md">Shop Now</a>
               </div>
          </div>
  
          </div>


      </section>

      <!--=============== NEW ARRIVALS ===============-->
      <section class="new__arrivals container section">

        <div class="banner_card">
          <div class="content_card">
              <div class="feature-content">
                <i class="fi fi-rr-expense card_icon"></i>
                  <h2>Secure Payment</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur elit
                  </p>
              </div>
          </div>
          <div class="content_card">
              <div class="feature-content">
                <i class="fi fi-rr-free-delivery card_icon"></i>
                  <h2>Island wide Delivery</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur elit
                  </p>
              </div>
          </div>
          <div class="content_card">
              <div class="feature-content">
                <i class="fi fi-rr-restock card_icon"></i>
                  <h2>90 Days Return</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur elit
                  </p>
              </div>
          </div>
          <div class="content_card">
              <div class="feature-content">
                <i class="fi fi-rr-customer-service card_icon"></i>
                  <h2>24/7 Support</h2>
                  <p>
                      Lorem ipsum dolor sit amet consectetur elit
                  </p>
              </div>
          </div>
      </div>


      </section>

      <!--=============== SHOWCASE ===============-->
      <section class="showcase section">


        <div class="showcase-container container grid">

          <div class="showcase-wrapper">
            <h3 class="section-title">Hot Releases</h3>

            <?php
            // hot_releases();
            deals_outlet();
            
            ?>

           




          </div>


          <div class="showcase-wrapper">
            <h3 class="section-title">Deals & outlet</h3>

            <?php 
            
            deals_outlet();
            ?>


            

          </div>

          <div class="showcase-wrapper">
            <h3 class="section-title">Top Selling</h3>

            <?php 
              // top_selling();
              deals_outlet();
            
            ?>

          


            

          </div>

          <div class="showcase-wrapper">
            <h3 class="section-title">Trend</h3>

           <?php 
            trend();

            ?>

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
    <script src="assets/js/silder.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

    <script>

      $(window).scroll(function(){
          if($(window).scrollTop() > 0){
              $("nav-bar").addClass("black");
          } else {
              $("nav-bar").removeClass("black");
          }
      });

    </script>

<script src="assets/js/sweetalert.min.js"></script>

  </body>
</html>
