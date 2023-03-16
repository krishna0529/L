<?php
include('../database/conn.php');


?>

<h3 class="text-center ">ALL Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">

    
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Amount Due</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_query ="SELECT * FROM `user_orders`";
        $result_query =mysqli_query($connection,$select_query);
        $number=0;
        while($row= mysqli_fetch_assoc($result_query)){
            $order_id=$row['order_id'];
            $user_id=$row['user_id'];
            $amount_due=$row['amount_due'];
            $invoice_number=$row['invoice_number'];
            $total_products=$row['total_products'];
            $order_status=$row['order_status'];
            $order_date=$row['order_date'];
            $number++;
           
            echo "<tr class='text-center'>           
        
            <td>$number</td>
            <td>$amount_due</td>
            <td> $invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            
            <td><a href='./Adashboard.php?delete_order=$order_id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModalCenter' ><i class='fa-solid fa-trash '></i></a></td>
                    
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
        <h4>Are You Sure You Want Delete This Order ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"><a href='./Adashboard.php?delete_order=<?php echo $order_id ?>' class="text-light text-decoration-none"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>