<?php

	require_once('../model/usersModel.php');

	$data = json_decode($_REQUEST['data']);
	$user = (array) $data;


  $sts=I_setStatus($user['id'],$user['status']);


	if ($sts)
	{
		//header('location: ../views/registrationList.php');
		echo "STATUS CHANGED";
	}
	else {
		echo "ERROR While Changing";
	}


?>
