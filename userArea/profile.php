<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website checkout Page</title>
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
<style>
  .edit_image{
    width: 100px;
    height: 100px;
    object-fit:contain;
  }
</style>
<body>
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
  <p class="text-center">E-commerce Website</p>
  
</div>

<!-- fourth child -->

<div class="row">
      <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height:100uv">
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
            </li>
            <?php
                $username=$_SESSION['username'];
                $user_image="select * from `user_table` where username='$username'";
                $result_image=mysqli_query($conn,$user_image);
                $row_image=mysqli_fetch_array($result_image);
                $user_image=$row_image['user_image'];
                echo " <li class='nav-item'>
                
                <img src='./user_images/$user_image' class='profile_img my-4' alt='' width='95%'>
            </li>";

            ?>
       
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php">Pending Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
        </ul>

      </div>
      <div class="col-md-10 text-center">
      <?php get_user_order_details();
            
            if(isset($_GET['edit_account'])){
              include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
              include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
              include('delete_account.php');
            }
            ?>
      </div>
</div>


<!-- اكتب هنا  -->

  <!-- categories to be displayed -->
  <ul class="navbar-nav me-auto text-center">
  

 
  </ul>
  </div>
</div>


<!-- last nav footer -->
    <?php
        include('../includes/footer.php');
    
    
    ?>
    </div>

    
</body>
</html>