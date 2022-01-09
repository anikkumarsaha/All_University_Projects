<?php
//print_r($_FILES['myfile']);
	$des = "upload/".$_FILES["myfile"]["name"];

	//echo $_FILES["myfile"]["tmp_name"];
	$src = $_FILES["myfile"]["tmp_name"];
  echo $des;


 ?>
