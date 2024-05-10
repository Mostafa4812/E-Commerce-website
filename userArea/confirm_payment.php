<?php
  include('../includes/connect.php');
  session_start();
  if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];

    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($conn,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $ammount=$row_fetch['ammount'];
  }

    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice_number'];
        $ammount=$_POST['ammount'];
        $payment_mode=$_POST['payment_mode'];
        $insert_query="insert into `user_payments` (order_id,invoice_number,ammount,payment_mode) values($order_id,$invoice_number,$ammount,'$payment_mode')";
        $result=mysqli_query($conn,$insert_query);
        if($result){
            echo "<h3 class='text-center text-light'>Payment Confirmed successfully</h3>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_orders="update `user_orders` set order_status='complete' where order_id=$order_id";
        $result_orders=mysqli_query($conn,$update_orders);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="ammount" 
                value="<?php echo $ammount?>">
            </div>
            <div class ="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>PayPall</option>
                <option>VodafoneCash</option>
                <option>Alahly_PhoneCash</option>
                <option>COD</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>
