<?php
        include('../includes/connect.php');
        include('../functions/common_function.php');
      @session_start();

?>

<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
      <!-- link css 
      <link rel="stylesheet" href="../style.css"> -->


   
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-2 col-xl-5">
                <img src="../images/admin_login.png"width="80%"  alt="" class="img-fluid">

            </div>
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" >
                   <!-- username box -->
                    <div class="form-outline mb-3">
                        <label for="admin_name" class="form-lable">Adminname</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="admin_name">
                    </div>
                   
                      <!-- user password box-->
                      <div class="form-outline mb-3">
                        <label for="admin_password" class="form-lable">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="admin_password">
                   
                    <div>
                        <div class="mt-3">
                            <a href="#">ForgetPassword</a>
                        </div>
                        <input type="submit" value="Login" name="admin_login" class="mt-3 bg-info py-2 px-3 border border-danger fw-bold">
                        <p class="small fw-bold mt-2 mb-5 ">Don`t have an account? <a href="Admin_Registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['admin_login'])){
        $admin_name=$_POST['admin_name'];
        $admin_password=$_POST['admin_password'];
        $select="select * from `admin_table` where admin_name='$admin_name'";
        $result=mysqli_query($conn,$select);
        $row_count=mysqli_num_rows($result);
        //$row_data=mysqli_fetch_assoc($result);
        
        //cart
        $ip=getIPAddress();
        $select_query_cart="select * from `cart_details` where ip_address='$ip'";
        $result_cart=mysqli_query($conn,$select_query_cart);
        $row_count_cart=mysqli_num_rows($result_cart);
        if($row_count>0){
            $_SESSION['admin_name']=$admin_name;

            if($admin_password){

                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['admin_name']=$admin_name;

                    echo"<script>alert('Login Successfully')</script>";
                    echo"<script>window.open('index2.php','_self')</script>";
                    
                }
                else{
                    $_SESSION['admin_name']=$admin_name;

                    echo"<script>alert('Login Successfully')</script>";
                    echo"<script>window.open('payment.php','_self')</script>";
                    
                }
            }
            else{
                echo"<script>alert('Invalid Credentials')</script>";

            }

        }
        else{
            echo"<script>alert('Invalid Credentials')</script>";

        }
    }

?>