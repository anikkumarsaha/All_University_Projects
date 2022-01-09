<?php

    session_start();
	include 's_nav.php';

	if(isset($_SESSION['id']))
	{
        header("location: ../views/s_index.php");

	}

?>


<html>
<head>
	<title> Password Reset </title>
	<style>
		span{
			color:red
		}
	</style>
</head>

<body>

	<form action="../Controller/s_resetCheck.php" method="POST" name="myForm" onsubmit="return checks()">
		<fieldset>
			<legend><font size="11" color="green">
            <b><i>Reset Password</i></b></font></legend>

			<table>
                <tr>
					<td>Your Username:</td>
					<td><input type="text" name="s_name"  > <span id="error_name"></span></td>
				</tr>
				<tr>
					<td>Your Email:</td>
					<td><input type="email" name="s_email"  > <span id="error_email"></span></td>
				</tr>
				<tr >
					<td>New Password:</td>
					<td><input type="password" name="s_password" ><span id="error_password"></td>
				</tr>
                <tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="s_cpassword" ><span id="error_confirm"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Reset Password" > <input type="reset" value="Reset"></td>
				</tr>
			</table>
		</fieldset>
    </form>
</body>
<script>

function checks(){
var name = document.forms["myForm"]["s_name"];
var email = document.forms["myForm"]["s_email"];
var pass=document.getElementById("pass");
var cpass=document.getElementById("cpass");

				if (name.value == "") {
						document.getElementById('error_name').innerHTML=" ***Name must be filled out";
						name.focus();
						return false;
				}
				else {
					document.getElementById('error_name').innerHTML=" ";
				}

				if (!/^[a-zA-Z\s]*$/.test(name.value)) {
				document.getElementById('error_name').innerHTML=" ***Name must be only letters ";
					name.focus();
					return false;
				}
				else {
					document.getElementById('error_name').innerHTML=" ";

				}

			   if ( ! /\S+@\S+\.\S+/.test(email.value)) {
						document.getElementById('error_email').innerHTML=" ***Pattern don't matche . exmp: 'demo@gmail.com' ";
						email.focus();
						return false;
				}
				else {
					document.getElementById('error_email').innerHTML=" ";
				}

					if ( document.forms["myForm"]["s_password"].value  != "") {
						document.getElementById('error_password').innerHTML=" ";
				}
				else {

					document.getElementById('error_password').innerHTML=" ***Password must be filled out";
					return false;
				}

				if (document.forms["myForm"]["s_cpassword"].value != "") {
							document.getElementById('error_confirm').innerHTML=" ";
				}
				else {

					document.getElementById('error_confirm').innerHTML=" ***Confirm password must be filled out";
					return false;
				}

				if(document.forms["myForm"]["s_password"].value != document.forms["myForm"]["s_cpassword"].value)
				{
					document.getElementById('error_confirm').innerHTML=" ***Password and Confirm Password does't match";
					return false;
				}
				else {
					document.getElementById('error_confirm').innerHTML=" ";
				}

}
</script>
</html>
