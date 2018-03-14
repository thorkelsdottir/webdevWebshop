<?php
  //save passed 'id' to variable
  $sProductId = $_GET['id'];
  //get data and decode it
  $sPreExcistingProducts = file_get_contents('../data-files/product-data.txt');
  $jPreExcistingProducts = json_decode($sPreExcistingProducts);
  //echo data when id matches
  for ($i=0; $i < count($jPreExcistingProducts) ; $i++) {
  	if (($jPreExcistingProducts[$i]->id) == $sProductId) {
  		echo json_encode($jPreExcistingProducts[$i]);
  	}
  }
?>
