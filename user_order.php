<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
// user id order featch the database
$email = $_SESSION['SESSION_EMAIL'];
$user_email = "SELECT *FROM `users` WHERE email='$email'";
$user_querry = mysqli_query($conn, $user_email);
$row_data = mysqli_fetch_assoc($user_querry);
$user_id =$row_data['id'];


?>

    <h3 class="text-center text-success m-4"> ALL Order </h3>
    <form   action="" method="post" enctype="multipart/form-data"> 
        <table class="table table-bordered mt-4">
            <thead class="bg-success text-light">
            <tr>
                <th>SR No</th>
                
                <th>Invoice Number</th>
                <th>Total Product</th>
                <th>Amout Due</th>
                <th>Complete/Incomplete</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-dark text-light">

        <?php
        $order ="SELECT * FROM `user_orders` WHERE user_id=$user_id";
        $order_querry = mysqli_query($connection, $order);
        $number=1;
        while($row_order_querry=mysqli_fetch_assoc($order_querry)){
            $order_id =$row_order_querry['order_id'];
            $order_invoice =$row_order_querry['invoice_number'];
            $total_products =$row_order_querry['total_products'];
            $Amout_Due =$row_order_querry['amount_due'];
            $status =$row_order_querry['order_status'];
            if($status=='pending'){
                $status='Incomplete';

            }else{
                $status='Complete';
            }
            $date =$row_order_querry['order_date'];
            
            echo "<tr>

            <td> $number</td>
            
            <td> $order_invoice </td>
            <td> $total_products </td>
            <td> $Amout_Due</td>
            <td> $status</td>
            <td> $date  </td>";
            ?>
            <?php
            if($status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                
                echo" <td> <a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a>  </td>

            </tr>";
            }

        $number++;

        }

        ?>
           
        </tbody>


        </table>
    </form>
    
</body>
</html>
