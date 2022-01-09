<?php
include('I_header.php');
if(isset($_POST['edit']))
{
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$id = $_COOKIE['id'];

}
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit</title>
	<style type="text/css">
		h1
		{
			color: lightblue;
			font-size: 25px;
		}

        h4
        {
        	color: lightblue;
        }

        h5
        {
        	color: midnightblue;
        	font-family: monospace;
        	width: 30%;
        }

        .navbar {
			background-color: lightblue;
		}
		.navbar ul {
			overflow: auto;
		}

		.navbar li {
			float: right;
			list-style: none;
			padding: 10px 10 px;
			margin: 10px 10px;


		}
		.navbar li a {
			text-decoration: none;
		}

        body
		 {
		 	background-color: royalblue;
		 	padding: 0px 20px;
		 }

		 input
		 {
		 	background-color: lightblue;
		 	width: 50%;

		 }

		 .button
		 {
		 	color: lightblue;
		 	width: 20%;
		 }

		 .fromerror
		 {
		 	color: darkred;
		 }

		 .main
      {

      	width: 60%;
      	position: absolute;

      	left: 35%;

      }
      .button
      {
      	position: absolute;
      	left: 20%;
      }

      .save
      {
      	background-color: lightblue;
      }


	</style>
</head>
<body>
	<header>
	<nav class="navbar">
			<ul>

				<li></li>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_profile.php">Back</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>

				<li> <a href="I_mainpage.php">DashBoard</a></li>

			</ul>
		</nav>

	</header>

	<div class="container">
		<h1 align="center">Edit Profile</h1>

	</div>

        <div class="main">
        	<form  method="post"  name="myform" >
						<div class="formdesign" id="name">
							<h5> Name:</h5>
						    <input  type="text" name="Name" value="<?=$name?>"  required />
						    <b><span class="fromerror"></span></b>
						</div>
						<div class="formdesign" id="username">
							<h5>User Name:</h5>
						    <input type="text" name="Username" value="<?=$username?>" required  />
						    <b><span class="fromerror"></span></b>
						</div>

						<div class="formdesign" id="email">
							<h5>Email:</h5>
						    <input type="email" name="Email" value="<?=$email?>" required   />
						    <b><span class="fromerror"></span></b>
						</div>

						<br><br>

                       <div class= "button">
                       	<button class="save" type="button" name="save" onclick="EDIT()">SAVE</button>

                       </div>

					</form>

        </div>
				<input hidden type="text" name="" value="<?=$_COOKIE['id']?>" id="id">


</body>

        <script type="text/javascript">

        	function clearerror()
        	{
        		errors = document.getElementsByClassName('fromerror');
        		for (let item of errors)
        		{
        			item.innerHTML = "";
        		}
        	}

        	function seterror (id, error)
        	{
        		element = document.getElementById(id);
        		element.getElementsByClassName('fromerror')[0].innerHTML = error;
        	}

        	function validateform()
        	{
        	   var returnval = true ;
        	   clearerror();
        	   var correct = /^[A-Za-z]+$/;

              var name = document.forms['myform']["Name"].value;
              if(name.length<3)
              {
              	seterror("name", "*Name must be more than 2 letter");
              	returnval = false;
              }


              if(name.length>50)
              {
              	seterror("name", "*Name is too long");
              	returnval = false;
              }
							let x = "";
							let y=false;
							for (let i = 1; i < name.length; i++)
							{
								if(name[i]=='')
								{
									returnval = true;
									y = true;
									break;
								}
							}

              if(name.match(correct) && y)
              {

              }
              else
              {

              	returnval = false;
              }

              var username = document.forms['myform']["Username"].value;
              if(username.length<3)
              {
              	seterror("username", "* User Name must be more than 2 letter");
              	returnval = false;
              }

              if(username.match(correct))
              {
              	returnval = true
              }


              var email = document.forms['myform']["Email"].value;
              if(email.length>30)
              {
              	seterror("email", "*Email is too long");
              	returnval = false;
              }


               return returnval;
        	}

					function EDIT()
					{
						if (validateform())
						{


			          var name = document.forms['myform']["Name"].value;
			          var username = document.forms['myform']["Username"].value;
								var email = document.forms['myform']["Email"].value;
								var id = document.getElementById('id').value;


			          let json = {
			            'name' 	: name,
			            'username' 	: username,
			            'email'	: email,
			            'id' : id
			          }

			          let data = JSON.stringify(json);

			          let xhttp = new XMLHttpRequest();
								//alert(data);
			          xhttp.open('POST', '../controller/I_editUser.php', true);
			          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			          xhttp.send('data='+data);

			          xhttp.onreadystatechange = function(){


			            if(this.readyState == 4 && this.status == 200){
			              //document.getElementById('dom').innerHTML = document.getElementById('list').innerHTML;
			              alert(this.responseText);
			              //location.reload();
										window.location = '../views/I_profile.php';
			            }
			          }
						}
						else {
							alert('SOMOSHA');
						}

					}


        </script>


</html>
