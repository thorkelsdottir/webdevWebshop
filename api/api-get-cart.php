<?php
//save passed 'id' to variable
$sProductId = $_GET['id'];
//get data and decode it
$sProducts = file_get_contents('../data-files/cart-data.txt');
//echo the data
echo $sProducts;
?>
