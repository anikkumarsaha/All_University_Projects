<?php


$conn = mysqli_connect('localhost', 'root', '', 'mergeddb');

if(isset($_POST['login']))
{
  $username = $_POST['Username'];
  $pass = $_POST['Password'];

  $sql = "select * from instructor where username='{$username}' and password='{$pass}'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  if (is_array($row))
   {

          setcookie('Logged', 'true', time()+3600, '/');
          setcookie('username', $username, time()+3600, '/');
          $flag ='Yes';
          setcookie('id', $row['i_id'], time()+3600, '/');
          header('location: ../views/I_mainpage.php');
  }
  else
  {

    header('location: ../views/I_login.php');

  }
}


?>
