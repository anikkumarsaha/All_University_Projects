<?php
	require_once('../Model/usersModel.php');
	$user = json_decode($_REQUEST['data']);

	$s = (array) $user;

  $Username = $s['username'];
	$Password = $s['password'];

	if($Password != "")
	{
		$status = J_ChangePassword($s);

		if($status)
		{
			echo "Password changed successfully";
		}
		else {
			echo "Password changing failed";
		}

	}
	else
	{
		echo "Please enter your new password";
	}




?>
