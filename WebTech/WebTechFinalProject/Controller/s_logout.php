<?php

	session_start();

	if(isset($_SESSION['id']))
	{
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
	}

	header("Location: ../views/s_login.php");
?>