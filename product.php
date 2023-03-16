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
    <title>Laxmi Tradeworld -home</title>
    <!-- whatsapp send images and title -->
    <meta property="og:title" content="<?php ?>" />
    <meta property="og:description" content="<?php  ?>" />
    <meta property="og:url" content="<?php  ?>" />
    <meta property="og:image" content="<?php  ?>" />


    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/producet.css">
    <link rel="stylesheet" href="./css/footer.css">

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
        p {
        margin-top: 0;
        margin-bottom: 4.9px;
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
                    <form class="d-flex" role="search" action="search_product.php" method="GET">

                        <!-- search Input -->
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- search btn -->
                        <input type="submit" value="search" class="btn btn-outline-light  " name="search_product">
                    </form>
                    <ul class="navbar-nav ">
                        <li class="nav-item me-2">
                            <a href="profile.php" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"> <?php phot(); ?> <?php username(); ?></h4>
                            </a>
                        </li>
                       

                        <li class="nav-item">
                            <a href="cart.php" class="nav-link  ">
                                <h4 class="text-light"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_number();?></sup></h4>
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
        <!-- calling cart function  -->
        <?php
        cart();
        ?>
        <br>
        <!------------------------------- Second child------------------------ -->
        <div class="bg-light">
            <h3 class="text-center">Laxmi TradeWorld Store</h3>
            <p class="text-center">Laxmi store the sale Electric Item and Rubber Part </p>
        </div>

        <!------------------------------- Third child------------------------ -->
        <div class="row px-1">
            <!-------------------------------slide navbar------------------------ -->
            <div class="col-md-2 bg-dark rounded-end p-0">
                <ul class="navbar-nav me-auto text-center">
                    <!-------------------------------Product brand Items------------------------ -->
                    <!-- <li class="nav-item bg-success">
                        <a href="" class="nav-link text-light">
                            <h4>Product Items</h4>
                        </a>
                    </li> -->
                    <?php

                    //get_brands();

                    ?>

                    <!-------------------------------category Item------------------------ -->
                    <li class="nav-item bg-success">
                        <a href="" class="nav-link text-light">
                            <h4>Category Items</h4>
                        </a>
                    </li>

                    <!-------------------------------category F Item------------------------ -->

                    <?php

                    get_categorys();

                    ?>



            </div>

            <!------------------------------- Products ------------------------ -->

            <div class="col-md-10">
                <!------------------------------- Products Items------------------------ -->
                <div class="row">

                    <?php
                    // calling function
                    get_products();
                    get_unique_category();
                    //  $ip = getIPAddress();  
                    //  echo 'User Real IP Address - '.$ip;
                    // get_unique_brand();





                    ?>



                </div>

            </div>
        </div>






        <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-col">
                                <h4>company</h4>
                                <ul>
                                    <li><a href="about.php">about us</a></li>
                                    <li><a href="product.php">our services</a></li>
                                 
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>get help</h4>
                                <ul>
                                    <li><a href="order.php">order status</a></li>
                                    <li><a href="payment.php">payment options</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>online shop</h4>
                                <ul>
                                    <li><a href="product.php">BIR</a></li>
                                    <li><a href="product.php">JMP</a></li>
                                    <li><a href="product.php">LTE</a></li>
                                    <li><a href="product.php">TATA</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>follow us</h4>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/profile.php?id=100082322122355"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/Krishna96266616"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/codewithhack_05/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/krishna-singh-204ba9248/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

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