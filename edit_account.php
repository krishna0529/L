<?php
   if(isset($_GET['edit_account'])){
    $email_session_email =$_SESSION['SESSION_EMAIL'];
    $user_image = "SELECT *FROM `users` WHERE email='$email_session_email'";
    $reslut_querry =mysqli_query($conn,$user_image);
    $row_count = mysqli_fetch_assoc($reslut_querry);
    $id=$row_count['id'];
    $name=$row_count['name'];
    $email=$row_count['email'];

    if(isset($_POST['user_update'])){
      $update_id =  $id;
      $name=$_POST['user_usrname'];
      $email=$_POST['user_email'];
      $image =$_FILES['user_image']['name'];
      $tmp =$_FILES['user_image']['tmp_name'];
      
      // update query 
      if($name=='' or $email=='' or $image==''){
        echo "<script>alert('Please fill all the Available fields')</script>";
      }else{
        move_uploaded_file($tmp,"./user_photo/$image");

        $update_data="UPDATE `users` SET name='$name' , email='$email' , image='$image' WHERE id = $update_id";
        $update_reslut_querry =mysqli_query($conn,$update_data);
        if($update_reslut_querry){
          echo "<script>alert('Data update successfully ')</script>";
          // echo "<script>window.open('logout.php')</script>";
        }
      }
     


    }


   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Edit Account</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='#'>
  <script src='#'></script>
</head>
<body>
  <h3 class="text-center text-success m-4"> Edit Account </h3>
  <form action="" method="post" enctype="multipart/form-data" class="text-center">
    <div class="form-outline mb-4">
      
      <input type='text' id='user_usrname' name='user_usrname'  value="<?php echo $name ?>" class="form-control w-50 m-auto" >
    </div>
    <div class="form-outline mb-4">
      
      <input type='email' id='user_email' name='user_email' value="<?php echo $email ?>" class="form-control w-50 m-auto" >
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
      
      <input type='file' id='user_image' name='user_image' class="form-control " >
      <img src="./user_photo/<?php echo $user_images; ?>" alt="" class="imgs">
    </div>

    <input type='submit' id='user_submit' value="Update" name='user_update' class="btn btn-success " >

  </form>


</body>
</html>