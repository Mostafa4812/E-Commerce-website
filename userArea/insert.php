<?php 
      include('../includes/connect.php');

    include('../functions/common_function.php');

?>
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
    }
    // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
    values('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($conn,$insert_query);
    if($sql_execute){
        echo"<script>alter('Data is inserted successfully')</script>";
    }
    else{
        die(mysqli_connect($conn));
    }
?>