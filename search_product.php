
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
      .Error_msg{
        color: red;
        text-align: center;
        position: relative;
        left: 464px;
        margin: 40px;
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
          <form action="" method="get">
            <div class="header_search">
              
                <input type="text" class="form_input" name="search_data" placeholder="Search for items....">
                <!-- <input type="submit" value="search" name="search_data_product"> -->
                <button type="submit" name="search_data_product" class="search_btn"><i class="fi fi-rs-search"></i></button> 
                <!-- <a href=""  name="Search_data_product">
                  <i class="fi fi-rs-search"></i>
                </a>     -->
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
      <!--=============== HOME ===============-->
      <!-- <section class="home section-lg">
              <div class="home-container  slider">

                <div class="slide fade"  style="display: block;">

                  <img src="assets/img/banner.jpg" class="home-img" alt="">

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

                  <img src="assets/img/bg8.jpg" class="home-img" alt="">

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

                  <img src="assets/img/blog-3.jpg" class="home-img" alt="">

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

                  <img src="assets/img/blog-2.jpg" class="home-img" alt="">

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
       -->

      <!--=============== CATEGORIES ===============-->
      <!-- <section class="categories container section">
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
                          <a href='index.php?category=$category_id' class='category-item swiper-slide'>
                            <img src='./admin/category_images/$category_img' class='category-img' alt='$category_title'>
                            <h3 class='category-title'> $category_title</h3>
                          </a>
                          ";
                    }      
              ?>


                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-1.jpg" class="category-img" alt="">
                    <h3 class="category-title"> T-Shart</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-2.jpg" class="category-img" alt="">

                    <h3 class="category-title">Bags</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-3.jpg" class="category-img" alt="">

                    <h3 class="category-title">Sandal</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-4.jpg" class="category-img" alt="">

                    <h3 class="category-title">Scarf</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-5.jpg" class="category-img" alt="">

                    <h3 class="category-title">Shoes</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-6.jpg" class="category-img" alt="">

                    <h3 class="category-title">Pillowcase</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-7.jpg" class="category-img" alt="">

                    <h3 class="category-title">Jumpsuit</h3>
                  </a>

                  <a href="shop.php" class="category-item swiper-slide">
                    <img src="assets/img/category-8.jpg" class="category-img" alt="">

                    <h3 class="category-title">Hats</h3>
                  </a>

              </div>
              <div class="swiper-button-next"> <i class="fi fi-rs-angle-right"></i></div>
              <div class="swiper-button-prev"> <i class="fi fi-rs-angle-left"></i></div> 
            </div>
      </section> -->

      <!--=============== PRODUCTS ===============-->
      <section class="products section container">
          <!-- <div class="tab-btns">
              <span class="tab-btn active-tab" data-target="#featured">Featured</span>
              <span class="tab-btn" data-target="#popular">Popular</span>
              <span class="tab-btn" data-target="#new-added">New Added</span>
          </div> -->

          <div class="tab-items">
            <div class="tab-item active-tab" content id="featured">
                <div class="products-container grid">
                  
                    <?php 
                     
                      search_product();
                    
                    ?>
                

                  <!-- <div class="product-item">
                      <div class="product-banner">
                        <a href="details.php" class="product-images">
                           <img src="assets/img/product-1-1.jpg" class="product-img default" alt="">

                           <img src="assets/img/product-1-2.jpg" class="product-img hover" alt="">
                        </a>

                        <div class="product-actions">
                          
                          <a href="" class="action-btn" aria-label="Quick View">
                            <i class="fi fi-rs-eye"></i>
                          </a>

                          <a href="" class="action-btn" aria-label="Add To Wishlist">
                            <i class="fi fi-rs-heart"></i>
                          </a>

                          <a href="" class="action-btn" aria-label="Compare">
                            <i class="fi fi-rs-shuffle"></i>
                          </a>

                        </div>

                        <div class="product-badge light-pink">Hot</div>
                      </div>

                      <div class="product-content">
                         <span class="product-category"> Clothing</span>
                         <a href="details.html">
                            <h3 class="product-title"> Colorful Pattern Shirts</h3>
                         </a>

                         <div class="product-rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                         </div>

                         <div class="product-price flex">
                           <span class="new-price">$55</span>
                           <span class="old-price">$45</span>
                         </div>   
                         
                         <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                          <i class="fi fi-rs-shopping-cart-add"></i>
                        </a>

                      </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-2-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-2-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-green">Hot</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-3-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-3-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-orange">Hot</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-4-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-4-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-blue">Hot</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-5-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-5-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-pink">-30%</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-6-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-6-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-pink">-22%</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-7-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-7-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>

                      <div class="product-badge light-green">-30%</div>
                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div>

                  <div class="product-item">
                    <div class="product-banner">
                      <a href="details.html" class="product-images">
                         <img src="assets/img/product-8-1.jpg" class="product-img default" alt="">

                         <img src="assets/img/product-8-2.jpg" class="product-img hover" alt="">
                      </a>

                      <div class="product-actions">
                        <a href="" class="action-btn" aria-label="Quick View">
                          <i class="fi fi-rs-eye"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Add To Wishlist">
                          <i class="fi fi-rs-heart"></i>
                        </a>

                        <a href="" class="action-btn" aria-label="Compare">
                          <i class="fi fi-rs-shuffle"></i>
                        </a>

                      </div>


                    </div>

                    <div class="product-content">
                       <span class="product-category"> Clothing</span>
                       <a href="details.html">
                          <h3 class="product-title"> Colorful Pattern Shirts</h3>
                       </a>

                       <div class="product-rating">
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                          <i class="fi fi-rs-star"></i>
                       </div>

                       <div class="product-price flex">
                         <span class="new-price">$55</span>
                         <span class="old-price">$45</span>
                       </div>   
                       
                       <a href="" class="action-btn cart-btn" aria-label="Add To Cart">
                        <i class="fi fi-rs-shopping-cart-add"></i>
                      </a>

                    </div>
                  </div> -->
                

                </div>
            </div>

          <!-- -----------------popular ---------------------->
       
            

            <div class="tab-item" content id="popular">
              <div class="products-container grid">
                      
             <?php 
             
             search_product();
             
             ?>

              </div>
            </div>
            
            <!-- --------------------- New add ------------------------------>

            <div class="tab-item" content id="new-added">
              <div class="products-container grid">

             <?php 
             
             search_product();
             add_cart();
                      
             ?> 

              </div>
            </div>


          </div>
      </section>

      <!--=============== DEALS ===============-->
      

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

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-1.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-2.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-3.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>




          </div>


          <div class="showcase-wrapper">
            <h3 class="section-title">Deals & outlet</h3>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-4.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-5.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-6.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>


            

          </div>

          <div class="showcase-wrapper">
            <h3 class="section-title">Top Selling</h3>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-7.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-8.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-9.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>


            

          </div>

          <div class="showcase-wrapper">
            <h3 class="section-title">Trend</h3>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-2.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-9.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
              </div>
            </div>

            <div class="showcase-item">
              <a href="details.html" class="showcase-img-box">
                <img src="assets/img/showcase-img-5.jpg" class="showcase-img" alt="">
              </a>

              <div class="showcase-content">
                <a href="details.html">
                  <h4 class="showcase-title">Floral print casul cotton Dress</h4>
                </a>

                <div class="showcase-price flex">
                  <span class="new-price">$250.00</span>
                  <span class="old-price">$280.00</span>
                </div>
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
    <script src="assets/js/login.js"></script>
    <script src="assets/js/silder.js"></script>
  </body>
</html>
