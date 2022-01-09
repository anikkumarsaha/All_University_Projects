<?php
include('I_header.php');
 ?>

<html>
<head>
	<title>Instructor Page</title>

<style type="text/css">


		.navbar {
			background-color: lightskyblue;
		}
		.navbar ul {
			overflow: auto;
		}
		.list li a
		{
			color: deepskyblue;
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
		 	color: mediumblue ;
		 	font-size: 60px;
		 }

		 }

		  li {
		 	list-style: none;
		 }

		    li a {
			text-decoration: none;
			color: darkslateblue;
		}

		body
		 {
		 	background-color: royalblue;
		 	padding: 0px 20px;
		 }

	</style>

</head>
<body>

	<header >
		<nav class="navbar">
			<ul >
				<li> <a href="../controller/I_logout.php">Logout</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>


			</ul>
		</nav>

	</header>

    <h1 align="center">
		Welcome to Uni Hub
	  </h1>

    <table align="center">
    	<tr>
    		<td>

					<div class="list">
   					<ul>
					<li><a href="I_profile.php">Profile</a></li><br>

        	<li><a href="I_article.php">Article</a></li><br>
        	<li><a href="I_newsfeed.php">News Feed</a></li><br>
        	<li><a href="I_searchstudent.php">Student List</a></li><br>
        	<li><a href="I_companylist.php">Company List</a></li><br>
        	<li><a href="I_courselist.php">Course List</a></li><br>
        	<li><a href="I_courseapprove.php">Request List</a></li>
		    		</ul>

   				</div>


    		</td>
    	</tr>
    </table>

</body>
</html>
