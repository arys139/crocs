<?php

// Inialize session
session_start();

include '../../inc/CROCSLogin.php';

//
// Option 1. Login without LDAP. Please comment/uncomment the chosen option.
//

// Retrieve username and password from database according to user's input

/* $login = mysql_query("SELECT * FROM user WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");


// Check username and password match
if (mysql_num_rows($login) == 1) {
        // Set username session variable
        $_SESSION['username'] = $_POST['username'];
        unset($_SESSION['loginerror']); 
        // Jump to secured page
        header('Location: start.php');
}
else {
        // Set login error message
        $_SESSION['loginerror'] = $_POST['username'];
        // Jump to login page
        header('Location: index.php');
} */


//
// Option 2. Login with LDAP. Please comment/uncomment the chosen option.
//


//Manually handle system error
function customError($errno, $errstr)
  {
  if (strpos($errstr, "contact LDAP") !== false) {
     echo 'Error. Unable to process your login via LDAP server. Please contact system administrator.<br>Click <a href="index.php">here</a> to return to login screen.';
     exit;
     }
  else {
     // Set login error message
     $_SESSION['loginerror'] = $_POST['username'];
     // Jump to login page
     header('Location: index.php');
     }
  }

//set error handler
set_error_handler("customError");

//Login to LDAP server
$username=$_POST['username'];
$password=$_POST['password'];
//$ldap=ldap_connect("tmldap.intra.tm");
$ldap=ldap_connect("10.41.86.223");


//new ldaps server
//$ldap=ldap_connect("ldaps://10.45.236.28/", 636);


if($ldap){
$bind_results=ldap_bind($ldap,"uid=".$username.", ou=People, o=telekom", $password) or die ();


//Pointing to new LDAPS
//$bind_results=ldap_bind($ldap,"cn=".$username.",ou=users,o=data", $password);

  // Check username and password match
  if ($bind_results) {
        // Set username session variable
        $_SESSION['username'] = $_POST['username'];
        unset($_SESSION['loginerror']); 
        // Jump to secured page
        header('Location: start.php');
  }
  else {
        // Set login error message
        $_SESSION['loginerror'] = $_POST['username'];
        // Jump to login page
//        header('Location: index.php');
        echo("<script language=\"javascript\">");
        echo("top.location.href = \"index.php\";");
        echo("</script>");
  }
}


?>
