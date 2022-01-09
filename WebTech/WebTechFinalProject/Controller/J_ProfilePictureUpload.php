<?php

if(isset($_POST['Submit']))
{
	$des = "../Assets/".$_FILES["Picture"]["name"];
	$src = $_FILES["Picture"]["tmp_name"];

	if(move_uploaded_file($src, $des))
	{
		echo "Profile picture upload successful";
	}
	else
	{
		echo "Couldn't upload profile picture";
	}
}

?>
