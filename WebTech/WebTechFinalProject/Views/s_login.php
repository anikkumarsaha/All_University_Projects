<?php
  session_start();
	include 's_nav.php';
	if(isset($_SESSION['id']))
	{
        header("location: s_index.php");
	}
?>
<html>
<head>
	<title>Login page</title>
		<style>
		span{
			color:red;
		}
		</style>
</head>
<body>
	<form method="post" action="../Controller/s_loginCheck.php" onsubmit="return LoginValidation()">
		<fieldset>
			<legend><font size="11" color="green">
            <b><i>Login</i></b></font></legend>
			<table>
				<tr>
					<td>Email:</td>
					<td><input type="text" id="email" name="s_email" value="" placeholder="Enter your Email" > <span id="error_email"></span></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" id="password" name="s_password" value="" placeholder="Enter your password" ><span id="error_password"></span></td>
				</tr>
				<tr>
					<td></td>
                    <td><input type="submit"  name="submit" value="Submit"> <input type="reset" style="margin-right:1px"></td>
				</tr>
                <tr>
                    <td colspan="2"><p> Don't have an account? <a href="s_registration.php">Register here</a></p></td>
                </tr>
                <tr>
                    <td colspan="2"><p> Forget password? <a href="s_reset.php">Reset</a></p></td>
                </tr>
			</table>
		</fieldset>
	</form>
<script>
function LoginValidation()
{
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;

  if(email != "")
  {
    if(password != "")
    {
      let json = {
        'email' : email,
        'password' : password,
      }
      let myjson = JSON.stringify(json);
      let xhttp = new XMLHttpRequest();
      xhttp.open('POST', 's_loginCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(myjson);
      xhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

        }
      }
      return true;
    }
    else
    {
      alert('Please provide your password');
      return false;
    }
  }
  else
  {
    alert('Please provide your email');
    return false;
  }
}
</script>
</body>
</html>
