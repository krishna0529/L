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
    <title>Laxmi About Page </title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="./css/footer.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* *{
            overflow-x: hidden;
        } */
        .ki {
            margin: 8px 25px;
            font-size: 20px;
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
                            <a class="nav-link active text-light ki" aria-current="page" href="welcome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="product.php">Product</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="about.php">About</a>
                        </li>

                    </ul>

                    <ul class="navbar-nav ">
                        <li class="nav-item me-3">
                            <a href="profile.php" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"><?php phot(); ?> <?php username(); ?></h4>
                            </a>
                        </li>
                        

                        <li class="nav-item me-2">
                            <a href="logout.php" class="nav-link  me-4">
                                <h4 class="text-light"><i class="fa-solid fa-right-from-bracket"></i></h4>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!------------------------ About Us --------------------- -->

        <div class="row  ">
            <h2 class=""> Bir </h2>
            <div class="col">
                <h4>
                    <p>BIR is a non-profit organisation under Belgian law. BIR statutes (Articles of Association), Internal Regulations (including Guidelines for Chairpersons) and Anti-Trust Policy (BIR Anti-Trust Policy) were revised and approved in February 2019. The registered office is currently headquartered in Brussels, Belgium.
                        The federation provides a dynamic forum for its members to share their knowledge and experience. It serves as a platform to establish successful business relations and to promote recycling among other industrial sectors and policy makers.
                    </p>
                    <p>BIR is a non-profit organisation under Belgian law. BIR statutes (Articles of Association), Internal Regulations (including Guidelines for Chairpersons) and Anti-Trust Policy (BIR Anti-Trust Policy) were revised and approved in February 2019. The registered office is currently headquartered in Brussels, Belgium.</p>
                </h4>
            </div>
            <div class="col">
                <img src="./images/bir.png" alt="" style="width: 450px;">

            </div>
            <h2 class=""> Trendy </h2>
            <div class="col">
                <img src="./images/ten.png" alt="" style="width: 450px;">

            </div>

            <div class="col">
                <h4>
                    <p>PADMASHREE INTERNATIONAL, Delhi, is a leading supplier established in 2014, with brand name of TRENDY.</p>

                    <p>We are one of the biggest name in the market offering best and wide range of automotive components at competitive prices. Our products are sourced according to industry leading safety and quality standards in mind. All our products are available in many sizes and variations.

                        In order to create the best array of products, we have built a team of experienced and skilled vendors. We have spacious warehouse and office space to cater to our increasing customer base. From the initial stage of procurement of goods till despatch from our facility, all the processes are divided into departments and each department is headed by a qualified manager. We strive to despatch and deliver the goods on priority basis.</p>

                    
                </h4>


            </div>
            <h2 class=""> TATA </h2>
            <div class="col">
                <h4>
                    <p>Way back in 2000, TATA Motors felt the need to introduce a Customer Care programme that catered to the customers’ every need. Slowly, this programme gained popularity and was a hit among the masses. It was then in 2005 that the programme picked up momentum and was then rechristened TATA Genuine Parts (TGP). TATA Genuine Parts in now a spare parts division (SPD) of TATA Motors and caters to spare parts requirements of TATA Motors Commercial Vehicles.</p>
                    <p>TATA Genuine Parts has received numerous awards, establishing our dominance in the spare parts business. These awards speak volumes and display the kind of trust that our clients have in us. Winning all these awards is a source of inspiration for each and everyone associated with the brand, and it only motivates us to outdo ourselves at every pedestal.</p>
                </h4>
            </div>
            <div class="col">
                <img src="./images/werehouse.jpg" alt="" style="width: 450px;">

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