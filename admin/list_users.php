<?php
include('../database/conn.php');
include('../config.php');


?>

<h3 class="text-center ">ALL Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">

    
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Image</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_query ="SELECT * FROM `users` ";
        $result_query =mysqli_query($connection,$select_query);
        $number=0;
        while($row= mysqli_fetch_assoc($result_query)){
            $id =$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $image=$row['image'];
            $address=$row['address'];
            $mobile =$row['mobile'];

            $created_At=$row['created_At'];
            $number++;
           
            echo "<tr class='text-center'>           
        
            <td>$number</td>
            <td>$name</td>
            <td>$email</td>
            <td>$address</td>
            <td>$mobile</td>
            <td><img src='../user_photo/$image' alt'$name' class='pro_img'/></td>
            <td> $created_At</td>
            
            
            <td><a href='./Adashboard.php?delete_users=$id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModalCenter' ><i class='fa-solid fa-trash '></i></a></td>
                    
        </tr>";
            

        }

        ?>

    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are You Sure You Want Delete This Users ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"><a href='./Adashboard.php?delete_users=<?php echo $id ?>' class="text-light text-decoration-none"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>