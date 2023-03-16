<?php

include('./database/conn.php');
include('./config.php');




// getting product 

function get_products()
{
    global $connection;


    //condition to check isset or not
    if (!isset($_GET['category'])) {
       





            $select_query = "SELECT * FROM `product` order by rand() LIMIT 0,20";
            $result_query = mysqli_query($connection, $select_query);


            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];

                // $product_keyword =$row['product_keyword'];
                $product_image1 = $row['product_image1'];






                echo  " <div class='col-md-3 mb-2' >
                        <div class='card '  >
                         <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 230px; object-fit: contain; ' alt='$product_title'>
                        <div class='card-body' >
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text'>$product_description</p>
                         <p class='card-text'> Rs: $product_price /-</p>
                         <h6 class='card-title'></h6>
                
                        <a href='https://wa.me/+918866260821?whatapp=$product_title,$product_description,$product_image1' class='btn btn-primary bg-success text-light' target='_blank'>Whatsapp</a>
                        <a href='product.php?add_to_cart=$product_id' class='btn btn-primary bg-primary text-light' >Add to Cart</a>
               
                             </div>
                         </div>
                         </div>";
            }
        }
    }


//getting unique categories
function get_unique_category()
{
    global $connection;


    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];


        $select_query = "SELECT * FROM `product` WHERE category_id=$category_id";
        $result_query = mysqli_query($connection, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No Stock For This Category </h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];

            $product_image1 = $row['product_image1'];


            $category_id = $row['category_id'];
            
            echo  " <div class='col-md-3 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 230px; object-fit: contain; ' alt=''>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'> Rs: $product_price /-</p>
                <a href='https://wa.me/8866260821?text=$product_title&source=$product_image1' class='btn btn-primary bg-success text-light'>Whatsapp</a>
                <a href='product.php?add_to_cart=$product_id' class='btn btn-primary bg-primary text-light' >Add to Cart</a>

                
                
            </div>
        </div>
    </div>";
        }
    }
}






//category list function 

function get_categorys()
{
    global $connection;
    $select_category = "SELECT * FROM `categories`";
    $result_select = mysqli_query($connection, $select_category);

    while ($row_data = mysqli_fetch_assoc($result_select)) {
        $category_tittle = $row_data['category_tittle'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item '>
                        <a href='product.php?category=$category_id' class='nav-link text-light'>$category_tittle</a>
                    </li>";
    }
}

//get a serarching the product
function search_product()
{
    global $connection;

    if (isset($_GET['search_product'])) {
        $search_data_value = $_GET['search_data'];


        $search_query = "SELECT * FROM `product` WHERE product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($connection, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> This product is not match and no product will be show  </h2>";
        }


        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];

           
            $product_image1 = $row['product_image1'];


            $category_id = $row['category_id'];
            // $brand_id = $row['brand_id'];
            echo  " <div class='col-md-3 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 230px; object-fit: contain; ' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'> Rs: $product_price /-</p>
                <a href='https://wa.me/8866260821?whatapp=$product_title,$product_description,$product_image1' class='btn btn-primary bg-success text-light'>Whatsapp</a>
                <a href='product.php?add_to_cart=$product_id' class='btn btn-primary bg-primary text-light' >Add to Cart</a>

              
            </div>
        </div>
    </div>";
        }
    }
}

//get ip address

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;


// Cart Functions 

function cart(){
    
    if(isset($_GET['add_to_cart'])){
        global $connection;
        $get_ip_add = getIPAddress();
        $get_product_id =$_GET['add_to_cart'];
        $select_query="SELECT `product_id`, `ip_address`, `quantity` FROM `cart_details` WHERE ip_address='$get_ip_add' and product_id=$get_product_id ";
        $result_query = mysqli_query($connection, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
            
        }else{
            $insert_query ="INSERT INTO `cart_details`(`product_id`, `ip_address`, `quantity`) VALUES ('$get_product_id','$get_ip_add','0')";
            $result_query = mysqli_query($connection, $insert_query);
            echo "<script>alert('Item is add to  cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }
    }
   
}
//fuction to get cart number 
function cart_number(){
    if(isset($_GET['add_to_cart'])){
        global $connection;
        $get_ip_add = getIPAddress();
        
        $select_query="SELECT `product_id`, `ip_address`, `quantity` FROM `cart_details` WHERE ip_address='$get_ip_add' ";
        $result_query = mysqli_query($connection, $select_query);
        $count_cart_Items = mysqli_num_rows($result_query);
        }else{
            global $connection;
            $get_ip_add = getIPAddress();
            
            $select_query="SELECT `product_id`, `ip_address`, `quantity` FROM `cart_details` WHERE ip_address='$get_ip_add' ";
            $result_query = mysqli_query($connection, $select_query);
            $count_cart_Items = mysqli_num_rows($result_query);
        }
        echo "$count_cart_Items";
    }


    // get user order details
function get_user_order_details(){
    global $connection;
    global $conn;

    $email=$_SESSION['SESSION_EMAIL'];
    $get_details ="SELECT * FROM `users` WHERE email = '$email'";
    $result_query = mysqli_query($conn,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $id =$row_query['id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_order'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` WHERE user_id=$id AND order_status='pending'";
                    $result_order_query = mysqli_query($connection,$get_orders);
                    $row_count = mysqli_num_rows($result_order_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success my-5'>You Have <span class='text-danger'>$row_count</span> pending Orders</h3>
                       <h4 class='text-center' > <a href='profile.php?my_order' class='text-dark'>Order Details</a></h4>";
                    }else{
                        echo "<h3 class='text-center text-success my-5'>You Have 0 pending Orders</h3>
                        <h4 class='text-center' > <a href='product.php' class='text-dark'>Explore Products</a></h4>";
                    }
                }
            }
        }
    }


}

?>
