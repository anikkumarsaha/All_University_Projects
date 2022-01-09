<?php

	$id = ($_REQUEST['id']);

  //$id = $data->id;


	//echo "ID: ".$data;

  $host = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "unihub";

  //print_r($user);

 $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

 $sql = "update accounts set notify='1' where id='{$id}'";
$status = mysqli_query($con, $sql);

  if($status){
    echo "Notified";
  }else{
    echo "Failed";
  }

?>
