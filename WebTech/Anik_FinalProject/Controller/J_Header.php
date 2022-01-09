<?php
session_start();
if(!isset($_SESSION['flag']))
{
  header('location: ../Views/J_Login.php');
}
?>
