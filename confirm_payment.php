<?php 

include('./admin/includes/connect.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <!--=============== FLATICON ===============-->
     <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>

     <!--=============== SWIPER CSS ===============-->
     <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-straight/css/uicons-regular-straight.css'>
     <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      
    
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- <link rel="stylesheet" href="assets/css/login.css"> -->
    <link rel="stylesheet" href="assets/css/heder.css">

    <style>
      .login-register{
        margin: 50px 0;
      }

      .search_btn {
        top: 4px;
        right: 5px;
      }
  
    </style>

    <title>Ecommerce Website-Login</title>
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

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="section-lg">
        <div class="container grid">

            <?php
                if(isset($_GET['order_id'])){
                    $order_id=$_GET['order_id'];

                    $select_data="SELECT * FROM `user_orders` where order_id=$order_id";
                    $result=mysqli_query($con,$select_data);
                    $row_fetch=mysqli_fetch_assoc($result);

                    $invoce_number=$row_fetch['invoice_number'];
                    $amount_due=$row_fetch['amount_due']; 

                    $select_data="SELECT * FROM `user_table`";
                    $result=mysqli_query($con,$select_data);
                    $row_fetch=mysqli_fetch_assoc($result);
                    
                    
                }          
            
            ?>
         
          <div class="payment_box">
            <h3 class="pay_title">Confirm Payment</h3>

            <form action="" class="form grid" method="post" enctype="multipart/form-data">

                <label for="" class="lable_name">User Name</label>
                <input type="text" placeholder="Username" name="user_username" class="pay_input">

              <label for="" class="lable_name">Invoic Number</label>
              <input type="text" placeholder="invoce number" value="<?php echo $invoce_number ?>" name="invoic_number" class="pay_input">

              <label for="" class="lable_name">Amount</label>
              <input type="text" placeholder="price" value="<?php echo $amount_due ?>" name="amount" class="pay_input">

              <label for="" class="lable_name">Payment Method</label>
              <select class="pay_input" name="payment_mode">
               
                <option>case on deliver</option>
                <option>visa/master</option>
              </select>
           

              <div class="form-btn">
               
                <input type="submit" class="pay_btn" value="paid" name="confirm_payment">
              </div>
            </form>
          </div>

          <?php
          
          if(isset($_POST['confirm_payment'])){
            $invoce_number=$_POST['invoic_number'];
            $amount=$_POST['amount'];
            $payment_mode=$_POST['payment_mode'];

            $insert_query="INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode)
            VALUES ($order_id,$invoce_number,$amount,'$payment_mode')";
            $result=mysqli_query($con,$insert_query);
            if($result){
                echo"<script>alert('Payment successfull')</script>";
                echo"<script>window.open('accounts.php','_self')</script>";

            }
            $update_order="UPDATE `user_orders` SET order_status='complete' WHERE order_id=$order_id";
            $result_orders=mysqli_query($con,$update_order);
        }

          
          
          
          ?>



        </div>
      </section>


      <?php
include('./admin/includes/connect.php');
session_start();

if (isset($_POST['place_order'])) {
    $user_email = $_SESSION['user_email'];
    
    // Fetch user details
    $select_user = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
    $user_query = mysqli_query($con, $select_user);
    $user_data = mysqli_fetch_assoc($user_query);
    $user_id = $user_data['user_id'];
    $user_name = $user_data['username'];

    // Get billing information from the form
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    // Retrieve cart details for the user
    $cart_query = "SELECT * FROM `cart` WHERE user_email='$user_email'";
    $cart_result = mysqli_query($con, $cart_query);
    
    $total_items = 0;
    $total_amount = 0;

    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
        $product_title = $cart_row['name'];
        $quantity = $cart_row['quantity'];
        $price = $cart_row['price'];
        $total_items += $quantity;
        $total_amount += $price * $quantity;

        // Insert into user_order table
        $insert_order = "INSERT INTO `user_order` (user_id, product_title, quantity, price, user_name, user_email, address, payment_method) 
                         VALUES ('$user_id', '$product_title', '$quantity', '$price', '$user_name', '$user_email', '$address', '$payment_method')";
        mysqli_query($con, $insert_order);
    }

    // Insert into user_payment table
    $insert_payment = "INSERT INTO `user_payment` (user_id, user_email, total_items, total_amount)
                       VALUES ('$user_id', '$user_email', '$total_items', '$total_amount')";
    mysqli_query($con, $insert_payment);

    // Clear the cart
    $clear_cart = "DELETE FROM `cart` WHERE user_email='$user_email'";
    mysqli_query($con, $clear_cart);

    echo "<script>alert('Order placed successfully!'); window.location.href = 'thankyou.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <section class="checkout section-lg">
        <div class="checkout-container container grid">
            <!-- Billing details form -->
            <form action="" method="post">
                <input type="text" name="address" placeholder="Address" required>
                <select name="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                </select>
                <button type="submit" name="place_order" class="btn">Place Order</button>
            </form>
        </div>
    </section>
</body>
</html>


  



<!--=============== NEWSLETTER & FOOTER===============-->
<?php include('./includes/footer.php') ?>
  
      <!--=============== SWIPER JS ===============-->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>

      

  </body>
</html>
