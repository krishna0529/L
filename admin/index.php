<?php
include('../database/conn.php');

if(isset($_POST['Login'])){
    $email = $_POST['Email'];
    $password= md5($_POST['password']);

    $select_Query ="SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection,$select_Query);
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['email'])) {
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: Adashboard.php");
        } else {
            echo "<h2 class='text-center' > Not Login </h2>";
        }
    }

    
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laxmi Tradeworld Login</title>

    <!-- ------------------------------------CSS only--------------------------------- -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <style>
    * {
      overflow: hidden;
    }
    .pro{
        width: 500px;
        height: 500px;
    }
  </style>

  <body>
    <div class="container-fluid m-3">
      <!------------------------------- last child------------------------ -->
      <h2 class="text-center mb-5">Admin Login</h2>

      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-5">
            <img src="images/r.jpg" alt="Admin Image" class="pro">
        </div>
        <div class="col-lg-6  col-xl-4">
        <form action="" method="post">
           
            <div class="form-outline mb-4">
                <label for="Email" class="form-label"> Email</label>
                <input type="email" id="Email" name="Email" placeholder="Enter the Email" required="required" class="form-control ">
            </div>
            <div class="form-outline mb-4">
                <label for="Password" class="form-label">Password</label>
                <input type="password" id="Password" name="password" placeholder="Enter the password" required="required" class="form-control ">
            </div>
           
            <div>
                <p class="small text-danger ">Don't You Have account ?<a href="register.php">Register</a> </p>
                <input type="submit" value="Login" class="btn btn-success" name="Login">
            </div>
        </form>
        </div>
      </div>
    </div>

    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
