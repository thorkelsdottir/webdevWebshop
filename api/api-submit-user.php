<?php
  //$_GET['id']
  //$_POST['txtUserName']
  //$_FILES['fileUserPicture']

  //save data to variable
  $sUserEmail = $_POST['txtUserEmail'];
  $sUserPassword = $_POST['txtUserPassword'];
  $sUserFirstName = $_POST['txtUserFirstName'];
  $sUserLastName = $_POST['txtUserLastName'];
  $sUserMobile = $_POST['txtUserMobile'];
  $sUserPic = $_FILES['fileUserPic']['name'];

  //save the file to the pictures folder
  $sFolder = '../images/';
  $imgPathInDb = 'images/'.$sUserPic;
  $sSaveFileTo = $sFolder.$sUserPic;
  move_uploaded_file($_FILES['fileUserPic']['tmp_name'], $sSaveFileTo );

  // decode data and put it into a json object
  $jUserData = json_decode('{}');
  $jUserData->id= uniqid();
  $jUserData->email= $sUserEmail;
  $jUserData->password= $sUserPassword;
  $jUserData->firstname= $sUserFirstName;
  $jUserData->lastname= $sUserLastName;
  $jUserData->userrole= 'user';
  $jUserData->mobile= $sUserMobile;
  $jUserData->image= $imgPathInDb;

  //get data from txt file and decode it
  $sPreExcistingUsers = file_get_contents('../data-files/user-data.txt');
  $jPreExcistingUsers = json_decode($sPreExcistingUsers);

  //push data into array, after exicting data (if data exictist)
  if (!empty($jUserData->id)) {
    array_push( $jPreExcistingUsers, $jUserData);
  }

  //encode data and put into data txt file
  $sAllUserData = json_encode($jPreExcistingUsers, JSON_UNESCAPED_SLASHES);
  file_put_contents('../data-files/user-data.txt', $sAllUserData);



?>
