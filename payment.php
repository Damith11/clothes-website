<?php 

include('./admin/includes/connect.php');
// session_start();

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
      .checkout-group:nth-child(1) {
        border: 1px solid rgb(3 3 3);
        background: #e9ecef;
        border-radius: 0.5rem;
      }
      .checkout-group:nth-child(2) {
        border: 1px solid rgb(3 3 3);
        background: #e9ecef;
      }
      .search_btn {
        top: 4px;
        right: 5px;
      }

      .heding{
        margin: 32px 0 22px 34px;
      }

      .bil_input{
        border: 1px solid hsl(0deg 0% 0%);
        padding-inline: 1rem;
        height: 45px;
        border-radius: 0.25rem;
        font-size: var(--small-font-size);
        width: 550px;
        margin-left: 30px;
        color: #000;
        font-weight: 600;
      }
    </style>


    <title>Ecommerce Website-Checkout</title>
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
              <a href="about_us.php" class="hide">About Us</a>
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
          <li><span class="breadcrumb-link">Checkout</span></li>
        </ul>
      </section>

      <!--=============== CHECKOUT ===============-->
      

      <section class="checkout section-lg">
        <div class="checkout-container container grid">
          <div class="checkout-group">
            <h3 class="section-title heding">Billing Details</h3>

            <form action="" class="form grid" method="post">
              <?php 
              if(isset($_SESSION['user_email'])){
                $user_email=$_SESSION['user_email'];
                $select_product=mysqli_query($con,"SELECT * FROM `user_table` WHERE user_email='$user_email'");
                
                $row_data=mysqli_fetch_assoc($select_product);
                $user_name=$row_data['username'];
                $user_address=$row_data['user_address'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $user_email=$row_data['user_email'];
               
              }
              
              
              ?>
              <input type="text" name="user_name" value="<?php echo $user_name ?>" placeholder="Name" class="bil_input">
              <input type="text" name="user_address" value="<?php echo $user_address ?>" placeholder="Address" class="bil_input">
              <input type="text" name="postcode" placeholder="Postcode" class="bil_input">
              <input type="text" name="user_phone" value="<?php echo $user_mobile ?>" placeholder="Phone" class="bil_input">
              <input type="email" name="user_email" value="<?php echo $user_email ?>" placeholder="Email" class="bil_input">

  
          </div>

          <div class="checkout-group">
                


            <h3 class="section-title">Cart Total</h3>
            <?php
             
             if(isset($_SESSION['user_email'])){
                $user_email=$_SESSION['user_email'];
                $select_cart_product=mysqli_query($con,"SELECT * FROM `cart` WHERE user_email='$user_email'");
                $sub_total=0;
    
                if(mysqli_num_rows($select_cart_product)>0){

                  echo"
                          <table class='order-table'>
                            <tr>
                              <th colspan='2'>Products</th>
                              <th>Total</th>
                            </tr>
                  
                  ";

                  while($fetch_cart_product=mysqli_fetch_assoc($select_cart_product)){
                    ?>         

              <tr>
                <td>
                  <img src="./admin/product_images/<?php echo $fetch_cart_product['image'] ?>" alt="" class="order-img">
                </td>

                <td>
                  <h3 class="table-title"><?php echo $fetch_cart_product['name'] ?></h3>
                  <p class="table-quantity">x <?php echo $fetch_cart_product['quantity'] ?></p>
                </td>

                <td>
                  <span class="table-price">$ <?php echo number_format($fetch_cart_product['price'])  ?></span>
                </td>

              </tr>
              <?php 
                  
              $shiping=100;
              $sub_total=$sub_total+($fetch_cart_product['price']*$fetch_cart_product['quantity']);
              $total=$sub_total+$shiping;
                  }
                ?>

              <tr>
                <td><span class="order-subtitle">SubTotal</span></td>   
                <td colspan="2">
                  <span class="table-price">$ <?php echo number_format ($sub_total)?></span>
                </td>
              </tr>

              <tr>
                <td><span class="order-subtitle">Shipping</span></td>
                <td colspan="2">
                  <span class="table-price">$ <?php echo number_format ($shiping)?></span>
                </td>
              </tr>

              <tr>
                <td><span class="order-subtitle">Total</span></td>
                <td colspan="2">
                  <span class="order-grand-total">$ <?php echo number_format ($total)?></span>
                </td>
              </tr>

              <?php
                  }
                  
                }
                
              
              else{
                echo"<p>no product</p>";
              }
                ?>

            </table>
            

            <div class="payment-methods">

          

              <label for="" class="lable_name">Payment Method</label>
              <select class="pay_input" name="payment_mode">
               
                <option>cash on delivery</option>
                <option>visa/master</option>
                <option>PayPal</option>
              </select>         
              
            </div>

            <button type="submit" name="place_order" class="btn btn--md">Place Order</button>
           </form>
            <?php
            // if(!isset($_SESSION['user_email'])){

            // }
            // else{
            // $user_email=$_SESSION['user_email'];
            // $select_cart_product="SELECT * FROM `user_table` WHERE user_email='$user_email'";
            // $request_query=mysqli_query($con,$select_cart_product);
            // $run_query=mysqli_fetch_array($request_query);
            // $user_id=$run_query['user_id'];
            // }
            
            
            ?>

            <!-- <a href="order.php?user_id=<?php echo $user_id; ?>"class="btn btn--md">Place Order</a> -->
            <!-- <button class="btn btn--md">Place Order</button> -->

          </div>

        </div>
      </section>


      <?php


if (isset($_POST['place_order'])) {
    $user_email = $_SESSION['user_email'];
    
    // Fetch user details
    $select_user = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
    $user_query = mysqli_query($con, $select_user);
    $user_data = mysqli_fetch_assoc($user_query);
    $user_id = $user_data['user_id'];
    $user_name = $user_data['username'];

    // Get billing information from the form
    $user_address = $_POST['user_address'];
    $postcode = $_POST['postcode'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
   
    $payment_mode = $_POST['payment_mode'];

    // Retrieve cart details for the user
    $cart_query = "SELECT * FROM `cart` WHERE user_email='$user_email'";
    $cart_result = mysqli_query($con,$cart_query);
    
    $total_items = 0;
    $total_amount = 0;

    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
        $product_id = $cart_row['product_id'];
        $product_title = $cart_row['name'];
        $quantity = $cart_row['quantity'];
        $price = $cart_row['price'];
        $total_items += $quantity;
        $total_amount += $price * $quantity;

        // Insert into user_order table
        $insert_order = "INSERT INTO `orders`(user_id,product_title,quantity,price,user_name,user_email,address,payment_method,postcode,user_phone,date) 
                         VALUES ($user_id,'$product_title',$quantity,'$price','$user_name','$user_email','$user_address','$payment_mode','$postcode','$user_phone',NOW())";
        mysqli_query($con,$insert_order);

            $select_product = "SELECT * FROM `product` WHERE product_id=$product_id";
            $run_product = mysqli_query($con, $select_product);

            while ($row_product_price = mysqli_fetch_assoc($run_product)) {
              

                $item_available = $row_product_price['item_available'];
                $update_item = $item_available - $quantity;

                $update_items = "UPDATE `product` SET item_available='$update_item' WHERE product_id=$product_id";
                mysqli_query($con, $update_items);
            }

        if(!$insert_order){
      echo"<script>alert('Error!')</script>";
    }
    }
    
    

    // Insert into user_payment table
    $insert_payment = "INSERT INTO `payment_order` (user_id,user_email,total_items,amount,date)
                       VALUES ($user_id,'$user_email',$total_items,'$total_amount',NOW())";
    mysqli_query($con,$insert_payment);

    // Clear the cart
    $clear_cart = "DELETE FROM `cart` WHERE user_email='$user_email'";
    mysqli_query($con, $clear_cart);

    echo "<script>alert('Order placed successfully!'); window.location.href = 'accounts.php';</script>";
}
?>




        <!--=============== NEWSLETTER & FOOTER===============-->
        <?php include('./includes/footer.php') ?>
      <!--=============== SWIPER JS ===============-->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>

  </body>
</html>
