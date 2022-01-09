<?php

	require_once('../Controller/J_Header.php');
	require_once('../Model/usersModel.php');

	$checkPhoto = J_CheckPhoto($_SESSION['Username']);
	$count = mysqli_num_rows($checkPhoto);

	if($count==1)
	{
		$des = "../uploads/".$_FILES["Picture"]["name"];

		$src = $_FILES["Picture"]["tmp_name"];

		if(move_uploaded_file($src, $des)){
			$name= $_FILES["Picture"]["name"];
			J_changePhoto($des,$_SESSION['Username']);
			header('location: ../Views/J_EditProfile.php');
		}else{
			echo "Error";
		}

	}else{

		$des = "../uploads/".$_FILES["Picture"]["name"];

		$src = $_FILES["Picture"]["tmp_name"];

		if(move_uploaded_file($src, $des)){
			$name= $_FILES["Picture"]["name"];
			J_uploadPhoto($des,$_SESSION['Username']);
			header('location: ../Views/J_EditProfile.php');
		}else{
			echo "Error";
		}
	}

?>
