<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>
<?php
    if(isset($_GET['delete_payment'])){
        $delete_id =$_GET['delete_payment'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `user_payment` WHERE payment_id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Payment Delete  SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?payment','_SELF')</script>";
        }


    }

?>