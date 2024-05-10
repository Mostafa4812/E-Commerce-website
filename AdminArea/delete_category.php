<?php
    if (isset ($_GET ['delete_category'])){
        $delete_category=$_GET['delete_category'];
        //echo $delete_category;
        $delete_category="Delete from `categories` where category_id=$delete_category";
        $result=mysqli_query ($conn,$delete_category);
        if ($result){
            echo "<script>alert('Category has been deleted successfully')</script>";
            echo "<script>window.open('./index2.php?view_categories','_self')</script>";
        }
    }
?>