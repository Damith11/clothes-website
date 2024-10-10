
<?php 

  include('./admin/includes/connect.php');
  include('./function/common_function.php');

  session_start();

  // add_cart();
  add_wishlist();
  
        
  $_SESSION['user_email']; 
                
  if(isset($_POST['add_cart'])){


    $product_id=$_POST['product_id'];
    $product_title=$_POST['product_title'];
    $product_price=$_POST['new_price'];
    $product_img=$_POST['product_image'];
    $product_quntity=$_POST['product_quntity'];
    $user_email=$_SESSION['user_email'];
   
    
    

    // select cart data based on contition
      $select_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name='$product_title' and user_email='$user_email'");
      if(mysqli_num_rows($select_cart)>0){
          echo "<script>alert('product already added to cart')</script>";
         
      }

      else{
        $insert_product=mysqli_query($con,"INSERT INTO `cart` (name,price,quantity,image,product_id,user_email) VALUES ('$product_title','$product_price',$product_quntity,'$product_img',$product_id,'$user_email')");
        
        // echo "<script>alert('product added to cart....')</script>";
        
      }

    


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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
      />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/heder.css">

    <style>
      .breadcrumb{
        margin-bottom: 1rem;
      }
      .products{
        margin-top: 2rem;;
        margin-bottom: 1.5rem;;
      }
      .search_btn {
        top: 4px;
        right: 5px;
      }
    </style>


    <title>Ecommerce Website-Details</title>
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
          <li><a href="index.php" class="breadcrumb-link">Home</a></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">Shop</span></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">Details</span></li>
        </ul>
      </section>

      <!--=============== DETAILS ===============-->
      <section class="details section-lg">
        <div class="details-container container grid">

          <?php 
          
          if(isset($_GET['product_id'])){
            
            if(!isset($_GET['category'])){
              if(!isset($_GET['brand'])){
                $product_id=$_GET['product_id'];
          
          $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id WHERE product_id=$product_id";
          $result_query=mysqli_query($con,$select_query);
          
          // echo $row['product_title'];
          while($row=mysqli_fetch_assoc($result_query)){;
            
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keyword=$row['product_keyword'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            $product_img1=$row['product_img1'];
            $product_img2=$row['product_img2'];
            $product_img3=$row['product_img3'];
            $old_price=$row['old_price'];
            $offer=$row['offer'];
            $new_price=$row['new_price'];
            $year_manufactured=$row['year_manufactured'];
            $weight=$row['weight'];
            $country_manufacture=$row['country_manufacture'];
            $material=$row['material'];
            $item_type=$row['item_type'];
            $brand_title=$row['brand_title'];
            $item_available=$row['item_available'];

       ?>
          
          <div class="details-group">
            <form action="" method="post">
            <img src="<?php echo "./admin/product_images/$product_img1" ?>" alt="" class="details-img">
            <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">

            <div class="details-small-images grid">
              <img src="<?php echo "./admin/product_images/$product_img2" ?>" alt="" class="details-small-img">
              <img src="<?php echo "./admin/product_images/$product_img3" ?>" alt="" class="details-small-img">
              <img src="assets/img/product-8-2.jpg" alt="" class="details-small-img">
            </div>
    
          </div>

          <div class="details-group">
        
            <h3 class="details-title"><?php echo $product_title ?></h3>
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
            <p class="details-brand">Brands: <span><?php echo $brand_title ?></span></p>

            <div class="details-price flex">
            <?php 
                            if($item_type=='new' or $item_type=='hot'){
                             echo "<span class='new-price'>$ $new_price </span>
                             <input type='hidden' name='new_price' value='$new_price'>
                             ";
                      
                            }
                            else {
                              echo "
                               <span class='new-price'>$ $new_price </span>
                              <span class='old-price'>$ $old_price</span>
                              <span class='save-price'>$offer % off</span>
                              <input type='hidden' name='new_price' value='$new_price'>
                              ";
                            }
                          ?>
              
            </div>

            <p class="short-description">
            <?php echo $product_description ?>
            </p>

            <ul class="product-list">
              <li class="list-item flex">
                <i class="fi-rs-crown"></i> 1 year Brand Warranty
              </li>
              <li class="list-item flex">
                <i class="fi-rs-refresh"></i> 30 Day Return Policy
              </li>
              <li class="list-item flex">
                <i class="fi-rs-credit-card"></i> Cash on Delivery available
              </li>
            </ul>

            <div class="details-color flex">
              <span class="details-color-title">Color</span>

              <ul class="color-list">
                <li>
                  <a href="" class="color-link" style="background-color: hsl(37, 100%, 65%);"></a>
                </li>
                <li>
                  <a href="" class="color-link" style="background-color: hsl(353, 100%, 67%);"></a>
                </li>
                <li>
                  <a href="" class="color-link" style="background-color: hsl(237, 82%, 45%);"></a>
                </li>
                <li>
                  <a href="" class="color-link" style="background-color: hsl(304, 100%, 78%);"></a>
                </li>
                <li>
                  <a href="" class="color-link" style="background-color: hsl(126, 61%, 52%);"></a>
                </li>

              </ul>

            </div>

            <div class="details-size flex">
              <span class="details-size-title">Size</span>

              <ul class="size-list">
                <li>
                  <a href="" class="size-link size-active">M</a>
                </li>
                <li>
                  <a href="" class="size-link">L</a>
                </li>
                <li>
                  <a href="" class="size-link">S</a>
                </li>
                <li>
                  <a href="" class="size-link">XL</a>
                </li>
                <li>
                  <a href="" class="size-link">2XL</a>
                </li>
              </ul>
            </div>

            <div class="details-action">
              <input type="number" class="quantity" value="1" min="1" name="product_quntity">
              

              <!-- <a href="" class="btn btn-sm"></a> -->
              <button type="submit" style="cursor: pointer;" class="btn btn-sm" name="add_cart" aria-label="Add To Cart">
                Add to cart</button>

              <!-- <input type="submit" value="Add to Cart" class="btn btn-sm" name="add_cart"> -->

              
              <!-- <a href="" class="details-action-btn">
                <i class="fi fi-rs-heart"></i>
              </a> -->

              <button type="submit" class="details-action-btn" style="cursor: pointer;" name="add_wishlist" aria-label="Add To Wishlist">
                          <i class='fi fi-rs-heart'></i>
                </button>


            </div>

            <ul class="details-meta">
              <li class="meta-list flex"><span>SKU:</span> FEXKMALI</li>
              <li class="meta-list flex"><span>Tags:</span> <?php echo $product_keyword ?></li>
              <li class="meta-list flex"><span>Available:</span> <?php echo $item_available ?> Items In Stock</li>
            </ul>

            </form>

            </div>  
            
          </div>

       






      </section>

      <!--=============== DETAILS TAB ===============-->
      <section class="details__tab container">
          <div class="detail-tabs">
            <span class="detail-tab active-tab" data-target="#info">
              Additional Info
            </span>
            <span class="detail-tab" data-target="#reviews">
              Reviews(3)
            </span>
          </div>

          <div class="details-tabs-content">
            <div class="details-tab-content active-tab" content id="info">
              <table class="info-table">

                <tr>
                  <th>Year Manufactured</th>
                  <td><?php echo $year_manufactured ?></td>
                </tr>

                <tr>
                  <th>Weight</th>
                  <td><?php echo $weight ?></td>
                </tr>

                <tr>
                  <th>Country of Manufacture</th>
                  <td><?php echo $country_manufacture ?></td>
                </tr>

                <tr>
                  <th>Material</th>
                  <td><?php echo $material ?></td>
                </tr>


              </table>

            </div>
          

        <?php 
          }  
        }
      } 
    }    
        ?>
        
          
       

            <div class="details-tab-content" content id="reviews">
              <div class="reviews-container grid">
                <div class="review-single">
                  <div>
                    <img src="assets/img/avatar-1.jpg" alt="" class="review-img">
                    <h4 class="review-title">damith buddika</h4>
                  </div>

                  <div class="review-data">
                    <div class="review-rating">
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                    </div>

                    <p class="review-description">
                      Thank you for fast delivery item.
                    </p>

                    <span class="review-date">December 4, 2020 at 3:20 pm</span>
                    
                  </div>
                </div>
                <!-- ---------------------------------------------------------------------------- -->
                <div class="review-single">
                  <div>
                    <img src="assets/img/avatar-2.jpg" alt="" class="review-img">
                    <h4 class="review-title">damith buddika</h4>
                  </div>

                  <div class="review-data">
                    <div class="review-rating">
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                    </div>

                    <p class="review-description">
                      Thank you for fast delivery item.
                    </p>

                    <span class="review-date">December 4, 2020 at 3:20 pm</span>

                  </div>
                </div>
                <!-- ---------------------------------------------------------------------------------- -->
                <div class="review-single">
                  <div>
                    <img src="assets/img/avatar-3.jpg" alt="" class="review-img">
                    <h4 class="review-title">damith bud</h4>
                  </div>

                  <div class="review-data">
                    <div class="review-rating">
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                      <i class="fi fi-rs-star"></i>
                    </div>

                    <p class="review-description">
                      Thank you for fast delivery item.
                    </p>

                    <span class="review-date">December 4, 2020 at 3:20 pm</span>

                  </div>
                </div>
              </div>

              <div class="review-form">
                <h4 class="review-form-title">Add a review</h4>

                <div class="rate-product">
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                  <i class="fi fi-rs-star"></i>
                </div>

                <form action="" class="form grid">
                  <textarea class="form-input textarea" placeholder="Write Comment"></textarea>

                  <div class="form-group grid">
                    <input type="text" placeholder="Name" class="form-input">
                    <input type="email" placeholder="Email" class="form-input">
                  </div>

                  <div class="form-btn">
                    <button class="btn">Submit Review</button>
                  </div>

                </form>
              </div>

            </div>

          </div>

      </section>

      <!--=============== PRODUCTS ===============-->
      <section class="products container section-lg">
        <h3 class="section-title"><span>Related</span> Product</h3>

        <div class="products-container grid">

          <?php 
          getrelated_product();
          
          ?>

        
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
