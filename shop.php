
<?php 

  include('./admin/includes/connect.php');
  include('./function/common_function.php');

  session_start();

  add_cart();

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
          bottom: -1400px;
      }


      .search_btn {
        top: 4px;
        right: 5px;
      }
   
    </style>

    <title>Ecommerce Website-Shop</title>


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
                  <a href="shop.php" class="hide active_link" >Shop</a>
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
          <li><span class="breadcrumb-link">Shop</span></li>
        </ul>
      </section>

      <!--=============== PRODUCTS ===============-->
      <section class="products section-lg container">

        <div class="shop-row">

            <div class="left">

              <div class="cate_row">
                
                <div class="heder-left-title">
                  <h2 class="category-name">Category</h2>
                </div>
               
                 <div class="left-row-one"> 
                  
                 
                 <?php 
                    
                    $select_categories="SELECT * FROM `categories`";
                    $result_categories=mysqli_query($con,$select_categories);
                    
                    

                    while($row_data=mysqli_fetch_assoc($result_categories)){
                      $category_title=$row_data['category_title'];
                      $category_id=$row_data['category_id'];
                      echo "
                          <div class='category-sub-name'>
                            <a href='shop.php?category=$category_id' class='sub-name'>$category_title</a>
                          </div>
                          ";
                    }      
                    ?>

                 </div> 
              </div>

              <div class="brand_row">
                  <div class="heder-left-title">
                    <h2 class="brand-name">Brands</h2>
                  </div>

                 <div class="left-row-two">


                 <?php 
                    getbrand();     
                    ?>




                 </div> 
              </div>

            </div>


            <div class="shop">

                <p class="total-products">We found 
                  <span>
                    <?php
                        $select_product=mysqli_query($con,"SELECT * FROM `product`");
                        $row_count=mysqli_num_rows($select_product);
                        echo"
                              $row_count
                        ";
                    ?>
                  </span> 
                  items for you!
                </p>

                <div class="products-container grid">

                <?php 
                  getproducts();
                  getuniq_category();
                  getuniq_brand();
          
                     
                 
       
                
                ?> 

<!-- ======================================================================== -->







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
                        <a href="details.php">
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
                      <a href="details.php" class="product-images">
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

                  <!-- break -->
                
<!--                   
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

                <!-- <ul class="pagination">
                  <li><a href="" class="pagination-link active">01</a></li>
                  <li><a href="" class="pagination-link">02</a></li>
                  <li><a href="" class="pagination-link">03</a></li>
                  <li><a href="" class="pagination-link">...</a></li>
                  <li><a href="" class="pagination-link">15</a></li>
                  <li><a href="" class="pagination-link icon">
                    <i class="fi-rs-angle-double-small-right"></i>
                  </a></li>
                </ul> -->
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
