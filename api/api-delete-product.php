<?php
//save passed 'id' to variable
$sProductId = $_GET['id'];
//get data and decode it
$sPreExcistingProducts = file_get_contents('../data-files/product-data.txt');
$jPreExcistingProducts = json_decode($sPreExcistingProducts);
//loop through array and find matching ID
for ($i=0; $i < count($jPreExcistingProducts) ; $i++) {
	if (($jPreExcistingProducts[$i]->id) == $sProductId) {
		//echo "YES";
		//Delete the array, this product, one {object}
		array_splice( $jPreExcistingProducts , $i , 1 );
	}
}
//encode and put into data file
$sAllProductData = json_encode($jPreExcistingProducts, JSON_UNESCAPED_SLASHES);
file_put_contents('../data-files/product-data.txt', $sAllProductData);
?>
