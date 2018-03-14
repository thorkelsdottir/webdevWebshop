<?php
//get data and decode it
$sAddedProducts = file_get_contents('../data-files/cart-data.txt');
$aAddedProducts = json_decode($sAddedProducts);
//emptying the array!
$aAddedProducts = [];
//encodeing it and puting it back into the data file
$sAddedToCart = json_encode($aAddedProducts, JSON_UNESCAPED_SLASHES);
file_put_contents('../data-files/cart-data.txt', $sAddedToCart);
echo $sAddedToCart;
 ?>
