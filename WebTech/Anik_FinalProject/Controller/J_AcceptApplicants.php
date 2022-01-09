<?php
	require_once('../Model/usersModel.php');
  session_start();
	$id = $_REQUEST['id'];

  $data = J_getApplicantsById($id);
  $name = $data['Username'];

  $User = ['j_name'=>$_SESSION['Username'], 's_name'=>$name];
  $status = J_addjobaccepts($User);

  if($status)
  {
    echo $name. " accepted";
  }
  else {
    echo "Invitation failed";
  }
?>
