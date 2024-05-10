<?php 
      include('../includes/connect.php');

    include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Regitration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">


   
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form  method="post" enctype="multipart/form-data" >
                   <!-- username box -->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- user email box-->
                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-lable">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter e-mail" autocomplete="off" required="required" name="user_email">
                    </div>
                         <!-- user image box-->
                         <div class="form-outline mb-3">
                        <label for="user_image" class="form-lable">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                      <!-- user password box-->
                      <div class="form-outline mb-3">
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password">
                    </div>
                        <!-- user confirm password box-->
                        <div class="form-outline mb-3">
                        <label for="user_confirm_password" class="form-lable">Confirm Password</label>
                        <input type="password" id="user_confirm_password" class="form-control" placeholder="Reenter your password" autocomplete="off" required="required" name="user_confirm_password">
                    </div>
                     <!-- address box -->
                     <div class="form-outline mb-3">
                        <label for="user_address" class="form-lable">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required" name="user_address">
                    </div>
                         <!-- contact box -->
                         <div class="form-outline mb-3">
                        <label for="user_contact" class="form-lable">Contact</label>
                        <input type="number" id="user_contact" class="form-control" placeholder="Enter Mobile Number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div>
                        <input type="submit" value="Register" name="user_register" class="bg-info py-3 px-4 border border-danger rounded-circle fw-bold">
                        <p class="small fw-bold mt-2 pt-1 ">Already have an account? <a href="userlogin.php" class="text-danger">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- php code -->

<?php
    if(isset($_POST['user_register'])){
            $user_username=$_POST['user_username'];
            $user_password=$_POST['user_password'];
            $user_email=$_POST['user_email'];
            $user_conf=$_POST['user_confirm_password'];
            $user_address=$_POST['user_address'];
            $user_contact=$_POST['user_contact'];
            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];
            $user_ip=getIPAddress();

            
      
                
                // if($password != $confirm_password){
                //     echo "Password and Confirm Password do not match.";
                // }
      
            

    //select query
    $select=("select * from `user_table` where username='$user_username' or user_email='$user_email'");
    $result=mysqli_query($conn,$select);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo"<script>alert('User already exist')</script>";
    }
    elseif($user_password!=$user_conf)
    {
        
        echo"<script>alert('Password and Confirm Password do not match.')</script>";

    }
    else{
        // insert query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
        values('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($conn,$insert_query);
        
    }
   
    //selecting cart items
    $select_cart_items-"Select * from cart_details where ip_address= '$user_ip'";
    $result_cart-mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows ($result_cart);
    if($rows_count>6){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo"<script>window.open ('checkout.php','_self')</scripts>";
    }else{ 
        echo "<script>window.open(../index.php','_self')</script>";
    }
}
?>
