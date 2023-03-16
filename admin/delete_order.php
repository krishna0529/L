<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>
<?php
    if(isset($_GET['delete_order'])){
        $delete_id =$_GET['delete_order'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `user_orders` WHERE order_id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Order Delete SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?all_order','_SELF')</script>";
        }


    }

?>