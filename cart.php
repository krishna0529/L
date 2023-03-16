<?php
// connection file 
include('./database/conn.php');
include('./Function/commonF.php');
?>
<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

function username()
{
    include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo $row['name'];
    }
}
function phot()
{
    include 'config.php';



    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        $image = $row['image'];

        echo " 
            
           <img src='./user_photo/$image' class='po''/>
            
          ";
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laxmi Tradeworld cart detitles</title>
    <!-- whatsapp send images and title -->
    <meta property="og:title" content="<?php ?>" />
    <meta property="og:description" content="<?php  ?>" />
    <meta property="og:url" content="<?php  ?>" />
    <meta property="og:image" content="<?php  ?>" />


    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/producet.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {

            overflow-x: hidden;
        }

        .ki {
            margin: 8px 25px;
            font-size: 20px;
        }

        .card {
            width: 300px;
            height: 410px;
        }

        .po {
            height: 43px;
            border-radius: 40px;
            width: 45px;
        }

        .Li {
            width: 60px;
            height: 47px;


        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- first child  -->
        <nav class="navbar navbar-expand-lg bg-success  ">
            <div class="container-fluid text-light  ">
                <a class="navbar-brand " href="#">
                    <h2 class="text-light  "> <img src="./images/logo2.jpg" class="Li " alt=""> Laxmi TradeWorld</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  text-light ki " aria-current="page" href="welcome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light ki" href="product.php">Product</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="about.php">About</a>
                        </li>



                    </ul>
                    <!-- search Product -->
                    
                    <ul class="navbar-nav ">
                        <li class="nav-item me-2">
                            <a href="profile.php" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"> <?php phot(); ?> <?php username(); ?></h4>
                            </a>
                        </li>
                       

                         
                        <li class="nav-item ">
                            <a href="logout.php" class="nav-link  ">
                                <h4 class="text-light"><i class="fa-solid fa-right-from-bracket"></i></h4>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
      
       
      <br>



        <!-- cart Design -->
       <div class="bg-light">
        <h3 class="text-center">Laxmi Store</h3>
        <p class="text-center"></p>
       </div>

       <!-- cart table  -->
       <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                

              <!-- php code  to display dynamic data in cart  -->
              <?php
                    
                     $get_ip_add = getIPAddress();
                     $total_price=0;
                     $cart_query="SELECT `product_id`, `ip_address`, `quantity` FROM `cart_details` WHERE ip_address='$get_ip_add' ";
                     $result_query = mysqli_query($connection, $cart_query);
                     $result_counts =mysqli_num_rows($result_query);
                     if($result_counts>0){

                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
    
                        </tr>
                    </thead>
                  <tbody>";


                     while($row=mysqli_fetch_array($result_query)){
                        $product_id=$row['product_id'];
                        $select_product="SELECT * FROM `product` WHERE product_id=$product_id";
                        $result_product=mysqli_query($connection,$select_product);
                        while($row_product_price=mysqli_fetch_array($result_product)){
                            $product_price =array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'] ;
                            $product_image1=$row_product_price['product_image1'] ;
                            
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                        
                            echo "<tr>
                            <td> $product_title</td>
                            <td><img src='./admin/product_image/$product_image1' alt='' style=' height:120px ;object-fit: contain;'></td>
                            <td><input type='text' name='qty' class='form-input w-50' autocomplete='off'></td>";

                            // update cart number in database 
                            $get_ip_add = getIPAddress();
                        
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                //$update_cart ="UPDATE `cart_details` SET quantity=$quantity  WHERE ip_address='$get_ip_add'";
                                $up ="UPDATE `cart_details` SET `quantity`=$quantities WHERE `ip_address`='$get_ip_add'";
                                
                                $result_product_qty=mysqli_query($connection,$up);
                                $total_price = $total_price*$quantities;
    
    
                            }

                            echo " <td> $price_table/-</td>
                            <td><input type='checkbox' name='removeitem[]' value=' $product_id; '></td>
                            <td>
                                 
                               
                               <input type='submit' value='Update ' id='' name='update_cart' class='btn btn-success mx-1'>
                               <input type='submit' value='Remove ' id='' name='remove_cart' class='btn btn-success mx-1'>
                                 
                               
        
                            </td>
                            
                        </tr>
        ";
    }
}
}
else{
echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
}

              ?>
               
                   
                       


              </tbody>





            </table>
            <!-- Sub Total -->
            <div class="d-flex">
                <?php
                $get_ip_add = getIPAddress();
                
                $cart_query="SELECT `product_id`, `ip_address`, `quantity` FROM `cart_details` WHERE ip_address='$get_ip_add' ";
                $result_query = mysqli_query($connection, $cart_query);
                $result_counts =mysqli_num_rows($result_query);
                if($result_counts>0){
                    echo "<h4 class='px-3'>Total Product Price : <strong>$total_price/-</strong> </h4>
                    <a  class='btn btn-success px-3 mx-3' href='product.php' role='button'>Continue Shopping</a>
                    <a  class='btn btn-success px-3 mx-3' href='payment.php' role='button'>Payment</a>";
                }else{
                    echo "<a  class='btn btn-success px-3 mx-3' href='product.php' role='button'>Continue Shopping</a>";
                }
                ?>
                


            </div>

        </div>
       </div>
       </form>

       <!-- function to remove cart items  -->
            <?php

                function remove_cart_items(){
                    global $connection;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            echo $remove_id;
                            $delect_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                            $run_delete =mysqli_query($connection,$delect_query);
                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }



                echo $remove_item=remove_cart_items();
            ?>



<br>




        <!------------------------------- last child------------------------ -->
        <div class="bg-dark  text-center">
            <p class="text-light">All Right Reserved ©- Designed by Krishna Singh 2022-23</p>
        </div>

    </div>

























    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>