<?php

	include('../views/I_header.php');
	require_once('../model/usersModel.php');

	$des = "../uploads/".$_FILES["myfile"]["name"];

	$src = $_FILES["myfile"]["tmp_name"];

	if(move_uploaded_file($src, $des)){
		$name= $_FILES["myfile"]["name"];
		I_uploadP($des,$_COOKIE['id']);
	header('location: ../views/I_profile.php');
	}else{
		echo "Error";
	}
?>
