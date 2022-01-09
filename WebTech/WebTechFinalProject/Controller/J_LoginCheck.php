<?php
	session_start();
	require_once('../Model/usersModel.php');

	if(isset($_POST['Submit']))
  {
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];

		if($Username != "")
    {
			if($Password != "")
      {
				$status = J_validateLogin($Username, $Password);

				if($status)
				{
					$data = getRolebyuName($_POST['Username']);
					$_SESSION['Username'] = $Username;
					$_SESSION['id'] = $data['id'];
					$_SESSION['flag'] = 'true';

					header('location: ../Views/J_UserDashboard.php');
				}
				else {
					echo "Incorrect username/password";
				}
			}
      else
      {
				echo "Please provide your password";
			}
		}
    else
    {
			echo "Please provide you username";
		}
	}
?>
