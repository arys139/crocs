<?php

// Inialize session
session_start();

include '../../inc/CROCSLogin.php';

/*
$config_path = '../../inc/CROCSLogin.php' ;

if (file_exists($config_path)) {
  echo "qwe";
  include $config_path;
}
*/

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
  header('Location: start.php');
}

// Check, if login error message is passed
if (isset($_SESSION['loginerror'])) {
  $username = $_SESSION['loginerror'];
  unset($_SESSION['loginerror']); 
  $loginmessage = "Error. Invalid ID and/or password.";
}
else {
  $loginmessage = "";
  $username = "";
}

?>
<html>

<head>
<title>CRoCS Login</title>
</head>

<body>
<table border="0" align="center" background="images/loginbg.jpg" height="400"; width=1000>
  <tr><td style="padding:20px 0px 5px 25px">&nbsp</td></tr>
  <form method="POST" action="loginproc.php">
  <tr align="center"><td align="center">
  <table border="0" bgcolor="#FFFFFF">
    <tr><td style="padding:25px 0px 0px 25px"><img src="images/title.jpg" width=290 /></td></tr>
    <tr align="center"><td style="padding:15px 25px 5px 25px" colspan="2">
    <input type="text" name="username" size="25" 
      <?php
      if ($username != '') 
      echo 'value="'.$username.'"';
      else
      echo 'placeholder="Username"'; 
      ?>
      />
    </td></tr>
    <tr align="center"><td style="padding:5px 25px 5px 25px" colspan="2"><input type="password" name="password" placeholder="Password" size="25"></td></tr>
    <tr align="center"><td style="padding:5px 25px 5px 25px" colspan="2"><font size="2" face="calibri" ><b>Please use your IDM ID and Password. </b><img src="images/whitespace.png" width=5 /></font></tr>
    <tr align="center"><td style="padding:5px 25px 5px 25px" colspan="2">
    <input type="submit" value="Login"></td></tr>
    <tr><td style="padding:5px 25px 5px 25px" colspan="2"><font size="2" face="calibri" ><b>This site is best viewed in Google Chrome. Click <a href='http://www.google.com/chrome/browser/desktop/index.html'>HERE</a> to download.</b></font></td></tr>
  </form>
  <?php 
  if ($loginmessage != '') 
    echo '<tr><td style="padding:0px 25px 5px 25px" colspan =3><b><p style="color:red">'.$loginmessage.'</p></b></td></tr>'; 
  ?>
  </table>
  <tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr>
</table>

</body>
</html>
