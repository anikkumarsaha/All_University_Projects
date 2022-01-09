<?php
	session_start();
	require_once('../Model/usersModel.php');

	if(isset($_POST['Submit']))
  {
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Contact = $_POST['Number'];

			if($Username != "")
			{
				if($Email != "")
				{
          if($Contact != "")
          {
            if((ord($Username)>=65 && ord($Username)<=90) || (ord($Username)>=97 && ord($Username)<=122))
            {
              $Userlist = J_getRegisteredUserByName($Username);
              $Count = mysqli_num_rows($Userlist);

                $User = ['username'=> $Username, 'email'=>$Email, 'phone'=>$Contact, 'myself'=>$_SESSION['Username']];
                $status = J_editProfile($User);

                if($status)
                {
                  //echo "Information updated successfully";
									header("location: ../Views/J_EditProfile.php");
                  $_SESSION['Username'] = $Username;
                }
                else {
                  echo "Update failed";
                }

            }
            else {
              echo "Username must start with a letter";
            }
          }
          else {
            echo "Please provide your contact number";
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
?>
