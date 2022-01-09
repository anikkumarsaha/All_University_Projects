<?php

  include('I_header.php');
	require_once('../model/usersModel.php');

	$done = false;

	if(isset($_POST['submit'])){

		$post= $_POST['Post'];
		$data = I_getRolebyuName($_COOKIE['username']);

		//print_r($post) ;
		if(I_Post($data,$post))
		{
			$done = true;
		}
		else {
			$done = false;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Article</title>

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
		 	color: royalblue;
		 	font-size: 25px;
		 }

		 body
		 {
		 	background-color: royalblue;
		 }

     .post
     {
     	background-color: royalblue;
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

  <div class="form">


  	<form method="post" >
  		<fieldset>
  			<legend>POST</legend>
  			<table>
          <tr>
            <td>
              <textarea placeholder="Title" name="Title" id="Title" cols="25" rows="3"></textarea>
            </td>
          </tr>
  				<tr>
  					<td>
  						<br><textarea placeholder="What's on your mind?" name="Post" id="Post" cols="200" rows="25"></textarea>
  					</td>
  				</tr>
  				<tr>

  					<td>
  						<button type="post" name="post" onclick='done()'>POST</button>
  					</td>
  				</tr>
  				<tr>

  					<td>
  						<div id="notification" >

              </div>
  					</td>
  				</tr>
  			</table>
  		</fieldset>
  	</form>

    <input type="text" id="id" hidden value='<?=$_COOKIE['id']?>'>
    <input type="text" id="username" hidden value='<?=$_COOKIE['username']?>'>

  </div>
<script src="../controller/scripts.js" charset="utf-8"></script>
</body>
</html>
