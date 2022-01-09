<?php
include('I_header.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Company List</title>

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
		 	font-size: 18px;
		 	color: mediumblue;
		 	 text-align: center;
		 	margin-top: -20px;
		 	margin-bottom: 20px;
		 }

		 body
		 {
		 	background-color: royalblue;
		 }

		 .main-div
		 {
		 	      width: 100%;
		 	       height: 80vh;
		 	       display: flex;
		 	       flex-direction: column;
		 	       justify-content: center;
		 	       align-items: center;
		 }

		 .center-div
		 {
		 	width: 53%;
		 	height: 60vh;
		 	 background-color: royalblue;
		 	 padding: 20px 0 e 0;
		 	 box-shadow: 0 10px 20px 0 rgba(0,0,0,0);
		 	 border-radius: 10px;
		 }

		 table
		 {  border-collapse: collapse;
		 	background-color: steelblue;
		 	box-shadow: 0 12px 20px e rgba(0,0,0,.03);
		 	border-radius: 10px; margin: auto;
		 }

		 th, td{
		 	border:1px solid #f2f2f2;
		 	 padding: 8px 30px;
		 	  text-align:
		 	 center;
		 	  color: black;
		 	}
		 	th
		 	{
		 		text-transform: uppercase;
		 		font-weight: 500;
		 	}

		 	td
		 	{
		 		font-size: 13px;
		 	}

		 	.edit
		 	{
		 		color: blueviolet;
		 		text-decoration: none;
		 	}

		 	.delete
		 	{
		 		color: red;
		 		text-decoration: none;
		 	}



	</style>

</head>
<body>

	<header>
		<nav class="navbar">
			<ul>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_mainpage.php">Back</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>



			</ul>
		</nav>

	</header>







</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="main-div">
		<h1> Company List </h1>
		<div class="center-div">
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th> Company Name</th>

						</tr>
					</thead>
					<tbody>


                <?php

                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "mergeddb";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);

                   	  $sql = "SELECT * FROM `company`";
                   	  $query = mysqli_query($conn,$sql);

                   	  $num = mysqli_num_rows($query);


                   	  	while ($res = mysqli_fetch_array($query))
                   	  	{




                ?>

					           <tr>
							      <td><?php echo $res['No'] ?></td>
							      <td><?php echo $res['Company Name'] ?></td>

						       </tr>

				<?php
                   	  	}

                ?>






					</tbody>
				</table>

			</div>

		</div>
	</div>


</body>
</html>
