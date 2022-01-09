<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

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
		 h5 {
		 	color: royalblue;
		 	
		 }
		  h1 {
		 	color: midnightblue;
		 	
		 }
     </style>

</head>
<body>

      <header>
		<nav class="navbar">
			<ul>
				<li><a href="Login.php">Logout</a></li>
				<li><a href="viewprofile.php">Back</a></li>
				<li> <a href="contactus.html">Contact Us</a> </li>
				
				<li> <a href="Home.html"> Home</a></li>
				
			</ul>
		</nav>

	</header>

	<fieldset>
	<legend>
		<b>Forget Password</b>
	</legend>
	<form >
		User Name : <input type="text" name="username" value="" /> <br/><br/>
            
           New Password: <input type="password" name="NewPassword" value="" /> <br/><br/>
           Confirm Password: <input type="password" name="ConfirmPassword" value="" /> <br/>
            <input type="submit" name="Submit" value="Save" />
            
          </form>

      

</body>
</html>