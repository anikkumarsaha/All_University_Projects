<?php

    require_once('../model/usersModel.php');
    $data = json_decode($_REQUEST['data']);

    $user = (array) $data;

    if(Post($user))
    {
      echo "Posted";
    }
    else {
      echo "NOT POSTED";
    }

 ?>
