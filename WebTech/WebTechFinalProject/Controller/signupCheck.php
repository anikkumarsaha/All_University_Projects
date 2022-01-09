<?php
	//session_start();
	require_once('../model/usersModel.php');

	if(isset($_POST['submit'])){

		$username 	= $_POST['username'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$password 	= $_POST['password'];

		if (!empty($_POST['role'])) {
			$role = $_POST['role'];
			// code...
		}
		else {
		//	$role = $_POST['role'];
		}
		if($username != ""){
			if($password != ""){
				if($email !=""){

					$user = ['username'=> $username, 'password'=>$password, 'email'=>$email,'phone'=>$phone, 'role'=>$role];
					$status = addUser($user);

					if($status){
						header('location: ../views/login.php');
					}else{
						echo "try again...";
					}

				}else{
					echo "invalid email....";
				}
			}else{
				echo "invalid password....";
			}
		}else{
			echo "invalid username....";
		}
	}
?>
