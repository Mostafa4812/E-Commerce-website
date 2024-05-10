
<h3 class="text-center text-secondary">All brands</h3>
<table class="table table-bordered mt-s">
    <thead class="bg-info">
        <tr class="text-center">

            <th>ID</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr> 

    </thead>
<tbody class="bg-secondary text-light"></tbody>
<?php
    
    $select_bran="Select * from`brands`";
    $result=mysqli_query ($conn, $select_bran);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
     $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    $number++;
    
?>
    <tr class="text-center">
        <td><?php echo $number?></td>
        <td><?php echo $brand_title?></td>
        <td><a href='index2.php?edit_brand=<?php echo $brand_id?>' class=text-secondary><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index2.php?delete_brand=<?php echo $brand_id?>' class=text-secondary><i class='fa-solid fa-trash'></i></a></td>
                    
</tr>
<?php


    }?>
    </tbody>
</table>