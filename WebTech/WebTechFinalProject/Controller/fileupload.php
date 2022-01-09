<?php

	include('../views/header.php');
	require_once('../model/usersModel.php');

	$des = "../uploads/".$_FILES["myfile"]["name"];

	$src = $_FILES["myfile"]["tmp_name"];

	if(move_uploaded_file($src, $des)){
		$name= $_FILES["myfile"]["name"];
		uploadPhoto($des,$_COOKIE['id']);
	header('location: ../views/profile.php');
	}else{
		echo "Error";
	}
?>
