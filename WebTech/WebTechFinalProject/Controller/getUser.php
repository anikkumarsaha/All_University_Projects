<?php
  require_once('../model/usersModel.php');
  $id = ($_REQUEST['id']);

  $data = getUserById($id);


  if(!empty($data)){
    echo json_encode($data);
  }else{
    echo "Failed";
  }

?>
