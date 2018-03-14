<?php
//save the passed 'id' to a variable
$sProductId = $_GET['id'];
//get/open data and decode it (from sting to objects in array)
$sProducts = file_get_contents('../data-files/product-data.txt');
$aProducts = json_decode($sProducts);

//loop though array and find matching ID
for ($i = 0; $i < count($aProducts); $i++) {
  if ($aProducts[$i]->id == $sProductId) {
  //save data to variables
  $sProductName = $aProducts[$i]->name;
	$sProductPrice = $aProducts[$i]->price;
  $sProductImage = $aProducts[$i]->image;
  //encode (make string from data)
	$sjProducts = json_encode($aProducts[$i]);
  }
}
//get cart data and decode it
$sAddedProducts = file_get_contents('../data-files/cart-data.txt');
$aAddedProducts = json_decode($sAddedProducts);
//put data into object and decode (from sting to objects in array)
$jAddedProduct = json_decode('{}');
$jAddedProduct->name = $sProductName;
$jAddedProduct->price = $sProductPrice;
$jAddedProduct->image = $sProductImage;

//push data into array after excisting data
array_push($aAddedProducts, $jAddedProduct);
//encode and put into data file
$sAddedToCart = json_encode($aAddedProducts, JSON_UNESCAPED_SLASHES);
file_put_contents('../data-files/cart-data.txt', $sAddedToCart);
//echo that data string
echo $sAddedToCart;
?>
