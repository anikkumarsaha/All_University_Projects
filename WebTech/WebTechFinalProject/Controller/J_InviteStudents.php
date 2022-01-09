<?php
	require_once('../Model/usersModel.php');
  session_start();
	$id = $_REQUEST['id'];

  $data = J_getStudentById($id);
  $name = $data['s_name'];

  $User = ['r_name'=>$_SESSION['Username'], 's_name'=>$name];
  $status = J_addjobinvitations($User);

  if($status)
  {
    echo "Invitation sent to ".$name;
  }
  else {
    echo "Invitation failed";
  }
?>
