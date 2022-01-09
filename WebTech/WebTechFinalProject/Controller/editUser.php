<?php

	require_once('../model/usersModel.php');
	$data = json_decode($_REQUEST['data']);
	$user = (array) $data;

	$status = editUser($user);

	if($status){
		echo json_encode($data);
		echo "Sucess";
	}else{
		echo "Failed";
	}
?>
