<?php
  //$_GET['id']
  //$_POST['txtUserName']
  //$_FILES['fileUserPicture']
  $sProductName = $_POST['txtProductName'];
  $sProductPrice = $_POST['txtProductPrice'];
  $sProductPic = $_FILES['fileProductPic']['name'];

  //save the file to the pictures folder
  $sFolder = '../productimages/';
  $imgPathInDb = 'productimages/'.$sProductPic;
  $sSaveFileTo = $sFolder.$sProductPic;
  move_uploaded_file($_FILES['fileProductPic']['tmp_name'], $sSaveFileTo );

  //decode data and put it into a json object
  $jProductData = json_decode('{}');
  $jProductData->id= uniqid();
  $jProductData->name= $sProductName;
  $jProductData->price= $sProductPrice;
  $jProductData->image= $imgPathInDb;

  //get data and decode
  $sPreExcistingProducts = file_get_contents('../data-files/product-data.txt');
  $jPreExcistingProducts = json_decode($sPreExcistingProducts);

  //push into array after excisting data.
  if (!empty($jProductData->id)) {
    array_push( $jPreExcistingProducts, $jProductData);
  }
  //encode and put into data txt file
  $sAllProductsData = json_encode($jPreExcistingProducts, JSON_UNESCAPED_SLASHES);
  file_put_contents('../data-files/product-data.txt', $sAllProductsData);
?>
