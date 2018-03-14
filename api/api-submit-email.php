<?php

//save to variable
$sUserEmail = $_POST['txtUserEmail'];

//decode and put into jason object
$jUserData = json_decode('{}');
$jUserData->email= $sUserEmail;

//get data and decode it
$sPreExcistingEmails = file_get_contents('../data-files/email-subscribe-data.txt');
$jPreExcistingEmails = json_decode($sPreExcistingEmails);

//push data into array after excisting data (if data excistst)
if (!empty($jUserData->email)) {
  array_push( $jPreExcistingEmails, $jUserData);
}

//encode data and put into dat txt file
$sAllUserEmails = json_encode($jPreExcistingEmails);
file_put_contents('../data-files/email-subscribe-data.txt', $sAllUserEmails);

?>
