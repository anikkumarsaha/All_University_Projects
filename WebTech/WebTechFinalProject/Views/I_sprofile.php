<?php
include('I_header.php');

	require_once('../model/usersModel.php');
$id = $_REQUEST['id'];
$data = I_getStudentById($id);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Student Profile</title>


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
		 	height: 60vh;
		 	 background-color: royalblue;
		 	 padding: 20px 0 e 0;
		 	 box-shadow: 0 10px 20px 0 rgba(0,0,0,0);
		 	 border-radius: 10px;
			 width: "100%"
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

		 	.input 
		 	{
		 		background-color: steelblue ;
		 	}

		 	
    </style>

 </head>
 <body>

 	<header>
		<nav class="navbar">
			<ul>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_searchstudent.php">Back</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>

				<li> <a href="I_mainpage.php">DashBoard</a></li>

			</ul>
		</nav>

	</header>

 	<br><br><br>
		
	        <table width="20%">
						<tr>
	            <td>
	              Name:
	            </td>
							<td>
								<input class="input" type="text" id="Name" name="Name" value="<?php echo $data['s_name'] ?>" style="border-width: 0px" />
							</td>
	          </tr>

						<tr>
	            <td>
	              Id:
	            </td>
							<td>
								<input class="input" type="text" id="id" name="id" value="<?php echo $id ?>" style="border-width: 0px" />
							</td>
	          </tr>

						<tr>
	            <td>
	              Email:
	            </td>
							<td>
								<input class="input" type="Email" id="Email" name="Email" value="<?php echo $data['s_email'] ?>" style="border-width: 0px"/>
							</td>
	          </tr>

					</table>
 
 </body>
 </html>

	
