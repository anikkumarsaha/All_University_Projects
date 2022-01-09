<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Profile Picture</title>

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


    </style>

</head>
<body>

	<header>
		<nav class="navbar">
			<ul>
				<li> <a href="Home.html"> Logout</a></li>
				<li><a href="viewprofile.php">Back</a></li>
				<li> <a href="contactus.html">Contact Us</a> </li>
				<li> <a href="Home.html"> Home</a></li>
				
			</ul>
		</nav>

	</header>

    <br>
    <table align="left"  >
          <tr>
            <td >
              <form method="POST" action="ProfilePictureUpload.php" enctype="multipart/form-data" >
                Select New Profile Picture :<br> <br>
                <input type="file" name="Picture" /><br><br>
                <input type="submit" name="Submit" value="Save" />
              </form>
            </td>
          </tr>
      
	</table>

</body>
</html>