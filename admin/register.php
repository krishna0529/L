<?php
include('../database/conn.php');


if(isset($_POST['Register'])){
    $username =$_POST['username'];
    $email =$_POST['Email'];
    $password =md5($_POST['password']);
    $confirm_password=md5($_POST['Confirm_password']);

   if($password === $confirm_password) {

       $insert_Query="INSERT INTO `admin`( `username`, `email`, `password`) VALUES ('$username','$email','$password')";
       $sql_Ex =mysqli_query($connection,$insert_Query);
       if($sql_Ex){
        echo "<script>alert('Register Successfully')</script>";
        echo "<script>window.open('index.php')</script>";
       }else{
            die(mysqli_error($connection));
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
    <title>Laxmi Tradeworld Register</title>

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
      <h2 class="text-center mb-5">Admin Register</h2>

      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-5">
            <img src="images/r.jpg" alt="Admin Image" class="pro">
        </div>
        <div class="col-lg-6  col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label"> Username</label>
                <input type="text" id="username" name="username" placeholder="Enter the username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="Email" class="form-label"> Email</label>
                <input type="email" id="Email" name="Email" placeholder="Enter the Email" required="required" class="form-control ">
            </div>
            <div class="form-outline mb-4">
                <label for="Password" class="form-label">Password</label>
                <input type="password" id="Password" name="password" placeholder="Enter the password" required="required" class="form-control ">
            </div>
            <div class="form-outline mb-4">
                <label for="Confirm Password" class="form-label">Confirm Password</label>
                <input type="password" id="Confirm Password" name="Confirm_password" placeholder="Enter the Confirm password" required="required" class="form-control ">
            </div>
            <div>
                <p class="small text-danger ">Do You Have account ?<a href="index.php"> Login</a> </p>
                <input type="submit" value="Register" class="btn btn-success" name="Register">
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
