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
    <title>E-Commerce Website</title>
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
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./userArea/user_reg.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:100/-</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <!-- d-flex to show navbar in horizontal row -->
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
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
  <p class="text-center">Communications is at the heart of E-commerce and community</p>
  
</div>
<!-- fourth child -->
<div class="row px-2">
  <div class="col-md-10">
  <!-- All products -->
  <div class="row">
    <!-- fetching products -->
    <?php
            
        get_allproducts();
        //getproducts();  
        get_unique_categories();
        get_unique_brands();  
    ?>
    <!-- <div class="col-md-4 mb-2">
          <div class="card">
               <img src="./images/chair.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View more</a>
              </div>
        </div>
        </div> -->
    <!-- row end  -->
  </div>
  <!-- col end -->
 </div>
  <!-- side nav -->
  <div class="col-md-2 bg-secondary mb-2 p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light "><h4>Delivary Brands</h4></a>
    </li>
    <?php
      getbarands();
    
    ?>
   
  </ul>
  <!-- categories to be displayed -->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
    <a href="#" class="nav-link text-light "><h4>Categories</h4></a>
    </li>
    <!-- <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories1</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories2</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories3</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories4</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories5</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-light">Categories6</a>
    </li>
    <li class="nav-item"> -->
      <!-- <a href="#" class="nav-link text-light">Categories7</a> -->
    </li>

    <?php
      getcategories();
    ?>
  </ul>
  </div>
</div>


<!-- last nav footer -->
<?php
        include('./includes/footer.php');
    
    
    ?>
    </div>

    
</body>
</html>