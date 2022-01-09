<?php
	session_start();
	require_once('../Model/usersModel.php');

	if(isset($_POST['Submit']))
  {
		$Post = $_POST['Post'];

		if($Post != "")
    {
      $User = ['post'=> $Post, 'username'=>$_SESSION['Username']];
      $status = J_addPosts($User);

      if($status)
      {
        header('Location: ../Views/J_Post.php');
      }
      else {
        echo "Post failed";
      }
    }
		else {
			echo "Please write something";
		}
	}
?>
