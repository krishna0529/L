<?php
include('../database/conn.php');




?>
<?php
    if(isset($_GET['delete_users'])){
        $delete_id =$_GET['delete_users'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `users` WHERE id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Users Delete  SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?list_users','_SELF')</script>";
        }


    }

?>