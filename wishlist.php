
<?php

include('./admin/includes/connect.php');
session_start();




      if(isset($_SESSION['user_email'])){
                
        if(isset($_POST['add_cart'])){


          $product_id=$_POST['product_id'];
          $product_title=$_POST['product_title'];
          $product_price=$_POST['product_price'];
          $product_image=$_POST['product_image'];
          $product_quntity=1;
          $user_email=$_SESSION['user_email'];
         
          
          

          // select cart data based on contition
            $select_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name='$product_title' and user_email='$user_email'");
            if(mysqli_num_rows($select_cart)>0){
                echo "<script>alert('product already added to cart')</script>";
               
            }

            else{
              $insert_product=mysqli_query($con,"INSERT INTO `cart` (name,price,quantity,image,product_id,user_email) VALUES ('$product_title','$product_price',$product_quntity,'$product_image',$product_id,'$user_email')");


              
              
              $user_email=$_SESSION['user_email'];
              $empty_cart="DELETE FROM `wishlist` WHERE user_email='$user_email' and product_id=$product_id";
              $result_delete=mysqli_query($con,$empty_cart);

              echo "<script>alert('product added to cart....')</script>";
              echo "<script>window.open('cart.php','_self')</script>";
              
            }

          


        }                

      }

      else{
        // echo "<script>alert('plese register frist')</script>";
        // echo "<script>window.open('index.php','_self')</script>";

      }

      if(isset($_GET['remove'])){
        $remove_id=$_GET['remove'];
        
        mysqli_query($con,"DELETE FROM `wishlist` WHERE wishlist_id=$remove_id");
        header('location:wishlist.php');
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
      .search_btn {
        top: 4px;
        right: 5px;
      }
    </style>

    <title>Ecommerce Website-Wishlist</title>
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
          <li><a href="index.html" class="breadcrumb-link">Home</a></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">Shop</span></li>
          <li><span class="breadcrumb-link">></span></li>
          <li><span class="breadcrumb-link">Wishlist</span></li>
        </ul>
      </section>

      <!--=============== WISHLIST ===============-->
      <section class="wishlist section-lg container">
          <div class="table-container">
            <?php 
            if(isset($_SESSION['user_email'])){
            $user_email=$_SESSION['user_email'];
          
            $select_wishlist="SELECT * FROM `wishlist` WHERE user_email='$user_email'";
            $result_wishlist=mysqli_query($con,$select_wishlist);

            if(mysqli_num_rows($result_wishlist)>0){
             
              echo"
                  <table class='table'>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th>Action</th>
                    <th>Remove</th>
                  </tr>
              
              ";

              while($fetch_wishlist=mysqli_fetch_assoc($result_wishlist)){
                
                 $product_id=$fetch_wishlist['product_id'];
              ?>
                  <form action="" method="post" enctype="multipart/form-data">
                  <tr>
                    <td>
                      <img src="assets/img/<?php echo $fetch_wishlist ['product_image'] ?>" alt="" class="table-img">
                      <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist ['product_image'] ?>">
                      <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist ['product_id'] ?>">
                    </td>

                    <td>
                      <h3 class="table-title"><?php echo $fetch_wishlist ['product_title'] ?></h3>
                      <input type="hidden" name="product_title" value="<?php echo $fetch_wishlist ['product_title'] ?>">
                      <p class="table-description"></p>
                    </td>

                    <td>
                      <span class="table-price">$ <?php echo number_format($fetch_wishlist ['product_price'] )?></span>
                      <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist ['product_price'] ?>">
                    </td>

                    <td>
                      <?php
                      
                      $select_item="SELECT * FROM `product` WHERE product_id=$product_id";
                      $result_item=mysqli_query($con,$select_item); 

                      $row_data=mysqli_fetch_assoc($result_item);
                      $item_available=$row_data['item_available'];
                      if($item_available>0){
                        echo "<span class='table-stock'>In Stock</span>";
                      }
                      else{
                        echo "<span class='table-stock'>Out of Stock</span>";
                      }

                      
                 

                          
                      
                      ?>
                      
                    </td>
                   
                    <td>
                     <button type="submit" class="btn btn btn-sm" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                          Add To Cart
                      </button>
                    </td>

                    <td>
                      <a href="wishlist.php?remove=<?php echo $fetch_wishlist['wishlist_id'] ?>" onclick="return confirm('Are you sure want to delete this product?');">
                        <i class="fi fi-rs-trash table-trash"></i>
                      </a>
                    </td>
                  </tr>
                  </form>

              <?php
              }
            }
            


            }
            ?>
            

              

            </table>
          </div>
      </section>


      <?php 
      

      
      
      
      
      
      
      
      
      
      
      
      ?>

<!--=============== NEWSLETTER & FOOTER===============-->
<?php include('./includes/footer.php') ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
