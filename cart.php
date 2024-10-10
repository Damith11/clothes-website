<?php 



include('./admin/includes/connect.php');
session_start();


      if(isset($_POST['update_product_qty'])){
        $update_value=$_POST['update_quntity'];
        $update_id=$_POST['update_quntity_id'];

        $update_quntity_query=mysqli_query($con,"UPDATE `cart` SET quantity=$update_value WHERE cart_id=$update_id");
        if($update_quntity_query){
          header('location:cart.php');
        }

      }


      if(isset($_GET['remove'])){
        $remove_id=$_GET['remove'];
        
        mysqli_query($con,"DELETE FROM `cart` WHERE cart_id=$remove_id");
        header('location:cart.php');   

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
      .table tr th:nth-child(5), .table tr td:nth-child(5) {
    width: 85px;
}
      .qty_th{
        width: 100px;
      }
      .update{
        position: relative;
      }

      .empty_text{
            color: red;
            text-align: center;
            margin: 30px 20px;
            font-size: 1.5rem;
        }
    </style>


    <title>Ecommerce Website-Cart</title>
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
                  <a href="shop.php" class="hide active_link">Shop</a>
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
            <li><span class="breadcrumb-link">Shop</span></li>
            <li><span class="breadcrumb-link">></span></li>
            <li><span class="breadcrumb-link">Cart</span></li>
          </ul>
        </section>
      <!--=============== CART ===============-->
      <section class="cart container section-lg">
        <div class="table-container">

          <?php 

            if(isset($_SESSION['user_email'])){
            $user_email=$_SESSION['user_email'];
          
            $select_cart_product="SELECT * FROM `cart` WHERE user_email='$user_email'";
            $result_cart=mysqli_query($con,$select_cart_product);
            $sub_total=0;

            if(mysqli_num_rows($result_cart)>0){

             echo"       <table class='table'>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>items available</th>
                              <th>Quantity</th>
                              <th class='qty_th'></th>
                              <th>Subtotal</th>
                              <th>Remove</th>
                            </tr>
                    ";

              while($fetch_cart_product=mysqli_fetch_assoc($result_cart)){
                ?>

                  <tr>
                    <td>
                      <img src="./admin/product_images/<?php echo $fetch_cart_product['image'] ?>" alt="" class="table-img">
                    </td>

                    <td>
                      <h3 class="table-title"><?php echo $fetch_cart_product['name'] ?></h3>
                      <!-- <p class="table-description">A brand-new and unworn item in the original packaging and with the original tags attached.</p> -->
                    </td>

                    <td><span class="table-price">$ <?php echo number_format($fetch_cart_product['price'])  ?></span></td>
                    <td><span><?php echo $fetch_cart_product['item_available'] ?></span></td>
                    

                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="update_quntity_id" value="<?php echo $fetch_cart_product['cart_id'] ?>">
                        <input type="number" name="update_quntity" value="<?php echo $fetch_cart_product['quantity'] ?>" min="1" class="quantity">
                        
                        
                    </td>
                    <td>
                      <button type="submit" class="btn btn--md update" name="update_product_qty">
                          <i class="fi-rs-shuffle"></i>
                        </button>
                    </td>
                    </form>
                    <td><span class="table-subtotal">$ <?php echo number_format($fetch_cart_product['price']*$fetch_cart_product['quantity'])  ?></span></td>

                    <td>
                      <a href="cart.php?remove=<?php echo $fetch_cart_product['cart_id'] ?>" onclick="return confirm('Are you sure want to delete this product?');">
                        <i class="fi fi-rs-trash table-trash"></i>
                      </a>
                    </td>
                  </tr>



                <?php
                
                $sub_total=$sub_total+($fetch_cart_product['price']*$fetch_cart_product['quantity']);
              }

            }
            else{
              echo "<div class='empty_text'>No products Available</div> ";
            }
          
            ?>
       
       

          </table>
        </div>

        <div class="cart-actions">
          
            <a href="checkout.php" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Proceed To checkout
            </a>

            <!-- <form action="" method="POST"> -->
        <!-- Any additional details or summary can be added here -->
        
                <!-- <button type="submit" name="checkout" class="btn flex btn--md"><i class="fi fi-rs-box-alt"></i>Proceed To Checkout</button>
             </form> -->

          <a href="shop.php" class="btn flex btn--md">
            <i class="fi-rs-shopping-bag"> Continue Shopping</i>
          </a>

        </div>

      

        <div class="divider">
          <i class="fi-rs-fingerprint"></i>
        </div>
            <!-- ------------------------------------------------------------------------------------------------------------- -->
        
        
        <div class="cart-group grid">
          <!-- <div>
            <div class="cart-shipping">
              <h3 class="section-title">Calculate Shipping</h3>

              <form action="" class="form grid">
                <input type="text" placeholder="State/Country" class="form-input_shoping">

                <div class="form-group grid">
                  <input type="text" placeholder="City" class="form-input_shoping">
                  <input type="text" placeholder="PostCode / Zip Code" class="form-input_shoping">
                </div>

                <div class="form-btn">
                  <button class="btn flex btn-sm">
                    <i class="fi-rs-shuffle"></i> Update
                  </button>
                </div>

              </form>
            </div>

            <div class="cart-coupon">
              <h3 class="section-title">Apply Coupon</h3>

              <form action="" class="coupon-form form grid">
                <div class="form-group grid">
                  <input type="text" class="form-input_shoping" placeholder="Enter Your Coupon">

                  <div class="form-btn">
                    <button class="btn flex btn-sm">
                      <i class="fi-rs-label"></i> Apply
                    </button>
                  </div>

                </div>

              </form>

            </div>


          </div> -->

          
          <!-- <div class="cart-total">
            <h3 class="section-title">Cart Total</h3>

            <table class="cart-total-table">

              <tr>
                <td><span class="cart-total-title">Cart Subtotal</span></td>
                <td><span class="cart-total-price">$ <?php echo number_format($sub_total);  ?></span></td>
              </tr>

              <tr>
                <td><span class="cart-total-title">Shipping</span></td>
                <td><span class="cart-total-price">$10.00</span></td>
              </tr>

              <tr>
                <td><span class="cart-total-title">Total</span></td>
                <td><span class="cart-total-price">$ <?php echo number_format($sub_total) ?></span></td>
              </tr>

            </table>

            <a href="checkout.php" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Proceed To checkout
            </a>
          </div> -->

        </div>
        <?php
          }
            else{
              echo "<div class='empty_text'>No products Available! Plase register</div> ";
            }
          
          
          ?>
      </section>




<!--=============== NEWSLETTER & FOOTER===============-->
<?php include('./includes/footer.php') ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
