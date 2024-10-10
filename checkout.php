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


    <title>Ecommerce Website-Checkout</title>
  </head>
  <body>
    <!-- <?php
  // if(!isset($_SESSION['user_email'])){
  //                 echo"                  
  //                       <a href='login-new.php' class='header-user-btn' id='form-open'>
  //                         <i class='fi fi-rs-user header_icon'>
  //                           <p class='icon_name'>Login</p></i>
                        
  //                       </a>
  //                 ";
  //               }
  //               else{
  //                 echo"             
  //                 <a href='login_out.php' class='header-user-btn' id='form-open'>
  //                   <i class='fi fi-rs-user header_icon'>
  //                     <p class='icon_name'>Logout</p></i>
                  
  //                 </a>
  //           ";

  //               }
                
                
                ?> -->

      <!--=============== CHECKOUT ===============-->
      
        <?php 
        
        if(!isset($_SESSION['user_email'])){
          include('sign_in_out.php');
        }
        else{
          include('payment.php');
        }
       ?>





      

  </body>
</html>
