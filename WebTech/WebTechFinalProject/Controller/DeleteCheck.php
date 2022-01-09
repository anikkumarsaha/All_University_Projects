<?php
	require_once('../model/usersModel.php');

	if(isset($_POST['delete'])){

    $id = $_REQUEST['id'];
  	$status = deleteUser($id);

  	if($status){
      echo "Sucess";
  		header('location: ../views/userlist.php');
  	}else{
  		echo "Data deleting failed";
  	}
	}
?>
