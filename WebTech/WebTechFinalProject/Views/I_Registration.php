<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
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

      	left: 40%;

      }
      .button
      {
      	position: absolute;
      	left: 20%;
      }


	</style>
</head>
<body>
	<nav class="navbar">
			<ul>
				
				<li></li>
				<li> <a href="I_Home.html"> Home</a></li>
				
			</ul>
		</nav>

	</header>
	
	<div class="container">
		<h1 align="center">Create Your New Account</h1>
		
	</div>

        <div class="main">
        	<form  method="post" action="../controller/I_registrationcheckup.php" name="myform" onsubmit="return validateform()">
						<div class="formdesign" id="name">
							<h5> Name:</h5>
						    <input  type="text" name="Name" value=""  required />
						    <b><span class="fromerror"></span></b>
						</div>
						<div class="formdesign" id="username">
							<h5>User Name:</h5>
						    <input type="text" name="Username" value="" required  />
						    <b><span class="fromerror"></span></b> 
						</div>

						<div class="formdesign" id="email">
							<h5>Email:</h5>
						    <input type="email" name="Email" value="" required   />
						    <b><span class="fromerror"></span></b> 
						</div>
						<div class="formdesign" id="password">
							<h5>Password:</h5> 
						    <input type="password" name="Password" value="" required />
						    <b><span class="fromerror"></span></b> 
						</div>
						<div class="formdesign" id="confirmpassword">
							<h5>Confirm Password:</h5>
						    <input type="password" name="ConfirmPassword" value=""   />
						    <b><span class="fromerror"></span></b>
						</div>
						<br><br>
						
                       <div class= "button">
                       	<input type="submit" name="Submit" value="Sign Up" />
						
                       </div>
						
					</form>
        	
        </div>
	
					
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

              if(name.match(correct))
              {
              	returnval = true
              }
              else
              {
              	seterror("name", "*Only Alphabet Allow");
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
              else
              {
              	seterror("username", "*Only Alphabet Allow");
              	returnval = false;
              }

              var email = document.forms['myform']["Email"].value;
              if(email.length>30)
              {
              	seterror("email", "*Email is too long");
              	returnval = false;
              }
              
              var password = document.forms['myform']["Password"].value;
              if(password.length<4)
              {
              	seterror("password", "*Password must be contains more than 4 characters");
              	returnval = false;
              }

              var confirmpassword = document.forms['myform']["ConfirmPassword"].value;
              if(confirmpassword != password)
              {
              	seterror("confirmpassword", "*Password and ConfirmPassword must be same");
              	returnval = false;
              }


              
               
               

               return returnval;
        	}

        </script>


</html>