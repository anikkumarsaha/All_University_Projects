<?php
	session_start();
	require_once('../Model/usersModel.php');

	if(isset($_POST['Submit']))
  {
		$Name = $_POST['Name'];
    $Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$ConfirmPassword = $_POST['ConfirmPassword'];
		$Contact = $_POST['Number'];
		$Role = 'Job recruiter';
		if($Name != "")
		{
			if($Username != "")
			{
				if($Email != "")
				{
					if($Password != "")
					{
						if($ConfirmPassword != "")
						{
							if($Contact != "")
							{
								if(isset($_POST['Gender']))
								{
									if($Role!='')
									{
										if($Password == $ConfirmPassword)
										{
											if((ord($Username)>=65 && ord($Username)<=90) || (ord($Username)>=97 && ord($Username)<=122))
											{
												$Userlist = J_getRegisteredUserByName($Username);
												$Count = mysqli_num_rows($Userlist);
												if($Count == 0)
												{
													$User = ['username'=> $Username, 'password'=>$Password, 'email'=>$Email, 'phone'=>$Contact, 'role'=>$Role];
													$status = J_addUser($User);

													if($status)
													{
														header('location: ../Views/J_Login.php');
													}
													else {
														echo "Registration failed";
													}
												}
												else {
													echo "Username already taken";
												}
											}
											else {
												echo "Username must start with a letter";
											}
										}
										else {
											echo "Password didn't match";
										}
									}
									else {
										echo "Please select a role";
									}
								}
								else {
									echo "Please select your gender";
								}
							}
							else {
								echo "Please provide your contact number";
							}
						}
						else {
							echo "Please re-enter your password";
						}
					}
					else {
						echo "Please provide your password";
					}
				}
				else {
					echo "Please provide your email";
				}
			}
			else {
				echo "Please provide your username";
			}
		}
		else {
			echo "Please provide your name";
		}
	}
?>
