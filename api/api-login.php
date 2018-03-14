<?php
	session_start();
	// Data comes from the browser
	$sUserEmailLogin = $_POST['txtUserEmailLogin'];
  $sUserPasswordLogin = $_POST['txtUserPasswordLogin'];

	//Get the Userdata fron txt file
	$sAllUsers = file_get_contents('../data-files/user-data.txt');
	$jAllUsers = json_decode($sAllUsers);

	for ($i=0; $i < count($jAllUsers) ; $i++) {
		//echo $jAllUsers[$i]->email;
		$sUserProfileImage = $jAllUsers[$i]->image;
		$sUserProfileLastName = $jAllUsers[$i]->lastname;

		if( $jAllUsers[$i]->email == $sUserEmailLogin &&
				$jAllUsers[$i]->password == $sUserPasswordLogin )
		{
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['userId'] = $jAllUsers[$i]->id;
			$_SESSION['userRole'] = $jAllUsers[$i]->userrole;
			$_SESSION['userImage'] = $sUserProfileImage;
			$_SESSION['userLastName'] = $sUserProfileLastName;
			$sjResponse = '{"login":"ok"}';
			echo $sjResponse;
			exit;
		}
	}
	//echo "not logged in";
	$sjResponse = '{"login":"error"}';
	echo $sjResponse;
	exit;
?>
