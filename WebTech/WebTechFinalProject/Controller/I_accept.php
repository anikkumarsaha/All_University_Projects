<?php


	require_once('../model/usersModel.php');

	$data = json_decode($_REQUEST['data']);
	$user = (array) $data;


  $sts=I_setRG($user['No'],$user['status']);


	if ($sts)
	{
		//header('location: ../views/registrationList.php');
    if ($user['status']=='Accepted') {
      echo "Accepted";
    }
    else {
      echo "Rejected";
    }
	}
	else {
		echo "ERROR While Changing";
	}


 ?>
