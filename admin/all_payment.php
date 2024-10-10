
<?php 

include('includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <style>
        .empty_msg{
            color: red;
            text-align: center;
            font-size: 1.8rem;
            margin-top: 20px;
        }

        .icon{
            font-size: 1.3rem;
        }

    </style>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all_order.css">


</head>
<body>
    
    <!-- sidbar -->

    <section id="sidebar">
        <a href="index.php" class="brand"><i class="fi fi-rs-admin-alt icon"></i>Admin Panel</a>
        <ul class="side-menu">
            <li><a href="index.php" class="active"><i class="fi fi-rs-home icon"></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li>
                <a href=""><i class="fi fi-rs-box-open-full icon"></i> Product <i class="bx bx-chevron-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="view_product.php">View Product</a></li>
                    <li><a href="insert_product.php">Insert Product</a></li>
                </ul>       
            </li>

            <li>
                <a href=""><i class='bx bxs-category-alt icon'></i> Categories <i class="fi fi-rs-angle-small-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="view_categories.php">View Categories</a></li>
                    <li><a href="insert_categories.php">Insert Categories</a></li>
                </ul>       
            </li>

            <li>
                <a href=""><i class="fi fi-rs-brand icon"></i> Brands <i class="fi fi-rs-angle-small-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="view_brand.php">View Brands</a></li>
                    <li><a href="insert_brand.php">Insert Brands</a></li>
                </ul>       
            </li>

            <li class="divider" data-text="Active">Active</li>

            <li>
                <a href="all_order.php"><i class="fi fi-rs-cart-arrow-down icon"></i> All Orders </a>
            </li>

            <li>
                <a href="all_payment.php"> <i class="fi fi-rs-wallet icon "></i> All Payment </a>
            </li>

            <li>
                <a href="user_list.php"><i class="fi fi-rs-users-alt icon "></i> User List</a>
            </li>    

        </ul>
    </section>

    <!-- navbar -->

    <section id="content">

        <nav>
            <i class="fi fi-rs-burger-menu toggle-sidebar"></i>
            <form action="">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>

            <a href="" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">8</span>
            </a>

            <a href="" class="nav-link">
                <i class='bx bxs-message-dots' ></i>
                <span class="badge">8</span>
            </a>

            <span class="divider"></span>
            <div class="profile">
            <?php 
                
                if(isset($_SESSION['admin_email'])){
                    $admin_email=$_SESSION['admin_email'];
                    $select_admin=mysqli_query($con,"SELECT * FROM `admin` WHERE admin_email='$admin_email'");
                    
                    $row_data=mysqli_fetch_assoc($select_admin);
                    $admin_name=$row_data['admin_name'];
                    $admin_image=$row_data['admin_image'];

                    echo"
                    <img src='img/$admin_image' alt=''>
                        <ul class='profile-link'>
                            <li><a href='admin_profile.php'><i class='bx bxs-user-circle' ></i>$admin_name</a></li>
                            
                            <li><a href='admin_logout.php'><i class='bx bx-log-out'></i>Log Out</a></li>
                        </ul>
                    
                    ";
                
                
                }

                else{
                    echo"
                    <img src='images/profile-1.jpg' alt=''>
                    <ul class='profile-link'>
                        <li><a href='admin_login.php.php'><i class='bx bxs-user-circle' ></i>Profile</a></li>
                        <li><a href='admin_login.php'><i class='bx bx-log-out'></i>Log in</a></li>
                    </ul>
                    
                    ";

                }
                ?>
            </div>
        </nav>

        <!-- main  -->
        <main>
            <div class="head-title">
                  <div class="left">
                     <h1 class="title">Dashboard</h1>
                    <ul class="breadcrumbs">
                        <li><a href="index.php">Home</a></li>
                        <li class="divider">/</li>
                        <li><a href="" class="active">All Payment</a></li>
                    </ul> 
                  </div>
                 
                     <a href="report_pdf.php" class="btn-download">
                        <i class='bx bxs-cloud-download icon'> </i>
                        <span class="text">Payment Report</span>
                    </a> 
            </div>

            <!---------------   --------------------------->

            <div class="table">
                <div class="table_header">
                    <p>All Payment</p>
                    <div class="">
                        <input type="search" placeholder="Search...." name="" id="">
                        <button class="search_btn">
                            <i class="fi fi-rs-search "></i>
                        </button>
                        
                    </div>
                </div>

                <div class="table-section">
                    <table>
                        <thead>
                            <?php
                            
                            $get_payment="SELECT * FROM `payment_order`";
                            $result=mysqli_query($con,$get_payment);
                            $row_count=mysqli_num_rows($result);
                            
                            if($row_count==0){
                                echo"<h2 class='empty_msg>No Payment Received.....</h2>";
                            }
                            else{
                                echo"
                                    <tr>
                                        <th>SL No</th>
                                        <th>User Email</th>
                                        <th>Amount</th>
                                        <th>Total Item</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                ";

                                $number=0;
                                while($row_data=mysqli_fetch_assoc($result)){
                                    $pay_id=$row_data['pay_id'];
                                    $user_email=$row_data['user_email'];
                                    $amount=$row_data['amount'];
                                    $total_items=$row_data['total_items'];
                                   
                                    $date=$row_data['date'];
                                    $number++;

                                    ?>

                                      <tbody>
                                        <tr>
                                            <td><?php echo $number ?></td>
                                            <td><?php echo $user_email ?></td>
                                            <td><?php echo number_format($amount) ?>$</td>
                                            <td><?php echo $total_items ?></td>
                                            <td><?php echo $date ?></td>
                                            <td>
                                                <a href="delete_payment.php?delete_payment=<?php echo $pay_id; ?>" onclick="return confirm('Are you sure want to delete this product?');"class='ta_icon'>
                                                        <i class='bx bx-trash'></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }
                            
                            
                            ?>
                           

                        </tbody>
                    </table>
                </div>
                    <div class="pagination">
                        <!-- <div><i class='bx bxs-chevrons-left' ></i></div>
                        <div><i class='bx bxs-chevron-left'></i></div>
                        <div>1</div>
                        <div>2</div>
                        <div><i class='bx bxs-chevron-right'></i></div>
                        <div><i class='bx bxs-chevrons-right' ></i></div> -->
                    </div>
            </div>
            

        </main>

    </section>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>