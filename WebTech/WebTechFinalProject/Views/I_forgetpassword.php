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
	<header>
		<nav class="navbar">
			<ul>
				<li><a href="Login.php">Back</a></li>
				<li> <a href="contactus.html">Contact Us</a> </li>
				<li> <a href="Registration.php">Registration</a> </li>
				<li> <a href="Home.html"> Home</a></li>
				
			</ul>
		</nav>

	</header>
	
	<br><br><br>
	
             <div class="main">
             	<form  method="post" action="#" name="myform" onsubmit="return validateform()">
						
						<div class="formdesign" id="username">
							<h5>User Name:</h5>
						    <input type="text" name="Username" value="" required  />
						    <b><span class="fromerror"></span></b> 
						</div>

						
						<div class="formdesign" id="password">
							<h5>New Password:</h5> 
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
                       	<input type="submit" name="Submit" value="Save" />
						
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