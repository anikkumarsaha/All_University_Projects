<?php 
include('I_header.php');

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course Add</title>

    <style type="text/css">

    	.navbar {
			background-color: lightblue;
		}
		.navbar ul {
			overflow: auto;
		}

		.navbar li {
			float: right;
			list-style: none;
			padding: 5px 5px;
			margin: 10px 15px;
			
		}
		.navbar li a {
			text-decoration: none;
		}
    	
        h1 {
		 	color: deepskyblue;
		 	font-size: 25px;
		 }

		 h5 {
		 	color: deepskyblue;
		 	
		 }

		 body 
		 {
		 	background-color: royalblue;
		 }

		 .add 
		 {
		 	background-color: lightblue;
		 }
		 .btn
		 {
		 	background-color: lightblue;
		 }


    </style>
	
</head>
<body>

     <header>
		<nav class="navbar">
			<ul>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_courselist.php">Back</a></li>
				
				<li> <a href="I_contactus.html">Contact Us</a> </li>
				<li> <a href="I_mainpage.php">DashBoard</a></li>
				
			</ul>
		</nav>

	</header>

	<h1 align="center">
	 Uni Hub 
	  </h1>

<center> <h5>Course</h5></center>
	<fieldset>
	<legend><b> Add New Course </b></legend>
	
		<form action="../controller/I_addcoursecheck.php" method="POST">
		<h5>Course Name :</h5><br><input class="add" type="text" name="CourseName" value=""><br>
		<h5>Course Cost :</h5><br><input class="add" type="text" name="CourseCost" value=""><br><br>
		<input class="btn" type="submit" name="SAVE" value="Save">
	</form>
	
</fieldset>

	</body>
</html>