<?php
	session_start();
	require_once('../model/usersModel.php');

	if(isset($_POST['submit'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];

		if($username != ""){
			if($password != ""){

				$status = validate($username, $password);

				if($status){
					setcookie('Logged', 'true', time()+3600, '/');
					setcookie('username', $username, time()+3600, '/');
					$data = getRolebyuName($username);

					setcookie('role', $data['role'], time()+3600, '/');
					$flag ='Yes';
					setcookie('id', $data['id'], time()+3600, '/');
					header('location: ../views/newsfeed.php');
				}else{
					//echo "not found";
					$flag ='No';
					setcookie('found', $flag, time()+3600, '/');
					header('location: ../views/login.php');
				}

			}else{
				$flag ='No';
				setcookie('found', $flag, time()+3600, '/');
				header('location: ../views/login.php');
			}
		}else{
			$flag ='No';
			setcookie('found', $flag, time()+3600, '/');
			header('location: ../views/login.php');
		}
	}
?>
