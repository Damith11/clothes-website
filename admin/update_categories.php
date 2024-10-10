

<?php

include('includes/connect.php');
session_start();

if(isset($_POST['update_category'])){
    $category_id=$_POST['category_id'];
    $category_title=$_POST['category_title'];

    $category_image=$_FILES['category_image']['name'];
    $temp_image=$_FILES['category_image']['tmp_name'];

    move_uploaded_file($temp_image,"./category_images/$category_image");

    $update_category="UPDATE `categories` SET category_title='$category_title',category_img='$category_image' WHERE category_id='$category_id'";
    $result_query=mysqli_query($con,$update_category);

    if($result_query){
        echo "<script>alert('successfull')</script>";
        echo "<script>window.open('view_categories.php','_self')</script>";

    }
    else{
        echo "<script>alert('error')</script>";
    }

    
}



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
    <link rel="stylesheet" href="css/update_cat.css">

    <style>
        .btn_add,
        .btn_Reset {
            border: none;
            cursor: pointer;
        }

        .update_img{
            width: 100px;
    position: relative;
    top: 10px;
   
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
                        <li><a href="view_product.php">View Product</a></li>
                        <li class="divider">/</li>
                        <li><a href="#" class="active">Edit Product</a></li>
                    </ul> 
                  </div>
                 
                    <!-- <a href="#" class="btn-download">
                        <i class='bx bxs-cloud-download icon'></i>
                        <span class="text">Download PDF</span>
                    </a>  -->
            </div>

            <!---------------   --------------------------->

            

        </main>

    </section>

    <div class="wrapper">
        <h1 class="title">Edit categories</h1>

        <?php 
           if(isset($_GET['update_categories'])){
            $update_cat_id=$_GET['update_categories'];
           
            

            $select_categories="SELECT * FROM `categories` WHERE category_id=$update_cat_id";
            $result_categories=mysqli_query($con,$select_categories);
            $row_category=mysqli_fetch_assoc($result_categories);
            $category_id=$row_category['category_id'];
            $category_title=$row_category['category_title']; 
            $category_img=$row_category['category_img'];
           

           }    
            
        
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="info">

                    

                <div class="input-box">
                    <label for="category_title" class="form-lable">Category Title</label>
                    <input type="text" name="category_title" id="category_title" value="<?php echo $category_title; ?>" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">

                    <input type="hidden" value="<?php echo $category_id; ?>" name="category_id">
                </div>             

                <div class="input-box">
                    <label for="category_image" class="form-lable">Category Image</label>
                    <input type="file" name="category_image" id="category_image" class="form-control" required="required">
                </div>
                <div class="input-box">
                    <img src="./category_images/<?php echo $category_img ?>" alt="" class="update_img"> 
                </div>

              
                
            </div>
            
            <div class="btn">
                <input type="submit" class="btn_add" value="Update Category" name="update_category">
                <input type="reset" class="btn_Reset" value="Reset" >     
            </div>
            
        </form>
    </div>




   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>