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
    <link rel="stylesheet" href="css/admin_profile.css">

    <style>
        .btn_add,
        .btn_Reset {
            border: none;
            cursor: pointer;
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
                        <li><a href="index.html">Home</a></li>
                        <li class="divider">/</li>
                        <li><a href="index.html" class="active">Profile</a></li>
                    </ul> 
                  </div>
                 
                     
            </div>
            
       
            <div class="wrapper">
                <h1 class="title">Admin Profile</h1>
        
                <form action="" method="post" enctype="multipart/form-data">

                <?php 
                
                $admin_email=$_SESSION['admin_email'];
                $admin_details="SELECT * FROM `admin` WHERE admin_email='$admin_email'";
                $admin_result=mysqli_query($con,$admin_details);
                $row_fetch=mysqli_fetch_assoc($admin_result);

                $admin_id=$row_fetch['admin_id'];
                $admin_image=$row_fetch['admin_image'];
                $admin_name=$row_fetch['admin_name'];
                $admin_email=$row_fetch['admin_email'];
                $admin_address=$row_fetch['admin_address'];
                $admin_mobile=$row_fetch['admin_mobile'];

                  
               if(isset($_POST['admin_update'])){
                $update_id=$admin_id;
                $admin_name=$_POST['admin_name'];
                $admin_email=$_POST['admin_email'];
                $admin_address=$_POST['admin_address'];
                $admin_mobile=$_POST['admin_mobile'];
                $admin_image=$_FILES['admin_image']['name'];
                $admin_img_tmp=$_FILES['admin_image']['tmp_name'];

                move_uploaded_file($admin_img_tmp,"img/$admin_image");

                $update_data="UPDATE `admin` SET admin_name='$admin_name',admin_email='$admin_email',admin_image='$admin_image',admin_address='$admin_address',admin_mobile='$admin_mobile' WHERE admin_id=$update_id";
                $update_result=mysqli_query($con,$update_data);
                if($update_result){
                  echo"<script>alert('update successfull')</script>";
                }

              }
               
                ?>


                    <div class="info">

                        <div class="admin_img_box">
                            <img src="img/<?php echo $admin_image ?>" class="admin_dp" alt="">
                        </div>
                        <input type="file" name="admin_image" id="admin_image"  class="img_input" required="required">

        
                        <div class="input-box">
                            <label for="admin_username" class="form-lable">Admin User Name:</label>
                            <input type="text" id="admin_name" value="<?php echo $admin_name ?>" name="admin_name"  class="form-control" placeholder="Enter Admin User Name" autocomplete="off" required="required">
                            <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">
                        </div>

                        <div class="input-box">
                            <label for="admin_email" class="form-lable">Admin Email:</label>
                            <input type="email" name="admin_email" id="admin_email" value="<?php echo $admin_email ?>" class="form-control" placeholder="Enter Admin Email" autocomplete="off" required="required">
                        </div>
        
                        <div class="input-box">
                            <label for="admin mobile" class="form-lable">Admin mobile:</label>
                            <input type="text" name="admin_mobile" id="admin_mobile" value="<?php echo $admin_mobile ?>" class="form-control" placeholder="Enter Admin mobile" autocomplete="off" required="required">
                        </div>
        
                       <div class="input-box">
                            <label for="admin_address" class="form-lable">Admin Address:</label>
                            <input type="text" name="admin_address" id="admin_address" value="<?php echo $admin_address ?>" class="form-control" placeholder="Enter Admin Address" autocomplete="off" required="required">
                        </div>
        
                                
                        
                    </div>
                    
                    <div class="btn">
                    <input type="submit" class="btn_add" value="Update" name="admin_update">
                    <input type="reset" class="btn_Reset" value="Reset" name="reset_product">  
                        
                    </div>
                    
                </form>
            </div>
        

           

                

        </main>

    </section>

    






   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>