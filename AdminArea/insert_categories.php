<?php
    include("../includes/connect.php");
    if(isset($_POST['Insert_Cat'])){
        $category_title=$_POST['Cat_title'];
        //select data from database
        $select_query="select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($conn,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This category exists')</script>";
        }else{
        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($conn,$insert_query);
        if($result){
             echo "<script>alert('category has been inserted successfully')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="Cat_title" placeholder="Insert Categories" aria-label="categories">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info p-2 my-3 border-0 " name="Insert_Cat" value="Insert Categories" class="bg-info">
        <!-- <button class="bg-info p-2 my-3 border-0 ">Insert Categories</button> -->
    </div>
</form>