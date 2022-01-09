<?php

    session_start();
	include './s_nav.php';

	if(isset($_SESSION['id']))
	{
        header("location: s_index.php");

	}



?>

<html>
<head>
	<title> Registration Form</title>
	<style>
		span{
			color:red;
		}
		</style>
</head>

<body>

    <form method="post" action="../Controller/s_RegistrationCheck.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()" >
		<fieldset>
			<legend><font size="11" color="green">
            <b><i>SignUp</i></b></font></legend>

<span id="result"></span>
			<table>

				<tr>
					<td>Username:</td>
					<td><input type="text"  name="s_name" ><span id="error_name"> </span></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email"  name="s_email" ><span id="error_email"></span></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text"  name="s_phone" > <span id="error_phone"></span></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><textarea type="text"  name="s_address" ></textarea><span id="error_address"></span></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password"  name="s_password" >  <span id="error_password"></span></td>
				</tr>
                <tr>
					<td>Confirm Password:</td>
					<td><input type="password"  name="s_cpassword" > <span id="error_confirm"></span></td>
				</tr>

				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="s_gender"  value="0"> Male
						<input type="radio"  name="s_gender" value="1" > Female <span id="error_gender"></span>
				  </td>
				</tr>
                <tr>
					<td>Image:</td>
					<td><input type="file" name="s_image" id="file"  onchange="return fileValidation()" ><span id="error_image"></span>
					 <!-- <td><div id="imagePreview" height="100" width="100"></div></td> -->
				</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" id="submit" value="Submit"> <input type="reset"></td>
				</tr>
                <tr>
                    <td colspan="2"><p> Already have an account? <a href="s_login.php">Log in</a></p></td>
                </tr>
			</table>
		</fieldset>
    </form>
<script>



		function validateForm() {
		var name = document.forms["myForm"]["s_name"];
		var email = document.forms["myForm"]["s_email"];
		var phone = document.forms["myForm"]["s_phone"];
		var address = document.forms["myForm"]["s_address"];
		var gender = document.forms["myForm"]["s_gender"];
		var images = document.forms["myForm"]["s_image"];
		// var regName = /^[a-zA-Z\s]*$/;

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

				if (phone.value == "") {
						document.getElementById('error_phone').innerHTML=" ***Phone must be filled out";
						phone.focus();
						return false;
				}
				else if(isNaN(phone.value)){
					document.getElementById('error_phone').innerHTML=" ***Phone number must be numeric";
					phone.focus();
					return false;
				}
				else if(phone.value.length != 11  ){
					document.getElementById('error_phone').innerHTML=" ***Phone number length must be 11";
					phone.focus();
					return false;
				}
				else {
					document.getElementById('error_phone').innerHTML=" ";
				}

				if (address.value == "") {
						document.getElementById('error_address').innerHTML=" ***Address must be filled out";
						address.focus();
          				  return false;
				}
				else {
					document.getElementById('error_address').innerHTML=" ";
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

				if (gender[0].checked == false && gender[1].checked == false) {
					document.getElementById('error_gender').innerHTML=" ***Gender must be filled out";
					return false;
				}
				else {
					document.getElementById('error_gender').innerHTML=" ";
				}
				if (images.value=='') {
					document.getElementById('error_image').innerHTML=" ***image required";
					return false;
				}
				else {
					document.getElementById('error_image').innerHTML=" ";
				}


}

function fileValidation() {
            var fileInput = document.getElementById('file');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                document.getElementById('error_image').innerHTML=" ***Image must be jpg/jpeg/png/gif format";
				return false;
            }
            else
            {
				document.getElementById('error_image').innerHTML=" ";
            }
}

</script>
</body>

</html>
