<?php
  //save data in variable
  $sUserId = $_POST['txtEditUserId'];
  $sUserEmail = $_POST['txtEditUserEmail'];
  $sUserPassword = $_POST['txtEditUserPassword'];
  $sUserFirstName = $_POST['txtEditUserFirstName'];
  $sUserLastName = $_POST['txtEditUserLastName'];
  $sUserMobile = $_POST['txtEditUserMobile'];
  $sUserPic = $_FILES['fileEditUserPic']['name'];

  //save the file to the pictures folder
  $sFolder = '../images/';
  $imgPathInDb = 'images/'.$sUserPic;
  $sSaveFileTo = $sFolder.$sUserPic;
  move_uploaded_file($_FILES['fileEditUserPic']['tmp_name'], $sSaveFileTo );

  //get user data and decode it
  $sPreExcistingUsers = file_get_contents('../data-files/user-data.txt');
  $jPreExcistingUsers = json_decode($sPreExcistingUsers);

  //get data for each user with ID
  for ($i=0; $i < count($jPreExcistingUsers) ; $i++) {
  	if ($jPreExcistingUsers[$i]->id == $sUserId) {
      echo json_encode("string");
      $jPreExcistingUsers[$i]->email= $sUserEmail;
      $jPreExcistingUsers[$i]->password= $sUserPassword;
      $jPreExcistingUsers[$i]->firstname= $sUserFirstName;
      $jPreExcistingUsers[$i]->lastname= $sUserLastName;
      $jPreExcistingUsers[$i]->mobile= $sUserMobile;
      $jPreExcistingUsers[$i]->image= $imgPathInDb;
  	}
  }

  //encode data and put in data file
  $sAllUserData = json_encode($jPreExcistingUsers, JSON_UNESCAPED_SLASHES);
  file_put_contents('../data-files/user-data.txt', $sAllUserData);
?>
