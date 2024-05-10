
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
    
        $username=$_SESSION['username'];
        $get_user="select * from `user_table` where username='$username'";
        $result=mysqli_query($conn,$get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];

    ?>

    <h3 class="text-success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>S.NO</th>
            <th>Amount</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete.Incomplete</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="bg-secondary-text-light">

        <?php
           $number=1;
            $get_order_details="select * from `user_orders` where user_id=$user_id";
            $result_orders=mysqli_query($conn,$get_order_details);
            while($row_orders=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_orders['order_id'];
                $ammount=$row_orders['ammount'];
                // $ammount=$row_orders['ammount'];
                $total_products=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                if($order_status=='pendding'){
                    $order_status='Incomplete';
                }else{
                    $order_status='Complete';

                }
             
                echo "
                <tr>
                <td class='text-success'>$number</td>
                <td>$ammount</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                ?>
                <!-- علشان بعد التأكيد تتحول من الى مدفوع -->
                <?php

                if($order_status=='Complete'){
                    echo "<td>Paid</td>";
                }else{
                    
                    echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-secondary'>Confirm</a></td>
                    </tr>";
                }
                $number++;
            }
        ?>
         
        </tbody>
    </table>
    
</body>
</html>
