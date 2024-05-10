<?php 
      include('../includes/connect.php');

    include('../functions/common_function.php');
    @session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">


   
</head>
<body>
    <div class="container-fluid my-2">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-2 col-xl-5">
                <img src="../images/Admin_reg.png"width="80%"  alt="" class="img-fluid">

            </div>
            <div class="col-lg-10 col-xl-6">
                <form  method="post" enctype="multipart/form-data" >
                   <!-- username box -->
                    <div class="form-outline mb-3">
                        <label for="admin_username" class="form-lable">Username</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="admin_name">
                    </div>
                    <!-- user email box-->
                    <div class="form-outline mb-3">
                        <label for="admin_email" class="form-lable">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter e-mail" autocomplete="off" required="required" name="admin_email">
                    </div>
                    
                      <!-- user password box-->
                      <div class="form-outline mb-3">
                        <label for="admin_password" class="form-lable">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="admin_password">
                    </div>
                        <!-- user confirm password box-->
                        <div class="form-outline mb-3">
                        <label for="admin_confirm_password" class="form-lable">Confirm Password</label>
                        <input type="password" id="admin_confirm_password" class="form-control" placeholder="Reenter your password" autocomplete="off" required="required" name="admin_confirm_password">
                    </div>
            
                    <div>
                        <input type="submit" value="Register" name="admin_register" class="bg-info py-3 px-4 border border-danger rounded-circle fw-bold">
                        <p class="small fw-bold mt-2 pt-1 ">Don't have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->

<?php
    if(isset($_POST['admin_register'])){
            $admin_name=$_POST['admin_name'];
            $admin_email=$_POST['admin_email'];
            $admin_password=$_POST['admin_password'];
            $admin_conf=$_POST['admin_confirm_password'];
            // $user_address=$_POST['admin_address'];
            // $user_contact=$_POST['admin_contact'];
            // $admin_image=$_FILES['admin_image']['name'];
            // $admin_image_tmp=$_FILES['admin_image']['tmp_name'];
            // $admin_ip=getIPAddress();

            
      
                
                // if($password != $confirm_password){
                //     echo "Password and Confirm Password do not match.";
                // }
      
            

    //select query
    $select=("select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'");
    $result=mysqli_query($conn,$select);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo"<script>alert('Admin already exist')</script>";
    }
    elseif($admin_password!=$admin_conf)
    {
        
        echo"<script>alert('Password and Confirm Password do not match.')</script>";

    }
    else{
        // insert query
        // move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");

        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password)
        values('$admin_name','$admin_email','$admin_password')";

        $sql_execute=mysqli_query($conn,$insert_query);
        
    }
   
    // //selecting cart items
    // $select_cart_items-"Select * from cart_details where ip_address= '$admin_ip'";
    // $result_cart-mysqli_query($con,$select_cart_items);
    // $rows_count=mysqli_num_rows ($result_cart);
    // if($rows_count>6){
    // $_SESSION['admin_name']=$admin_admin_name;
    // echo "<script>alert('You have items in your cart')</script>";
    // echo"<script>window.open ('checkout.php','_self')</scripts>";
    // }else{ 
    //     echo "<script>window.open(../index.php','_self')</script>";
    // }
}
?>