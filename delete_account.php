<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delet Account</title>
</head>
<body>

<?php
     
     $email =$_SESSION['SESSION_EMAIL'];
     if(isset($_POST['delete_account'])){
        $delete_query ="DELETE FROM `users` WHERE email='$email'";
        $reslut_delete =mysqli_query($conn,$delete_query);
        if($reslut_delete){
            session_destroy();
            echo "<script>alert('Account Delete Successfully ')</script>";
            echo "<script>window.open('register.php','_self')</script>";
        }
     }

     if(isset($_POST['do_not_delete_account'])){
        echo "<script>window.open('profile.php','_self')</script>";
     }
?>
    <h3 class="text-center text-danger m-4"> Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline text-center m-auto w-50 my-5">
            <input type="submit" class=" form-control btn btn-danger w-50 m-auto" value="Delete Account" name="delete_account">
        </div>
        <div class="form-outline text-center m-auto w-50 my-5">
          <input type="submit" class=" form-control btn btn-success w-50 m-auto" name="do_not_delete_account" value="Don't Account Delete">
        </div>

    </form>

</body>
</html>