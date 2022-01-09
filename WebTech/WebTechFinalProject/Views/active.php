<?php

	require_once('../model/usersModel.php');

	$sid = $_REQUEST['sid'];
	$status = $_REQUEST['status'];

	$user = getUserById($sid);

  if(setStatus($sid,$status))
  {
    echo "STATUS Changed";
  }
  else {
    echo "ERROR While Changin";
  }

?>
