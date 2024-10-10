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

    <link rel="stylesheet" href="css/style.css">

    <style>
        .icon{
            font-size: 1.3rem;
        }
    </style>

</head>
<body>
    
    <!-- sidbar -->

    <section id="sidebar">
        <a href="index.php" class="brand"><i class="fi fi-rs-admin-alt icon"></i>Admin Panel</a>
        <ul class="side-menu">
            <li><a href="index.php" class="active"><i class="fi fi-rs-home icon"></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li>
                <a href="#"><i class="fi fi-rs-box-open-full icon"></i> Product <i class="bx bx-chevron-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="view_product.php">View Product</a></li>
                    <li><a href="insert_product.php">Insert Product</a></li>
                </ul>       
            </li>

            <li>
                <a href="#"><i class='bx bxs-category-alt icon'></i> Categories <i class="fi fi-rs-angle-small-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="view_categories.php">View Categories</a></li>
                    <li><a href="insert_categories.php">Insert Categories</a></li>
                </ul>       
            </li>

            <li>
                <a href="#"><i class="fi fi-rs-brand icon"></i> Brands <i class="fi fi-rs-angle-small-right icon-right"></i></a>
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
                        <li><a href="index.php" class="active">Dashboard</a></li>
                    </ul> 
                  </div>
                 
                    <a href="report_full.php" class="btn-download">
                        <i class='bx bxs-cloud-download icon'> </i>
                        <span class="text">Summary Report</span>
                    </a> 
                
                   



            </div>
            
       
            

            <!---------------   --------------------------->

                <div class="info-data">   
                    <div class="card">
                        <div class="head">
                            <div class="">
                                <h2>All Orders</h2>
                                <p>Traffic</p>
                            </div>
                            <i class='bx bx-trending-up icon' ></i>
                        </div>
                        <?php 
                        $select_orders=mysqli_query($con,"SELECT * FROM `orders`");
                        $row_count=mysqli_num_rows($select_orders);
                        
                        ?>
                        <span class="progress" data-value="<?php echo $row_count ?>%"></span>
                        <span class="label"><?php echo $row_count ?>%</span>
                    </div>
                 

                
                    <div class="card">
                        <div class="head">
                            <div class="">
                                <h2>All Payments</h2>
                                <p>Traffic</p>
                            </div>
                            <i class='bx bx-trending-down icon down' ></i>
                        </div>
                        <?php 
                        $select_pay=mysqli_query($con,"SELECT * FROM `payment_order`");
                        $row_count=mysqli_num_rows($select_pay);
                        
                        ?>
                        <span class="progress" data-value="<?php echo $row_count ?>%"></span>
                        <span class="label"><?php echo $row_count ?>%</span>
                    </div>
                

                
                    <div class="card">
                        <div class="head">
                            <div class="">
                                <h2>Product Available</h2>
                                <p>Traffic</p>
                            </div>
                            <i class='bx bx-trending-up icon' ></i>
                        </div>
                        <?php 
                        $select_product=mysqli_query($con,"SELECT * FROM `product`");
                        $row_count=mysqli_num_rows($select_product);
                        
                        ?>
                        <span class="progress" data-value="<?php echo $row_count ?>%"></span>
                        <span class="label"><?php echo $row_count ?>%</span>
                    </div>
                

                
                    <div class="card">
                        <div class="head">
                            <div class="">
                                <h2>Users</h2>
                                <p>Traffic</p>
                            </div>
                            <i class='bx bx-trending-up icon' ></i>
                        </div>
                        <?php 
                        $select_user=mysqli_query($con,"SELECT * FROM `user_table`");
                        $row_count=mysqli_num_rows($select_user);
                        
                        ?>
                        <span class="progress" data-value="<?php echo $row_count ?>%"></span>
                        <span class="label"><?php echo $row_count ?>%</span>
                    </div>
                 </div>

                
                <div class="data">
                    <div class="content-data">
                        <div class="head">
                            <h3>Sales Report</h3>
                            <div class="menu">
                                <i class='bx bx-dots-horizontal-rounded icon'></i>
                                <ul class="menu-link">
                                     <li><a href="">Edit</a></li>
                                     <li><a href="">Save</a></li>
                                     <li><a href="">Remove</a></li>
                                </ul>                   
                            </div>
                        </div>
                        <div class="chart">
                            <div id="chart"> </div>
                        </div>

                    </div>

                    <div class="content-data">
                        <div class="head">
                            <h3>Chat Box</h3>
                            <div class="menu">
                                <i class='bx bx-dots-horizontal-rounded icon'></i>
                                <ul class="menu-link">
                                    <li><a href="">Edit</a></li>
                                    <li><a href="">Save</a></li>
                                    <li><a href="">Remove</a></li>
                               </ul>  
                            </div>
                        </div>
                        <div class="chat-box">
                            <p class="day"><span>Today</span></p>
                            <div class="msg">
                                <img src="images/profile-2.jpg" alt="">
                                <div class="chat">
                                    <div class="profile">
                                       <span class="username">Alan</span> 
                                       <span class="time">10.30</span>
                                    </div>
                                    <p>Hello</p>
                                </div>
                            </div>

                            <div class="msg me">    
                                <div class="chat">
                                    <div class="profile">
                                       <span class="time">10.30</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusamus voluptatum ipsam dignissimos error alias nemo nulla sed iusto odio inventore dolor, ipsum perferendis voluptatibus optio nihil reiciendis est a.</p>    
                                </div>         
                            </div>

                            <div class="msg me">    
                                <div class="chat">
                                    <div class="profile">
                                       <span class="time">10.30</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusamus voluptatum ipsam.</p>    
                                </div>         
                            </div>

                            <div class="msg me">    
                                <div class="chat">
                                    <div class="profile">
                                       <span class="time">10.30</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusamus voluptatum ipsam dignissimos error alias nemo nulla sed iusto odio inventore dolor, ipsum perferendis .</p>    
                                </div>         
                            </div>

                        </div>

                        <form action="">

                            <div class="form-group">
                                <input type="text" placeholder="Type.....">
                                <button type="submit" class="btn-send"> <i class='bx bxs-send' ></i></button>
                            </div>

                        </form>

                    </div>

                </div>


        </main>

    </section>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>