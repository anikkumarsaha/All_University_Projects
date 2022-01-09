<?php

	session_start();

	setcookie('Logged', 'true', time()-10, '/');
	header('location: ../views/I_login.php');

?>
