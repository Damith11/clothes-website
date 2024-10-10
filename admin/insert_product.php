<?php

include('includes/connect.php');
session_start();

if(isset($_POST['inset_product'])){

    $admin_email=$_SESSION['admin_email'];
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keyword=$_POST['product_keyword'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $offer=$_POST['offer'];
    $new_price=0;
    $year_manufactured=$_POST['year_manufactured'];
    $weight=$_POST['weight'];
    $country_manufacture=$_POST['country_manufacture'];
    $material=$_POST['material'];
    $status='true';
    $item_type=$_POST['item_type'];
    $item_available=$_POST['item_available'];
    

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // if($product_title=='' or $description=='' or $product_keyword=='' or $product_price==''){
    //     echo "<script>alert('please fill all the fields')</script>";
    //     exit();
    // }

    if($item_type=='new' or $item_type=='hot'){
       $offer=0;
       $new_price=$_POST['product_price'];
    }

    else {
     
        $offer_price=($product_price/100)* $offer;
        $new_price=$product_price-$offer_price;       
        
        }
        
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        $insert_products= "INSERT INTO `product` (product_title,product_description,product_keyword,category_id,brand_id,product_img1,product_img2,product_img3,old_price,offer,new_price,year_manufactured,weight,country_manufacture,material,item_type,status,date,item_available,admin_email) VALUES ('$product_title','$description','$product_keyword','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price','$offer','$new_price','$year_manufactured','$weight','$country_manufacture','$material','$item_type','$status',NOw(),$item_available,'$admin_email')";

        $result_query=mysqli_query($con,$insert_products);

            if($result_query){
                echo "<script>alert('Product insert successfull')</script>";
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
    <link rel="stylesheet" href="css/insert.css">

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
                        <li><a href="insert_product.html" class="active">Insert Product</a></li>
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
        <h1 class="title">Insert Product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="info">

                <div class="input-box">
                    <label for="product_title" class="form-lable">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>

                <div class="input-box">
                    <label for="description" class="form-lable">Product Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>

                <div class="input-box">
                    <label for="product_keyword" class="form-lable">Product Keyword</label>
                    <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
                </div>

                <div class="input-box">
                    <label for="product_image1" class="form-lable">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>

                <div class="input-box">
                    <label for="product_image2" class="form-lable">Product Image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>

                <div class="input-box">
                    <label for="product_image3" class="form-lable">Product Image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
                </div>

                <div class="input-box">
                    <label for="product_categories" class="form-label">Category</label>
                    <select name="product_categories" id="product_categories" class="form-select">
                        <option value="">Select a Category</option>
                        <?php 
                        
                        $select_query="SELECT * FROM `categories` ";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $categorie_title=$row['category_title'];
                            $category_id =$row['category_id'];
                            echo "
                                <option value='$category_id'>$categorie_title</option>
                            ";
                        }
                    
                    ?>
                    </select>
                </div>

                <div class="input-box">
                    <label for="product_brands" class="form-label">Brands</label>
                    <select name="product_brands" id="product_brands" class="form-select">
                        <option value="">Select a Brand</option> 
                       
                         <?php 
                        
                        $select_query="SELECT * FROM `brands` ";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id =$row['brand_id'];
                            echo "
                                <option value='$brand_id'>$brand_title</option>
                            ";
                        }
                    
                    ?>
                    </select>
                </div>

                <div class="input-box">
                    <label for="item_type" class="form-label">Item Type</label>
                    <select name="item_type" id="item_type" class="form-select">
                        <option value="">Select a Item Type</option> 
                        <option value="new">New</option> 
                        <option value="hot">Hot</option> 
                        <option value="offer" name="offer">Offer</option> 
                    </select>
                </div>
                
                <div class="input-box">
                    <label for="product_price" class="form-lable">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>

                <div class="input-box">
                    <label for="offer" class="form-lable">Offer</label>
                    <input type="text" name="offer" id="offer" class="form-control" placeholder="Enter Offer">
                </div>
                <div class="input-box">
                    <label for="year_manufactured" class="form-lable">Year Manufactured</label>
                    <input type="date" name="year_manufactured" id="year_manufactured" class="form-control" placeholder="Enter Year Manufactured">
                </div>
                <div class="input-box">
                    <label for="weight" class="form-lable">Weight</label>
                    <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter Weight">
                </div>
                <div class="input-box">
                    <label for="country_manufacture" class="form-lable">Country of Manufacture</label>
                    <input type="text" name="country_manufacture" id="country_manufacture" class="form-control" placeholder="Enter Country of Manufacture">
                </div>
                <div class="input-box">
                    <label for="material" class="form-lable">Material</label>
                    <input type="text" name="material" id="material" class="form-control" placeholder="Enter Material">
                </div>
                <div class="input-box">
                    <label for="item_available" class="form-lable">Item Available</label>
                    <input type="text" name="item_available" id="item_available" class="form-control" placeholder="Item Available">
                </div>

                
            </div>
            
            <div class="btn">
                <input type="submit" class="btn_add" value="Insert Product" name="inset_product">
                <input type="reset" class="btn_Reset" value="Reset" name="reset_product">     
            </div>
            
        </form>
    </div>


   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/style.js"> </script>
 

</body>
</html>