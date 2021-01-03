<?php
include "config.php";
$username = $_POST['username'];
// Password yang di e
$pass     = $_POST['password'];
$login = mysqli_query($mysqli, "SELECT * FROM login WHERE username = '$username' AND password = '$pass'");
$row = mysqli_fetch_assoc($login);
if ($row['username'] == $username AND $row['password'] == $pass)
{
  session_start();
  $_SESSION['username'] = $row['username'];
  $_SESSION['password'] = $row['password'];
  header('location:home.php');
}
else
{
  echo"<script>alert('Username or Password invalid');history.back(self);</script>";
}
?>