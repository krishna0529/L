<?php
include('../database/conn.php');


?>

<h3 class="text-center ">ALL Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">

    
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Invoice Number</th>
            <th>Amount </th>
            <th>Payment</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_query ="SELECT * FROM `user_payment`";
        $result_query =mysqli_query($connection,$select_query);
        $number=0;
        while($row= mysqli_fetch_assoc($result_query)){
            $payment_id =$row['payment_id'];
            $order_id=$row['order_id'];
            $invoice_number=$row['invoice_number'];
            $amount=$row['amount'];
            $payment_mode=$row['payment_mode'];
            $date=$row['date'];
            $number++;
           
            echo "<tr class='text-center'>           
        
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td> $date</td>
            
            
            <td><a href='./Adashboard.php?delete_payment=$payment_id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModalCenter' ><i class='fa-solid fa-trash '></i></a></td>
                    
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
        <h4>Are You Sure You Want Delete This Payment ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"><a href='./Adashboard.php?delete_payment=<?php echo $payment_id ?>' class="text-light text-decoration-none"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>