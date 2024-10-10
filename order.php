<?php

// include('./admin/includes/connect.php');
// session_start();

// ?>


 <?php

//       if(isset($_GET['user_id']))  {
//         $user_id=$_GET['user_id'];
        
//       }

//       $user_email=$_SESSION['user_email'];

//       $total_price=0;
//       $cart_query_price="SELECT * FROM `cart` WHERE user_email='$user_email'";
//       $result_cart_price=mysqli_query($con,$cart_query_price);
//       $fetch_cart_product=mysqli_fetch_assoc($result_cart_price);
//       $invoce_number=mt_rand();
//       $status='pending';
//       $count_product=mysqli_num_rows($result_cart_price);

//     //   $product_id=$fetch_cart_product['product_id'];
//     //   $product_title=$fetch_cart_product['name'];
//     //   $user_email=$fetch_cart_product['user_email'];


//       while($row_price=mysqli_fetch_array($result_cart_price)){
//         $product_id=$row_price['product_id'];
//         $select_product="SELECT * FROM `product` WHERE product_id=$product_id";
//         $run_product=mysqli_query($con,$select_product);

//         while($row_product_price=mysqli_fetch_array($run_product)){

//             $product_price=array($row_product_price['new_price']);
//             $product_value=array_sum($product_price);
//             $total_price+=$product_value;

//             $item_available=$row_product_price['item_available'];
//             $update_item=$item_available-1;

//             $update_items="UPDATE `product` SET item_available='$update_item' WHERE product_id=$product_id";
//             $result_query=mysqli_query($con,$update_items);
//         }

//       }

//     //   geting quntity in cart

//     $get_cart="SELECT * FROM `cart`";
//     $run_cart=mysqli_query($con,$get_cart);
//     $get_item_quntity=mysqli_fetch_array($run_cart);
//     $quantity=$get_item_quntity['quantity'];
//     $product_id=$get_item_quntity['product_id'];

//     if($quantity==0){
//         $quantity=1;
//         $sub_total=$total_price;
//     }
//     else{
//         $quantity=$quantity;
//         $sub_total=$total_price*$quantity;
//     }

//     $insert_order="INSERT INTO `user_orders` (user_id,product_id,amount_due,invoice_number,total_product,order_date,order_status)
//                              VALUES ($user_id,$product_id,$sub_total,$invoce_number,$count_product,NOW(),'$status')";
//     $result_query=mysqli_query($con,$insert_order);
//     if($result_query){
//         echo "<script> alert('order submition succfull')</script>";
//         echo "<script> window.open('accounts.php','_self')</script>";
//     }
//     else{
//         echo "<script> alert('error')</script>";
//     }


//     $insert_pending_order="INSERT INTO `orders_pending` (user_id,invoice_number,product_id,quantity,order_status)
//     VALUES ($user_id,$invoce_number,$product_id,$quantity,'$status')";
//     $result_pending_order=mysqli_query($con,$insert_pending_order);


//     $user_email=$_SESSION['user_email'];
//     $empty_cart="DELETE FROM `cart` WHERE user_email='$user_email'";
//     $result_delete=mysqli_query($con,$empty_cart);

?>









<?php

// include('./admin/includes/connect.php');
// session_start();

// if (!isset($_SESSION['user_email'])) {
//     echo "<script>alert('User not logged in'); window.open('login.php', '_self');</script>";
//     exit();
// }

// if (isset($_GET['user_id'])) {
//     $user_id = intval($_GET['user_id']);
// } else {
//     echo "<script>alert('User ID not provided'); window.open('accounts.php', '_self');</script>";
//     exit();
// }

// $user_email = $_SESSION['user_email'];
// $total_price = 0;
// $invoce_number = mt_rand();
// $status = 'pending';

// // Fetch cart items and calculate total price
// $cart_query_price = "SELECT * FROM `cart` WHERE user_email='$user_email'";
// $result_cart_price = mysqli_query($con, $cart_query_price);
// $count_product = mysqli_num_rows($result_cart_price);

// while ($row_price = mysqli_fetch_assoc($result_cart_price)) {
//     $product_id = $row_price['product_id'];
//     $select_product = "SELECT * FROM `product` WHERE product_id=$product_id";
//     $run_product = mysqli_query($con, $select_product);

//     while ($row_product_price = mysqli_fetch_assoc($run_product)) {
//         $product_price = $row_product_price['new_price'];
//         $total_price += $product_price;

//         $item_available = $row_product_price['item_available'];
//         $update_item = $item_available - 1;

//         $update_items = "UPDATE `product` SET item_available='$update_item' WHERE product_id=$product_id";
//         mysqli_query($con, $update_items);
//     }
// }

// // Get quantity in cart
// $get_cart = "SELECT * FROM `cart` WHERE user_email='$user_email'";
// $run_cart = mysqli_query($con, $get_cart);
// $quantity = 0;
// while ($get_item_quantity = mysqli_fetch_assoc($run_cart)) {
//     $quantity += $get_item_quantity['quantity'];
// }
// if ($quantity == 0) {
//     $quantity = 1;
// }
// $sub_total = $total_price * $quantity;

// // Insert order into user_orders
// $insert_order = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_product, order_date, order_status)
//     VALUES ($user_id, $sub_total, $invoce_number, $count_product, NOW(), '$status')";
// $result_query = mysqli_query($con, $insert_order);

// if ($result_query) {
//     // Insert order details into orders_pending
//     $result_cart_price = mysqli_query($con, $cart_query_price); // Fetch cart items again to insert into orders_pending
//     while ($row_price = mysqli_fetch_assoc($result_cart_price)) {
//         $product_id = $row_price['product_id'];
//         $product_quantity = $row_price['quantity']; // Assuming cart table has quantity field

//         $insert_pending_order = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status)
//         VALUES ($user_id, $invoce_number, $product_id, $product_quantity, '$status')";
//         mysqli_query($con, $insert_pending_order);
//     }

//     // Empty the cart
//     $empty_cart = "DELETE FROM `cart` WHERE user_email='$user_email'";
//     mysqli_query($con, $empty_cart);

//     echo "<script>alert('Order submission successful'); window.open('accounts.php', '_self');</script>";
// } else {
//     echo "<script>alert('Error placing order');</script>";
// }

?>
