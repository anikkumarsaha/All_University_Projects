<?php
	session_start();
	require_once('../Model/usersModel.php');

  $user = json_decode($_REQUEST['data']);

	$s = (array) $user;

  $Username = $s['username'];
	$Password = $s['password'];

	if($Username != "")
	{
		if($Password != "")
		{

			$Userlist = J_getRegisteredUserByName($Username);
			$Count = mysqli_num_rows($Userlist);

			if($Count == 1)
			{
				$status = J_ChangePassword($s);
				if($status)
				{
					echo "Password changed successfully";
				}
				else
				{
					echo "Password changing failed";
				}
			}
			else {
				echo "No user found named ".$Username;
			}
		}
		else {
			echo "Please provide your password";
		}
	}
	else {
		echo "Please provide your username";
	}

?>
