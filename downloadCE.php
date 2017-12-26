<!DOCTYPE html>
<?php
include '../../inc/CROCSLogin.php'; 

ini_set('memory_limit', '-1');
set_time_limit(0); 

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
   $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$userID."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";
   $stid1 = oci_parse($cemdb, $sql);
   $result = oci_execute($stid1);
   if (!$result) {
      echo "DB Error, could not query the database<br>";
      exit;
      }
   if ($row = oci_fetch_assoc($stid1)) {
       $role = $row['ROLE']; }
   else {
       $role = 'Guest'; }
  }

?>
<html>
<head>
<title> CRoCS </title>
<link rel="stylesheet" href="css/fontawesome-all.css">
<style type="text/css">

h2{
  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
	Verdana, serif, Arial;
	font-size:15px;
	text-align:center;	
	width:100%;
	height:20px;
	background: #FFFFFF;
	margin:20px auto;
	box-shadow: 0 10px 6px -6px #777;
}

.info{
  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
	Verdana, serif, Arial;
	font-size:13px;
  padding:0; margin:0;
}
	
table{
  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
	Verdana, serif, Arial;
	font-size:11px;
  color:#FFFFFF;
  margin: 15px 15px;
}

	
</style>

</head>
<body>
<div class="header">
  <h2>Previous Download Contents</h2>
</div>

<div class="info">
  <ul class="fa-ul">
    <li><i class="fa-li fas fa-caret-square-right" aria-hidden="true"></i> Listed below are the previously generated 
        database content files. You may download them by clicking on the file name.
    </li>
    <li><i class="fa-li fas fa-caret-square-right" aria-hidden="true"></i> If you wish to generate a new all database
        content report, please click the 'Generate New File' button.
    </li>
    <li><i class="fa-li fas fa-caret-square-right" aria-hidden="true"></i> If you wish to generate a new specific 
        content report (Filter By/Service Install Date), please use the 'Search CE' link menu above.
    </li>
	</ul>
</div>

<div class="tablefile">

  <form action="downloadAll.php" method="post"> 
  <table cellpadding="5" border ="1">
  <tr bgcolor="#2b2a2a"><td>File Name</td><td>File Size (Kb)</td><td>Generated Date & Time</tr>
  <?php
  date_default_timezone_set('Asia/Kuala_Lumpur');

  $files = glob('download/*.xls');
  usort($files, function($a, $b) {
      return filemtime($a) < filemtime($b);
  });

  foreach($files as $file){
      printf('<tr><td><a href="'.$file.'">'.str_replace("download/","","$file").'</a></td><td align="right">'
             .(int)(filesize($file)/1024)."</td><td>".date("d-M-Y h:i a", filemtime($file))."</td></tr>"); 
  }

  ?>

  <tr><td colspan="3" align="center"><input type="submit" name="submit" value="Generate New File" /></td></tr> 
  </table>
</div>

<div class="info">
<br> &nbsp&nbsp Notes: <br/>
<!--
<a class="btn btn-default btn-sm">
  <i class="fas fa-info-circle"></i>Notes</a>
  -->

<ul class="fa-ul">
  <li><i class="fa-li fas fa-check-square" aria-hidden="true"></i>File generation may take more than 15 minutes.
  </li>
  <li><i class="fa-li fas fa-check-square" aria-hidden="true"></i>The file will be automatically downloaded once 
  the generation is finished.
  </li>
  <li><i class="fa-li fas fa-check-square" aria-hidden="true"></i>Please do not refresh your browser until the file is downloaded.
  </li>
</ul>

</div>

</body>
</html>
