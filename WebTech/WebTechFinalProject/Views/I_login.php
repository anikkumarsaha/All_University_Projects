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
		 	color:midnightblue;

		 }
		  h1 {
		 	color: mmidnightblue;

		 }

		 body
		 {
		 	background-color: royalblue;
		 	padding: 0px 20px;
		 }
		 a
		 {
		 	color: darkblue;
		 }

		 .button
		 {
		 	background-color: lightskyblue;
		 	color: darkblue;

		 }
		 input
		 {
		 	background-color: deepskyblue;


		 }

     </style>

</head>
<body>

      <header>
		<nav class="navbar">
			<ul>

				<li> <a href="I_contactus.html">Contact Us</a> </li>
				<li> <a href="I_Registration.php">Registration</a> </li>
				<li> <a href="I_Home.html"> Home</a></li>

			</ul>
		</nav>

	</header>

	<div class="container">
		<h1 align="center">Login With Your Account</h1>

	</div>

	    <form action="../controller/I_logincheck.php" method="post" name="myform" onsubmit="return validateform()">
	    	<table align="center">
	    	<tr>
	    		<td>
	    			<div class="formdesign" id="username">
						    <h5>User Name:</h5>
						    <input type="text" name="Username" value="" required  />
						    <b><span class="fromerror"></span></b>
				</div>
	    		</td>


	    	</tr>
	    	<tr>
	    		<td>
	    			<div class="formdesign" id="password">
						<h5>Password:</h5>

						 <input type="password" name="Password" value="" required />
						 <b><span class="fromerror"></span></b>
						</div>
	    		</td>
	    	</tr><br>
	    	<tr>
	    		<td>

	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<input class="button" type="submit" name="login" value="Login" /><br><br>
	    			
	    		</td>
	    	</tr>


	    </table>
	    </form>



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



              var username = document.forms['myform']["Username"].value;
              if(username.length<3)
              {
              	seterror("username", "* User Name must be more than 2 letter");
              	returnval = false;
              }



              var password = document.forms['myform']["Password"].value;
              if(password.length<4)
              {
              	seterror("password", "*Password must be contains more than 4 characters");
              	returnval = false;
              }
               return returnval;
        	}

        </script>

</html>
