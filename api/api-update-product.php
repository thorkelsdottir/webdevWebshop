<?php
  //save data to variable
  $sProductId = $_POST['txtEditProductId'];
  $sProductName = $_POST['txtEditProductName'];
  $sProductPrice = $_POST['txtEditProductPrice'];
  $sProductPic = $_FILES['fileEditProductPic']['name'];

  //save the file to the pictures folder
  $sFolder = '../productimages/';
  $imgPathInDb = 'productimages/'.$sProductPic;
  $sSaveFileTo = $sFolder.$sProductPic;
  move_uploaded_file($_FILES['fileEditProductPic']['tmp_name'], $sSaveFileTo );

  //get data from txt file
  $sPreExcistingProducts = file_get_contents('../data-files/product-data.txt');
  $jPreExcistingProducts = json_decode($sPreExcistingProducts);

  //loop through data with ID
  for ($i=0; $i < count($jPreExcistingProducts) ; $i++) {
  	if ($jPreExcistingProducts[$i]->id == $sProductId) {
      //echo json_encode("string");
      $jPreExcistingProducts[$i]->name= $sProductName;
      $jPreExcistingProducts[$i]->price= $sProductPrice;
      $jPreExcistingProducts[$i]->image= $imgPathInDb;
  	}
  }

  //encode data and put in txt file
  $sAllProductData = json_encode($jPreExcistingProducts, JSON_UNESCAPED_SLASHES);
  file_put_contents('../data-files/product-data.txt', $sAllProductData);
?>
