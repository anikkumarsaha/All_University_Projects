<?php

	$data = json_decode($_REQUEST['data']);

  $username = $data->username;
  $password = $data->password;
  $email = $data->email;
  $phone = $data->phone;
  $role = $data->role;


  $host = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "unihub";



  $user = ['username'=> $username, 'password'=>$password, 'email'=>$email,'phone'=>$phone, 'role'=>$role];


  $text = ['msg'=> 'something'];
  //print_r($user);

  $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

  $sql = "insert into accounts values('{$user['username']}', '{$user['password']}', '{$user['email']}','{$user['phone']}', '{$user['role']}','','')";

  $status = mysqli_query($con, $sql);

	echo $status;

?>
