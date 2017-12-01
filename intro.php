<?php

include '../../inc/CROCSLogin.php'; 

include 'inc_fn_userid_enc.php';

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: index.php');
}
else {
   $userID = $_SESSION['username'];
   $userID = strtoupper($userID);
         
   $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$userID."'";
      
   $stid = oci_parse($cemdb, $sql);
   
   if(!$stid) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 
   else{
    oci_define_by_name($stid, 'USERNAME', $name);
    oci_define_by_name($stid, 'ROLE', $role);
    oci_execute($stid);}
    
   if ($row = !oci_fetch($stid)){
        $name = "GUEST";
        $role = "GUEST";
        }
  }

/* 
echo '<div class="welcomemessage" style="margin:0 auto;margin-top:50;" align="center">';
echo '<p style="margin-left:auto;margin-right:auto;" align="center"><big>Welcome &nbsp<big><font color="#0066ff">'.$name.'</font></big>.</big></p>';
echo '</div>';
*/

?>
<html>
<head>
<title> CRoCS </title>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<link rel="stylesheet" href="css/font-awesome.min.css">

<style type="text/css">
	.welcomemessage
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:11px;
		
		width:100%;
		height:20px;
		background: #FFFFFF;
		margin:40px auto;
		box-shadow: 0 10px 6px -6px #777;

	}
	
	.container1
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		text-align:center;
		font-size:14px;
	}
	
	.header1
	{
		position:relative;
		text-align:center;
		text-shadow:#FF4346;
		font-size:xx-large;
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-weight:bold;
		color:#0066ff;
	}
	
	.header2
	{
		position:relative;
		text-align:center;
		text-shadow:#FF4346;
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		
		width:100%;
		height:20px;
		background: #FFFFFF;
		margin:40px auto;
		box-shadow: 0 10px 6px -6px #777;
	}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<br>

<div>
    <div class="header1">
    WELCOME TO CROCS
    </div>
    <div class="header2">This system is to perform the following:</div>
</div>

<div class="container1" style="margin:0 auto;margin-top:50; width:50%" align="center";>
    <div class="contentleft" style="width:25%; float:left">
    <i class="fa fa-cog fa-spin fa-5x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i>
    <br>&nbsp;To capture the latest CE configuration prior to handover, retain resource order and CR activity. 
    &nbsp;&nbsp;
    </div>
    <div class="contentright" style="width:25%; float:right">
    <i class="fa fa-pencil-square-o fa-5x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i>
    <br>&nbsp;To input the latest preventive maintenance executed date for each managed CE. 
    &nbsp;&nbsp;
    </div>
</div>

<footer></footer>

</body>
</html>
