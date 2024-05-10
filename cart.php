<?php
  // connect file
  include('includes/connect.php');
  include('functions/common_function.php');

  session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce cart-details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" />

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
     crossorigin="anonymous"></script>
     <!--link css  -->
     <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- navebar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <!-- bg- info for color -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./images/logo.png" alt="" class="logo"></a>
    <!-- button responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./userArea/user_reg.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i><sup><?php cart_number();?></sup></a>
        </li>
     
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>
<?php
  //calling cart
  cart();
?>
<!-- seconed nav  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
          }else{
            echo  "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
          }
            if(!isset($_SESSION['username'])){
        echo  "<li class='nav-item'>
        <a class='nav-link' href='./userArea/userlogin.php'>Login</a>
        </li>";
      }else{
        echo  "<li class='nav-item'>
        <a class='nav-link' href='./userArea/logout.php'>Logout</a>
        </li>";
      }
      ?>
  </ul>
</nav>
<!-- third nav -->
<div class="bg-light">
  <h3 class="text-center">Tofy Express Store</h3>
  <p class="text-center">E-commerce website </p>
  
</div>
<!-- fourth child table for cart -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
         
            <tbody>
                <!-- php code to display dynamic data -->
                <?php
                    global $conn;
                    $total_price=0;
                    $get_ip_address = getIPAddress();
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_address' ";
                    $result=mysqli_query($conn,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                      echo "   <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>";

                    while($row=mysqli_fetch_array($result)){
                      $product_id=$row['product_id'];
                      $select_products="select * from `products` where product_id ='$product_id'";
                      $result_products=mysqli_query($conn,$select_products);
                      
                      while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_values=array_sum($product_price);
                        $total_price+=$product_values;
                      
                    
                ?>
           
                <tr>
                    <td><?php echo $product_title;?></td>
                    <td><img src="product_images/<?php echo $product_image1;?>"  alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <td><?php echo $price_table;?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                    <!-- <button class="btn btn-info px-4 mx-3">Update</button> -->
                    <input type="submit" value="Update cart" name="update_cart" class="btn btn-info px-4 mx-3">
                    <?php
                         $get_ip_address = getIPAddress();
                         if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="update `cart_details` set quantity=$quantities where ip_address= '$get_ip_address'";
                            $cart_result_quantity=mysqli_query($conn,$update_cart);
                            $total_price*=$quantities;
                         }
                    ?>
                    <!-- <button class="btn btn-warning px-4">Remove</button> -->
                    <input type="submit" value="Remove item" name="remove_item" class="btn btn-info px-4 mx-3">

                    </td>
                </tr>
                <?php  }}}
                  else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    
                  }
                ?>
            </tbody>
            <!-- <tfoot>
                <tr>
                    <td></td>
                </tr>
            </tfoot> -->
          <!-- subtotal -->
        </table>
        <div class="subtotal d-flex mb-2">
          <?php
               
                $get_ip_address = getIPAddress();
                $cart_query="select * from `cart_details` where ip_address='$get_ip_address' ";
                $result=mysqli_query($conn,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){

                 echo" <h4 class='px-4'></h4>Subtotal: <strong class='text-info'></strong>$total_price/-</strong></h4>
                 <input type='submit' value='Continue Shopping' name='continue_shopping' class='btn btn-info px-4 mx-3'>
                 <button class='btn btn-secondary px-4'><a href='./userArea/checkout.php' class='text-warning text-decoration-none'>CheckOut</a></button>";
                }else{
                  echo"<input type='submit' value='Continue Shopping' name='continue_shopping' class='btn btn-info px-4 mx-3'>";
                }
                if(isset($_POST['continue_shopping'])){
                  echo"<script>window.open('index.php','_self')</script>";
                }
          
          ?>
      
        </div>
    </div>
</div>
</form> 
<!-- function to remove item -->
<?php
    function remove_cart_item(){
        global $conn;
        if(isset($_POST['remove_item'])){
            foreach($_POST['removeitem'] as $remove_id){
                    $delete_quary="delete from `cart_details` where product_id=$remove_id";
                    $run_quary=mysqli_query($conn,$delete_quary);
                    if($run_quary){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                    
            }
        }
      }   
      echo $remove_item = remove_cart_item();
?>
<!-- last nav footer -->
<?php
        include('./includes/footer.php');
    
    
    ?>
    </div>

    
</body>
</html>