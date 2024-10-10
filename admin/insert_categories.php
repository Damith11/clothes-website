<?php 
    include('includes/connect.php');
    session_start();

    if(isset($_POST['inset_cat'])){
        
        $categorie_title=$_POST['categorie_title'];

        
        $categorie_image=$_FILES['categorie_image']['name'];

        $temp_image=$_FILES['categorie_image']['tmp_name'];
        

        // select data form database

        $select_query="SELECT * FROM `categories` WHERE category_title='$categorie_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);

        if($number>0){
            echo "<script>alert('This category is present inside the database')</script>";
        }

        else{

            move_uploaded_file($temp_image,"./category_images/$categorie_image");

            $insert_query="INSERT INTO `categories` (category_title,category_img) VALUES ('$categorie_title','$categorie_image')";
            $result=mysqli_query($con,$insert_query);

            if($result){
                echo "<script>alert('insert sucessfull')</script>";
            }

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
    <link rel="stylesheet" href="css/insert_category.css">

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
                <            <?php 
                
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
                        <li><a href="#" class="active">Insert categories</a></li>
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
        <h1 class="title">Insert Categories</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="info" >

                <div class="input-box">
                    <label for="categorie_title" class="form-lable">Categorie Title</label>
                    <input type="text" name="categorie_title" id="categorie_title" class="form-control" placeholder="Enter Category Title" autocomplete="off" required="required">
                </div>

                <div class="input-box">
                    <label for="categorie_image" class="form-lable">Categorie Image</label>
                    <input type="file" name="categorie_image" id="categorie_image" class="form-control" required="required">
                </div>

                
            </div>
            
            <div class="btn">
                <input type="submit" class="btn_add" value="Insert Category" name="inset_cat">
                <input type="reset" class="btn_Reset" value="Reset" name="inset_cat">   
            </div>
            
        </form>
    </div>


   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>