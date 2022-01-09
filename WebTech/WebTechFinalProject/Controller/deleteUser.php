<?php
	require_once('../model/usersModel.php');

  $id = $_REQUEST['id'];
  $status = deleteUser($id);

  if($status){
    echo "Sucess";
  }else{
    echo "Data deletion failed";
  }

?>
