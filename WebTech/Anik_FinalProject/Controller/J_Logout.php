<?php
	session_start();
	unset($_SESSION['flag']);
	header('location: ../Views/J_Login.php');
?>
