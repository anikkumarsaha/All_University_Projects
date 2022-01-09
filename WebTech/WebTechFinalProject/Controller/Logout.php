<?php

	session_start();
	//session_destroy();
	//unset($_SESSION['flag']);
	setcookie('Logged', 'true', time()-10, '/');
	header('location: ../views/login.php');
	setcookie('found', 'none', time()-3600, '/');
	setcookie('found', 'role', time()-3600, '/');
	setcookie('found', 'id', time()-3600, '/');

?>
