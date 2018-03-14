<?php
	//Get the Productdata from txt file
	$sAllProducts = file_get_contents('../data-files/product-data.txt');
  echo $sAllProducts;
?>
