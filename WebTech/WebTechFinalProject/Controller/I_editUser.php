<?php

	require_once('../model/usersModel.php');
	$data = json_decode($_REQUEST['data']);
	$user = (array) $data;
	//echo json_encode($data);

	$status = I_editIns($user);

	if($status){
		echo "Edit Successfull";
	}else{
		echo "Failed";
	}

?>
