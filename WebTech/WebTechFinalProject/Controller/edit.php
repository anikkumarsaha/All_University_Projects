<?php

	require_once('../model/usersModel.php');
	$data = json_decode($_REQUEST['data']);
	$user = (array) $data;
  echo json_encode($data);
	/*$status = edit($user);

	if($status){
		echo json_encode($data);
		//echo "Sucess";
	}else{
		echo "Failed";
	}
*/
?>
