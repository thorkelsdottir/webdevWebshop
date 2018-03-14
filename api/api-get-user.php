<?php
  //save to variable
  $sUserId = $_GET['id'];
  //get data and deode it
  $sPreExcistingUsers = file_get_contents('../data-files/user-data.txt');;
  $jPreExcistingUsers = json_decode($sPreExcistingUsers);
  //echo the data when sUserId is the sama
  for ($i=0; $i < count($jPreExcistingUsers) ; $i++) {
  	if (($jPreExcistingUsers[$i]->id) == $sUserId) {
  		echo json_encode($jPreExcistingUsers[$i]);
  	}
  }
?>
