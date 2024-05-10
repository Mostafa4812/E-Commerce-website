<?php
  // connect file
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
    <title>AdminPage</title>
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
     <link rel="stylesheet" href="../style.css">
</head>
<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
          if(!isset($_SESSION['admin_name'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
          }else{
            echo  "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
            </li>";
          }
            if(!isset($_SESSION['admin_name'])){
        echo  "<li class='nav-item'>
        <a class='nav-link' href='admin_login.php'>Login</a>
        </li>";
      }else{
        echo  "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
      }
      ?>
  </ul>
</nav>
        <!-- second child -->
        <div class="bg-light mt-5 mb-5">
            <h3 class="text-center p-0">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <img src="./admin_images/detect.png" alt="" class="admin_img">
                </div>
         
                <div class="button text-center">
                <!-- <?php
                $admin_name=$_SESSION['admin_name'];
                $admin_image="select * from `admin_table` where admin_name='$admin_name'";
                $result_image=mysqli_query($conn,$admin_image);
                $row_image=mysqli_fetch_array($result_image);
                $user_image=$row_image['admin_image'];
                echo " <li class='nav-item'>
                
                <img src='./admin_images/$admin_image' class='profile_img my-4' alt='' width='95%'>
            </li>";

            ?> -->
                    <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index2.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index2.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index2.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index2.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index2.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <!-- <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button> -->
                    <!-- <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button> -->
                </div>
            </div>
        </div>
        </div>
        <!-- fourth child -->
            <div class="container my-5">
                <?php
                    if(isset($_GET['insert_categories']))
                    {
                        include('insert_categories.php');
                    }
                    if(isset($_GET['insert_brands']))
                    {
                        include('insert_brands.php');
                    }
                    if(isset($_GET['view_products']))
                    {
                        include('view_products.php');
                    }
                    if(isset($_GET['edit_product']))
                    {
                        include('edit_product.php');
                    }
                    if(isset($_GET['delete_product']))
                    {
                        include('delete_product.php');
                    }
                    if(isset($_GET['view_categories']))
                    {
                        include('view_categories.php');
                    }
                    if(isset($_GET['view_brands']))
                    {
                        include('view_brands.php');
                    }
                    if(isset($_GET['edit_category']))
                    {
                        include('edit_category.php');
                    }
                    if(isset($_GET['edit_brand']))
                    {
                        include('edit_brand.php');
                    }
                    if(isset($_GET['delete_category']))
                    {
                        include('delete_category.php');
                    }
                    if(isset($_GET['delete_brand']))
                    {
                        include('delete_brand.php');
                    }
                
                ?>
            </div>

        <!-- last nav footer -->

      
        <div>
            <?php
                include('../includes/footer.php');

            ?>
        </div>
  
  
    </div>
    
</body>
</html>