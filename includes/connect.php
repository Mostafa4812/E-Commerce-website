<?php
    $conn=mysqli_connect('localhost','root','','mystore');
    
    if(!$conn){//علشان ما يظهرش في كل صفحه الاتصال ناجح اعكس
        die(mysqli_connect($conn));
    }
 
?>