<?php
    if (isset ($_GET ['delete_brand'])){
        $delete_brand=$_GET['delete_brand'];
        //echo $delete_brand;
        $delete_brand="Delete from `brands` where brand_id=$delete_brand";
        $result=mysqli_query ($conn,$delete_brand);
        if ($result){
            echo "<script>alert('Brand has been deleted successfully')</script>";
            echo "<script>window.open('./index2.php?view_brands','_self')</script>";
        }
    }
?>