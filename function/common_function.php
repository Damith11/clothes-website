<?php 

include('./admin/includes/connect.php');
?>

   
                 <?php 
                     /// geting the all project in home page 

                     function getproducts(){
                        global $con;

                        if(!isset($_GET['category'])){
                          if(!isset($_GET['brand'])){

                        

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id LIMIT 0,12";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_keyword=$row['product_keyword'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      $product_img1=$row['product_img1'];
                      $product_img2=$row['product_img2'];
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                      $year_manufactured=$row['year_manufactured'];
                      $weight=$row['weight'];
                      $country_manufacture=$row['country_manufacture'];
                      $material=$row['material'];
                      $item_type=$row['item_type'];
                      $brand_title=$row['brand_title'];
                      $item_available=$row['item_available'];
                 ?>
                    <form action="" method="post">
                      <div class="product-item">
                      <div class="product-banner">
                        <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                           <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                           <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
                           <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  
                           <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                        </a>
  
                        <?php echo"
                            <div class='product-actions'>
                              <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                                <i class='fi fi-rs-eye'></i>
                              </a>
                           "; 
                           ?>

                          

                          <button type="submit" class="action-btn" style="cursor: pointer;" name="add_wishlist" aria-label="Add To Wishlist">
                          <i class='fi fi-rs-heart'></i>
                          </button>

                        </div>
                     

                        <?php 
                        
                          if($item_type=='new'){
                            echo"<div class='product-badge light-blue'>New</div>";
                          }
                          elseif($item_type=='hot'){
                            echo" <div class='product-badge light-orange'>Hot</div> ";
                          }

                          else {
                            echo"<div class='product-badge light-pink'>-$offer%</div>";
                          }
                        
                        ?>
                        
                      </div>
  
                      <div class="product-content">
                         <span class="product-category"> <?php echo $brand_title ?></span>
                         <a href="details.html">
                            <h3 class="product-title"> <?php echo $product_title ?></h3>
                            <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                         </a>
  
                         <div class="product-rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                         </div>
  
                         <div class="product-price flex">
                          <?php 
                            if($item_type=='new' or $item_type=='hot'){
                             echo "<span class='new-price'>$ $new_price </span>
                             <input type='hidden' name='new_price' value='$new_price'>
                             ";
                            }
                            else {
                              echo "
                               <span class='new-price'>$ $new_price </span>
                              <span class='old-price'>$ $old_price</span>
                              <input type='hidden' name='new_price' value='$new_price'>
                              ";
                            }
                          ?>
                          </div> 
                          
                          <?php 
                           if($item_available>0){
                            echo "
                                  <button type='submit' class='action-btn cart-btn' style='cursor: pointer;' name='add_cart' aria-label='Add To Cart'>
                                    <i class='fi fi-rs-shopping-cart-add'></i>
                                  </button>
                            ";
                           }
                           else{
                            echo "
                                  <button type='submit' class='action-btn cart-btn' style='cursor: pointer;' name='add_cart' aria-label='Sold Out'>
                                      <i class='fi fi-rr-cart-minus'></i>
                                  </button>
                            ";
                           }
                          
                          ?>
                      
                          <!-- <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-cart-add"></i>
                          </button> -->
   
  
                      </div>
                    </div>
            </form>
                  <?php 
                    }  
                  }
                }              
                  ?>
        <?php } ?>

                <!-- get uniq category_ -->

                 <?php 
                     /// geting the all project in home page 

                function getuniq_category(){
                        global $con;

                        if(isset($_GET['category'])){

                          $category_id=$_GET['category'];
                                               

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id WHERE category_id=$category_id";
                    $result_query=mysqli_query($con,$select_query);

                    $num_of_rows=mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<h2 class='Error_msg'>No stock for this category</h2>";
                    }
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_keyword=$row['product_keyword'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      $product_img1=$row['product_img1'];
                      $product_img2=$row['product_img2'];
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                      $year_manufactured=$row['year_manufactured'];
                      $weight=$row['weight'];
                      $country_manufacture=$row['country_manufacture'];
                      $material=$row['material'];
                      $item_type=$row['item_type'];
                      $brand_title=$row['brand_title'];
                 ?>
                      <form action="" method="">
                      <div class="product-item">
                      <div class="product-banner">
                        <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                           <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                           <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
  
  
                           <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                        </a>
  
                       
                        <?php echo"
                        <div class='product-actions'>
                          <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                            <i class='fi fi-rs-eye'></i>
                          </a>
  
                          <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                            <i class='fi fi-rs-heart'></i>
                          </a>

                        </div>
                        "; ?>
                         
  
                        </div>
                        <?php 
                        
                          if($item_type=='new'){
                            echo"<div class='product-badge light-blue'>New</div>";
                          }
                          elseif($item_type=='hot'){
                            echo" <div class='product-badge light-orange'>Hot</div> ";
                          }

                          else {
                            echo"<div class='product-badge light-pink'>-$offer%</div>";
                          }
                        
                        ?>
                        
                      </div>
  
                      <div class="product-content">
                         <span class="product-category"> <?php echo $brand_title ?></span>
                         <a href="details.html">
                            <h3 class="product-title"> <?php echo $product_title ?></h3>
                            <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                         </a>
  
                         <div class="product-rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                         </div>
  
                         <div class="product-price flex">
                          <?php 
                            if($item_type=='new' or $item_type=='hot'){
                             echo "<span class='new-price'>$ $new_price </span>
                              <input type='hidden' name='new_price' value='$new_price'>";
                      
                            }
                            else {
                              echo "
                               <span class='new-price'>$ $new_price </span>
                                <input type='hidden' name='new_price' value='$new_price'>
                              <span class='old-price'>$ $old_price</span>
                              ";
                            }
                          ?>
                          </div>  
                         
                          <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-cart-add"></i>
                          </button>
  
                      </div>
                    </div>
                    </form>
                  <?php 
                    }  
                  }
                             
                  ?>
        <?php } ?>

                  <!-- Barnd display -->

                  <?php 

                    function getbrand(){
                      global $con;
                    
                    $select_brands="SELECT * FROM `brands`";
                    $result_brands=mysqli_query($con,$select_brands);
                    
                    

                    while($row_data=mysqli_fetch_assoc($result_brands)){
                      $brand_title=$row_data['brand_title'];
                      $brand_id=$row_data['brand_id'];
                      echo "
                          <div class='brand-sub-name'>
                            <a href='shop.php?brand=$brand_id' class='sub-name'> $brand_title</a>
                          </div>
                          ";
                    }      
                    ?>
                    <?php } ?>






                 <?php 
                     /// geting the all project in home page 

                     function getuniq_brand() {
                      global $con;
                  
                      if (isset($_GET['brand'])) {
                          $brand_id = $_GET['brand'];
                  
                          // Fetch the brand title from the brands table
                          $brand_query = "SELECT brand_title FROM `brands` WHERE brand_id = $brand_id";
                          $brand_result = mysqli_query($con, $brand_query);
                          $brand_data = mysqli_fetch_assoc($brand_result);
                          $brand_title = $brand_data['brand_title'];
                  
                          // Fetch products for the given brand ID
                          $select_query = "SELECT * FROM `product` WHERE brand_id = $brand_id";
                          $result_query = mysqli_query($con, $select_query);
                          $num_of_rows = mysqli_num_rows($result_query);
                  
                          if ($num_of_rows == 0) {
                              echo "<h2 class='Error_msg'>No stock for the brand '$brand_title'</h2>";
                          }
                  
                          while ($row = mysqli_fetch_assoc($result_query)) {
                              $product_id = $row['product_id'];
                              $product_title = $row['product_title'];
                              $product_description = $row['product_description'];
                              $product_keyword = $row['product_keyword'];
                              $category_id = $row['category_id'];
                              $brand_id = $row['brand_id'];
                              $product_img1 = $row['product_img1'];
                              $product_img2 = $row['product_img2'];
                              $old_price = $row['old_price'];
                              $offer = $row['offer'];
                              $new_price = $row['new_price'];
                              $year_manufactured = $row['year_manufactured'];
                              $weight = $row['weight'];
                              $country_manufacture = $row['country_manufacture'];
                              $material = $row['material'];
                              $item_type = $row['item_type'];
                              
                              // Begin product display code
                              ?>
                              <form action="" method="post">
                                  <div class="product-item">
                                      <div class="product-banner">
                                          <a href="<?php echo "details.php?product_id=$product_id" ?>" class="product-images">
                                              <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                                              <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
                                              <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                                          </a>
                  
                                          <div class='product-actions'>
                                              <a href='details.php?product_id=<?php echo $product_id ?>' class='action-btn' aria-label='Quick View'>
                                                  <i class='fi fi-rs-eye'></i>
                                              </a>
                                              <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                                                  <i class='fi fi-rs-heart'></i>
                                              </a>
                                          </div>
                                      </div>
                  
                                      <?php 
                                      // Badge display logic
                                      if ($item_type == 'new') {
                                          echo "<div class='product-badge light-blue'>New</div>";
                                      } elseif ($item_type == 'hot') {
                                          echo "<div class='product-badge light-orange'>Hot</div>";
                                      } else {
                                          echo "<div class='product-badge light-pink'>-$offer%</div>";
                                      }
                                      ?>
                                      
                                      <div class="product-content">
                                          <span class="product-category"> <?php echo $brand_title; ?></span>
                                          <a href="details.html">
                                              <h3 class="product-title"> <?php echo $product_title ?></h3>
                                              <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                                          </a>
                  
                                          <div class="product-rating">
                                              <i class="fi fi-rs-star"></i>
                                              <i class="fi fi-rs-star"></i>
                                              <i class="fi fi-rs-star"></i>
                                              <i class="fi fi-rs-star"></i>
                                              <i class="fi fi-rs-star"></i>
                                          </div>
                  
                                          <div class="product-price flex">
                                              <?php 
                                              if ($item_type == 'new' || $item_type == 'hot') {
                                                  echo "<span class='new-price'>$ $new_price </span>
                                                        <input type='hidden' name='new_price' value='$new_price'>";
                                              } else {
                                                  echo "<span class='new-price'>$ $new_price </span>
                                                        <input type='hidden' name='new_price' value='$new_price'>
                                                        <span class='old-price'>$ $old_price</span>";
                                              }
                                              ?>
                                          </div>  
                                          
                                          <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                                              <i class="fi fi-rs-shopping-cart-add"></i>
                                          </button>
                                      </div>
                                  </div>
                              </form>
                              <?php 
                          }  
                      }
                  }
                  ?>





                     <?php 
                            //// product in home page popular
                     function getPopular(){
                        global $con;
                     
                    
                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_keyword=$row['product_keyword'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      $product_img1=$row['product_img1'];
                      $product_img2=$row['product_img2'];
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                      $year_manufactured=$row['year_manufactured'];
                      $weight=$row['weight'];
                      $country_manufacture=$row['country_manufacture'];
                      $material=$row['material'];
                      $item_type=$row['item_type'];

                      $brand_title=$row['brand_title'];
                          ?>
                           <?php 
           
                         if($item_type=='hot'){

             
                             ?>
                             <form action="" method="post">
                                <div class="product-item">
                                    <div class="product-banner">
                                      <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                                        <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                                        <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
                
                
                                        <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                                      </a>
                
                                      <?php echo"
                                      <div class='product-actions'>
                                        <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                                          <i class='fi fi-rs-eye'></i>
                                        </a>
                
                                        <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                                          <i class='fi fi-rs-heart'></i>
                                        </a>

                                      </div>
                                      "; ?>
                
                                      
                                        <div class="product-badge light-orange">Hot</div>
                                      
                                      
                                    </div>
                
                                    <div class="product-content">
                                      <span class="product-category"> <?php echo $brand_title ?></span>
                                      <a href="details.html">
                                          <h3 class="product-title"> <?php echo $product_title ?></h3>
                                          <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                                      </a>
                
                                      <div class="product-rating">
                                          <i class="fi fi-rs-star"></i>
                                          <i class="fi fi-rs-star"></i>
                                          <i class="fi fi-rs-star"></i>
                                          <i class="fi fi-rs-star"></i>
                                          <i class="fi fi-rs-star"></i>
                                      </div>
                
                                      <div class="product-price flex">
                                      <span class="new-price">$ <?php echo $new_price ?> </span>
                                      <input type='hidden' name='new_price' value='<?php echo $new_price ?>'>
                                  
                                        </div>  
                                      
                                        <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                                        <i class="fi fi-rs-shopping-cart-add"></i>
                                        </button>
                
                                    </div>
                                </div>
                            </form>
                  <?php 
                  
                }
                  
                  
                  ?>
                     

                     <?php   } ?>

                     <?php } ?>



    
                        <?php 

                        /// product form new added 
                        function getNew_Added(){
                        global $con;
                    
                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_keyword=$row['product_keyword'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      $product_img1=$row['product_img1'];
                      $product_img2=$row['product_img2'];
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                      $year_manufactured=$row['year_manufactured'];
                      $weight=$row['weight'];
                      $country_manufacture=$row['country_manufacture'];
                      $material=$row['material'];
                      $item_type=$row['item_type'];

                      $brand_title=$row['brand_title'];
                        ?>
                      <?php 
           
                      if($item_type=='new'){

             
                     ?>
                     <form action="" method="post">
                      <div class="product-item">
                          <div class="product-banner">
                            <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                              <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                              <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
      
      
                              <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                            </a>
      
                            <?php echo"
                            <div class='product-actions'>
                              <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                                <i class='fi fi-rs-eye'></i>
                              </a>
      
                              <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                                <i class='fi fi-rs-heart'></i>
                              </a>

                            </div>
                            "; ?>
      
                            
                                <div class="product-badge light-blue">New</div>     
                            
                          </div>
      
                          <div class="product-content">
                            <span class="product-category"> <?php echo $brand_title ?></span>
                            <a href="details.html">
                                <h3 class="product-title"> <?php echo $product_title ?></h3>
                                <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                            </a>
      
                            <div class="product-rating">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
      
                            <div class="product-price flex">
                            <span class="new-price">$ <?php echo $new_price ?> </span>
                            <input type='hidden' name='new_price' value='<?php echo $new_price ?>'>
                        
                            
                              </div>  
                            
                              <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                              <i class="fi fi-rs-shopping-cart-add"></i>
                          </button>
      
                          </div>
                       </div>
                    </form>
                  <?php 
                  
                }
                  
                  
                  ?>
                     

                     <?php   } ?>

                     
                     <?php } ?>




            <!-- ----------------- search product ------------------------------- -->


                <?php 
                
                
                function search_product(){

                  global $con;

                 
                  

              // $select_brands_query="SELECT * FROM `brands`";
              if(isset($_GET['search_data_product'])){
                $search_data_value=$_GET['search_data'];
              $search_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id WHERE product_keyword LIKE '%$search_data_value%'";
              $result_query=mysqli_query($con,$search_query);

              
              $num_of_rows=mysqli_num_rows($result_query);
              if($num_of_rows==0){
                echo "<h2 class='Error_msg'>No results match!</h2>";
              }
              
              // echo $row['product_title'];
              while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_keyword=$row['product_keyword'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                $product_img1=$row['product_img1'];
                $product_img2=$row['product_img2'];
                $old_price=$row['old_price'];
                $offer=$row['offer'];
                $new_price=$row['new_price'];
                $year_manufactured=$row['year_manufactured'];
                $weight=$row['weight'];
                $country_manufacture=$row['country_manufacture'];
                $material=$row['material'];
                $item_type=$row['item_type'];
                $brand_title=$row['brand_title'];
           ?>

                <form action="" method="post" enctype="multipart/form-data">
                <div class="product-item">
                
                <div class="product-banner">
                  <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                  <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                     <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
  

                     <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                  </a>

                  <?php echo"
                        <div class='product-actions'>
                          <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                            <i class='fi fi-rs-eye'></i>
                          </a>
  
                          <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                            <i class='fi fi-rs-heart'></i>
                          </a>

                        </div>
                        "; ?>
                   
               <?php 
                  
                    if($item_type=='new'){
                      echo"<div class='product-badge light-blue'>New</div>";
                    }
                    elseif($item_type=='hot'){
                      echo" <div class='product-badge light-orange'>Hot</div> ";
                    }

                    else {
                      echo"<div class='product-badge light-pink'>$offer%</div>";
                    }
                  
                  ?>
                 
                  </div>

                 <div class="product-content">
                        <span class="product-category"> <?php echo $brand_title ?></span>
                        <a href="details.html">
                            <h3 class="product-title"> <?php echo $product_title ?></h3>
                            <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                        </a>

                        <div class="product-rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>

                        <div class="product-price flex">
                          <?php 
                            if($item_type=='new' or $item_type=='hot'){
                            echo "<span class='new-price'>$ $new_price </span>
                            <input type='hidden' name='new_price' value='$new_price'>
                          ";

                      
                            }
                            else {
                              echo "
                              <span class='new-price'>$ $new_price </span>
                              <input type='hidden' name='new_price' value='$new_price'>
                              <span class='old-price'>$ $old_price</span>
                              ";
                            }
                          ?>
                    </div>  
                   
                    <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                    <i class="fi fi-rs-shopping-cart-add"></i>
                    </button>

                  </div>
                  
                
                </div>
                 
                    

        
                        
            </form>
            <?php 
              }  
            }        
            ?>
  <?php } ?>

  




  <!-- add to cart function -->
  <?php 
              
              function add_cart(){

                global $con;
                
              
                if(isset($_SESSION['user_email'])){
                
                if(isset($_POST['add_cart'])){


                  $product_id=$_POST['product_id'];
                  $product_title=$_POST['product_title'];
                  $product_price=$_POST['new_price'];
                  $product_image=$_POST['product_image'];
                  $product_quntity=1;
                  $user_email=$_SESSION['user_email'];
                
                 
                  
                  

                  // select cart data based on contition
 
                    $select_product="SELECT * FROM `product`WHERE product_id=$product_id ";
                    $result_query=mysqli_query($con,$select_product);
                    $row=mysqli_fetch_assoc($result_query);
                    $item_available=$row['item_available'];
          
                      $select_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name='$product_title' and user_email='$user_email'");

                       if($item_available<=0 or mysqli_num_rows($select_cart)>0){
                        echo "<script>alert('Item is not available')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                  
                    }
                    
            // if(){
            //     echo "<script>alert('product already added to cart')</script>";
               
            // }

                      else{

                      $insert_product=mysqli_query($con,"INSERT INTO `cart` (name,price,quantity,image,product_id,user_email,item_available) VALUES ('$product_title','$product_price',$product_quntity,'$product_image',$product_id,'$user_email','$item_available')");
                      
                      // $select_query="SELECT * FROM `product` WHERE product_id=$product_id";
                      // $result_query=mysqli_query($con,$select_query);
                      // $row=mysqli_fetch_assoc($result_query);
                      // $item_available=$row['item_available'];
                      // $update_item=$item_available-1;

                      // $update_items="UPDATE `product` SET item_available='$update_item' WHERE product_id=$product_id";
                      // $result_query=mysqli_query($con,$update_items);

             ?>
                        <script>
                         swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success",
                              });
                        </script>
                        
                  

                      <?php
                      
                    }

                  
                
                  }
                }                

              

              else{
                // echo "<script>alert('plese register frist')</script>";
                // echo "<script>window.open('index.php','_self')</script>";

              }
                
          
            }
                            
              ?> 
              
              
              <!-- get user order details -->


              <?php
  // session_start();
              function get_user_order_details(){
                global $con;
              
                if(!isset($_SESSION['user_email'])){
                  echo "<h3 class='order_Zero_count'> You Have 0 Pending Orders.... </h3>";
                }
                else{
                $user_email=$_SESSION['user_email'];
                $get_details="SELECT * FROM `user_table` WHERE user_email='$user_email'";
                $result_query=mysqli_query($con,$get_details);
                while($row_query=mysqli_fetch_array($result_query)){
                  $user_id=$row_query['user_id'];
                  if(!isset($_GET['edit_account'])){
                     if(!isset($_GET['my_orders'])){                
                        if(!isset($_GET['my_orders'])){
                          $get_orders="SELECT * FROM `orders` WHERE user_id=$user_id";
                          $result_orders_query=mysqli_query($con,$get_orders);
                          $row_count=mysqli_num_rows($result_orders_query);
                           if($row_count>0){
                            echo "<h3 class='order_count'>You Have $row_count Orders.... </h3>";
                            
                           }
                           else{
                             echo "<h3 class='order_Zero_count'>You Have No Order.... </h3>";
                           }
                        }                  
                     }
                  }
                }
              }
              }
              
              
              
              
              
              ?>







<?php 
              
              function add_wishlist(){

                global $con;
                
              
                if(isset($_SESSION['user_email'])){
                
                if(isset($_POST['add_wishlist'])){


                  $product_id=$_POST['product_id'];
                  $product_title=$_POST['product_title'];
                  $product_price=$_POST['new_price'];
                  $product_image=$_POST['product_image'];
                  $product_quntity=1;
                  $user_email=$_SESSION['user_email'];
                 
                  
                  

                  // select cart data based on contition
                    $select_cart=mysqli_query($con,"SELECT * FROM `wishlist` WHERE product_title='$product_title' and user_email='$user_email'");
                    if(mysqli_num_rows($select_cart)>0){
                        echo "<script>alert('product already added to cart')</script>";
                       
                    }

                    else{
                      $insert_product=mysqli_query($con,"INSERT INTO `wishlist` (product_title,product_price,quantity,product_image,product_id,user_email) VALUES ('$product_title','$product_price',$product_quntity,'$product_image',$product_id,'$user_email')");
                      
                      // echo "<script>alert('product added to cart....')</script>";
                      
                    }

                  


                }                

              }

              else{
                // echo "<script>alert('plese register frist')</script>";
                // echo "<script>window.open('index.php','_self')</script>";

              }
                
          
            }
                            
              ?> 

              <!-- detals unq product -->

                 
                    <?php 
                     /// geting the all project in home page 

                     function getrelated_product(){
                        global $con;

                        if(!isset($_GET['category'])){
                          if(!isset($_GET['brand'])){

                        

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` JOIN `brands` ON product.brand_id = brands.brand_id LIMIT 0,4";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_keyword=$row['product_keyword'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      $product_img1=$row['product_img1'];
                      $product_img2=$row['product_img2'];
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                      $year_manufactured=$row['year_manufactured'];
                      $weight=$row['weight'];
                      $country_manufacture=$row['country_manufacture'];
                      $material=$row['material'];
                      $item_type=$row['item_type'];
                      $brand_title=$row['brand_title'];
                 ?>
                    <form action="" method="post">
                      <div class="product-item">
                      <div class="product-banner">
                        <a href="<?php echo "details.php?product_id=$product_id "?>" class="product-images">
                           <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="product-img default" alt="<?php echo $product_title ?>">
                           <input type="hidden" name="product_image" value="<?php echo $product_img1 ?>">
                           <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  
                           <img src="<?php echo "./admin/product_images/$product_img2" ?>" class="product-img hover" alt="">
                        </a>
  
                        <?php echo"
                            <div class='product-actions'>
                              <a href='details.php?product_id=$product_id' class='action-btn' aria-label='Quick View'>
                                <i class='fi fi-rs-eye'></i>
                              </a>
                           "; 
                           ?>

                          <!-- <a href='wishlist.php' class='action-btn' aria-label='Add To Wishlist'>
                            <i class='fi fi-rs-heart'></i>
                          </a> -->

                          <button type="submit" class="action-btn" style="cursor: pointer;" name="add_wishlist" aria-label="Add To Wishlist">
                          <i class='fi fi-rs-heart'></i>
                          </button>

                        </div>
                     

                        <?php 
                        
                          if($item_type=='new'){
                            echo"<div class='product-badge light-blue'>New</div>";
                          }
                          elseif($item_type=='hot'){
                            echo" <div class='product-badge light-orange'>Hot</div> ";
                          }

                          else {
                            echo"<div class='product-badge light-pink'>-$offer%</div>";
                          }
                        
                        ?>
                        
                      </div>
  
                      <div class="product-content">
                         <span class="product-category"> <?php echo $brand_title ?></span>
                         <a href="details.html">
                            <h3 class="product-title"> <?php echo $product_title ?></h3>
                            <input type="hidden" name="product_title" value="<?php echo $product_title ?>">
                         </a>
  
                         <div class="product-rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                         </div>
  
                         <div class="product-price flex">
                          <?php 
                            if($item_type=='new' or $item_type=='hot'){
                             echo "<span class='new-price'>$ $new_price </span>
                             <input type='hidden' name='new_price' value='$new_price'>
                             ";
                            }
                            else {
                              echo "
                               <span class='new-price'>$ $new_price </span>
                              <span class='old-price'>$ $old_price</span>
                              <input type='hidden' name='new_price' value='$new_price'>
                              ";
                            }
                          ?>
                          </div>  
                      
                          <button type="submit" class="action-btn cart-btn" style="cursor: pointer;" name="add_cart" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-cart-add"></i>
                          </button>
                      <!-- <?php
                      // echo"
                      //     <a href='index.php?add_cart=$product_id' aria-label='Add To Cart' class='action-btn cart-btn'>
                      //     <i class='fi fi-rs-shopping-cart-add'></i>
                      //     </a>";
                      //    ?> 
                         -->
                         
                          
                        
  
                      </div>
                    </div>
</form>
                  <?php 
                    }  
                  }
                }              
                  ?>
                   <?php } ?>


              <!-- Hot Releases -->


                   <?php 
                     /// geting the all project in home page 

                     function hot_releases(){
                        global $con;

                        
                        

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` LIMIT 0,3";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      
                      $product_img1=$row['product_img1'];
                     
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                     
                      $item_type=$row['item_type'];

                    ?>

                      <?php 
           
                      if($item_type=='hot'){
                        
                      ?>

                  <div class="showcase-item">
                    <a href=<?php echo "details.php?product_id=$product_id " ?> class="showcase-img-box">
                      <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="showcase-img" alt="">
                    </a>

                    <div class="showcase-content">
                      <a href=<?php echo "details.php?product_id=$product_id " ?>>
                        <h4 class="showcase-title"><?php echo $product_title ?></h4>
                      </a>

                      <div class="showcase-price flex">
                        <span class="new-price">$<?php echo $new_price ?></span>
                        <span class="old-price">$<?php echo $old_price ?></span>
                      </div>
                    </div>
                  </div>

                  <?php 
                      }
                    }  
                  }
                             
                  ?>
                  <?php  ?>



                     <!--  -->

               <?php 
                     /// geting the all project in home page 

                     function deals_outlet(){
                        global $con;

                        

                        

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` order by rand() LIMIT 0,3 ";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      
                      $product_img1=$row['product_img1'];
                     
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                     
                      $item_type=$row['item_type'];

                    ?>

                  

                  <div class="showcase-item">
                    <a href=<?php echo "details.php?product_id=$product_id " ?> class="showcase-img-box">
                      <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="showcase-img" alt="">
                    </a>

                    <div class="showcase-content">
                      <a href=<?php echo "details.php?product_id=$product_id " ?>>
                        <h4 class="showcase-title"><?php echo $product_title ?></h4>
                      </a>

                      <div class="showcase-price flex">
                        <span class="new-price">$<?php echo $new_price ?></span>
                        <span class="old-price">$<?php echo $old_price ?></span>
                      </div>
                    </div>
                  </div>

                  <?php 
                      }
                    }  
                  
                             
                  ?>
               <?php ?>


               
               <?php 
                     /// geting the all project in home page 

                     function top_selling(){
                        global $con;

                        

                        

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` LIMIT 0,3";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      
                      $product_img1=$row['product_img1'];
                     
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                     
                      $item_type=$row['item_type'];

                    ?>

                      <?php 
           
                      if($item_type=='offer'){
                        
                      ?>

                  <div class="showcase-item">
                    <a href=<?php echo "details.php?product_id=$product_id " ?> class="showcase-img-box">
                      <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="showcase-img" alt="">
                    </a>

                    <div class="showcase-content">
                      <a href=<?php echo "details.php?product_id=$product_id " ?>>
                        <h4 class="showcase-title"><?php echo $product_title ?></h4>
                      </a>

                      <div class="showcase-price flex">
                        <span class="new-price">$<?php echo $new_price ?></span>
                        <span class="old-price">$<?php echo $old_price ?></span>
                      </div>
                    </div>
                  </div>

                  <?php 
                      }
                    }  
                  }
                             
                  ?>
               <?php ?>


               <?php 
                     /// geting the all project in home page 

                     function trend(){
                        global $con;

                                

                    // $select_brands_query="SELECT * FROM `brands`";
                    $select_query="SELECT * FROM `product` LIMIT 0,3";
                    $result_query=mysqli_query($con,$select_query);
                    
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      
                      $product_img1=$row['product_img1'];
                     
                      $old_price=$row['old_price'];
                      $offer=$row['offer'];
                      $new_price=$row['new_price'];
                     
                      $item_type=$row['item_type'];

                    ?>

                      <?php 
           
                      if($item_type=='new'){
                        
                      ?>

                  <div class="showcase-item">
                    <a href=<?php echo "details.php?product_id=$product_id " ?> class="showcase-img-box">
                      <img src="<?php echo "./admin/product_images/$product_img1" ?>" class="showcase-img" alt="">
                    </a>

                    <div class="showcase-content">
                      <a href=<?php echo "details.php?product_id=$product_id " ?>>
                        <h4 class="showcase-title"><?php echo $product_title ?></h4>
                      </a>

                      <div class="showcase-price flex">
                        <span class="new-price">$<?php echo $new_price ?></span>
                        <span class="old-price">$<?php echo $old_price ?></span>
                      </div>
                    </div>
                  </div>

                  <?php 
                      }
                    }  
                  }
                             
                  ?>
               <?php ?>






                    

                
                
                
                
                
                
                
                

