<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center text-success">All Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <!-- <th>Total Solid</th> -->
                <th>status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $num=0;
                $get_products="select * from `products`";
                $result=mysqli_query($conn,$get_products);
                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    $num++;
                    ?>
                    
                 <tr class='text-center'>
                    <td><?php echo $num;?></td>
                    <td><?php echo $product_title;?></td>
                    <td><img src='../product_images/<?php echo $product_image1?>' class='cart_img'></td>
                    <td><?php echo $product_price?></td>
                    <!-- <td>0</td> -->
                    <td><?php echo $status;?></td>
                    <td><a href='index2.php?edit_product=<?php echo $product_id?>' class=text-light><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index2.php?delete_product=<?php echo $product_id?>' class=text-light><i class='fa-solid fa-trash'></i></a></td>
                    
                 </tr>
                <?php

                }
            
            ?>
   
        </tbody>
    </table>
</body>
</html>