<?php
// save passed 'id' to variable
$sUserId = $_GET['id'];
//get data and decode it
$sPreExcistingUsers = file_get_contents('../data-files/user-data.txt');
$jPreExcistingUsers = json_decode($sPreExcistingUsers);
//loop through array and find the User with the id and delete (splice) that object
for ($i=0; $i < count($jPreExcistingUsers) ; $i++) {
	if (($jPreExcistingUsers[$i]->id) == $sUserId) {
		//echo "YES";
		//Delete from array, this user, one {object}
		array_splice( $jPreExcistingUsers , $i , 1 );
	}
}
//encode and put into data txt
$sAllUserData = json_encode($jPreExcistingUsers, JSON_UNESCAPED_SLASHES);
file_put_contents('../data-files/user-data.txt', $sAllUserData);

?>
