<?php

include '../../inc/CROCSLogin.php'; 

include 'inc_fn_userid_enc.php';

date_default_timezone_set('Asia/Kuala_Lumpur');

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
<link rel="stylesheet" href="css/fontawesome-all.css">

<style type="text/css">
/* .welcomemessage
{
  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
  Verdana, serif, Arial;
  font-size:11px;
  
  width:100%;
  height:20px;
  background: #FFFFFF;
  margin:40px auto;
  box-shadow: 0 10px 6px -6px #777;

} */

.container {
  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
  Verdana, serif, Arial;
  width: 100%;
}

.header {
  position:relative;
  text-align:center;
  text-shadow:#FF4346;
  font-size:xx-large;
  font-weight:bold;
  color:#2b2a2a;
}

.content {
  margin-left: 22%;
  font-size: 14px;
}

.menu-content {
  position: absolute;

  width: 100%;
  height: 50%;
  top: 50%;
}

.menu li {
  margin-top: 30px;
  width: 340px;
  height: 300px;
  overflow: hidden;
  position: relative;
  scroll: none;
  float: left;
  background: #f9f9f9; /* Old browsers */
  background: -moz-linear-gradient(left, #ffffff 0%, #f6f6f6 47%, #ededed 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(left, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(left, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(left, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* IE10+ */
  background: linear-gradient(left, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=1 ); /* IE6-9 */
  -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  margin-right: 4px;
  -webkit-transition: all 300ms linear;
  -moz-transition: all 300ms linear;
  -o-transition: all 300ms linear;
  -ms-transition: all 300ms linear;
  transition: all 300ms linear;
}

.menu li a {
  text-align: center;
  width: 100%;
  height: 100%;
  display: block;
  color: #333;
  position: relative;
}

.fa-icon {
  font-size: 60px;
  color: #ddd;
  text-shadow: 1px 0px 1px rgba(255,255,255,0.8);
  position: absolute;
  width: 100%;
  left: 0px;
  top: -80%;
  -webkit-transition: all 200ms linear;
  -moz-transition: all 200ms linear;
  -o-transition: all 200ms linear;
  -ms-transition: all 200ms linear;
  transition: all 200ms linear;
}

.menu li:hover {
  background:#fff;
}

.menu li:hover .fa-icon {
  color: #afa379;
  font-size: 80px;
  opacity: 0.1;
  -webkit-animation: moveFromLeft 400ms ease;
  -moz-animation: moveFromLeft 400ms ease;
  -ms-animation: moveFromLeft 400ms ease;
}

.menu li:hover .info {
  color: #afa379;
  -webkit-animation: moveFromRight 300ms ease;
  -moz-animation: moveFromRight 300ms ease;
  -ms-animation: moveFromRight 300ms ease;
}

@-webkit-keyframes moveFromLeft {
  from {
    -webkit-transform: translateX(-100%);
  }
  to {
    -webkit-transform: translateX(0%);
  }
}

@-moz-keyframes moveFromLeft {
  from {
    -moz-transform: translateX(-100%);
  }
  to {
    -moz-transform: translateX(0%);
  }
}

@-ms-keyframes moveFromLeft {
  from {
    -ms-transform: translateX(-100%);
  }
  to {
    -ms-transform: translateX(0%);
  }
}

@-webkit-keyframes moveFromRight {
  from {
    -webkit-transform: translateX(100%);
  }
  to {
    -webkit-transform: translateX(0%);
  }
}
@-moz-keyframes moveFromRight {
  from {
    -moz-transform: translateX(100%);
  }
  to {
    -moz-transform: translateX(0%);
  }
}
@-ms-keyframes moveFromRight {
  from {
    -ms-transform: translateX(100%);
  }
  to {
    -ms-transform: translateX(0%);
  }
}


</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<br>

<div class="container">
  <div class="header">
  WELCOME TO CROCS
  </div>
  <div class="content">   
    <ul class="menu">
      <li>
      <a href="#"> 
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-cog" aria-hidden="true"></i></span>
          <span class="info">To capture the latest CE configuration prior to handover, retain resource order and CR activity.</span>
        </div>
      </a>
      </li>
      <li>
      <a href="#">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-keyboard" aria-hidden="true"></i></span>
          <span class="info">To input the latest preventive maintenance executed date for each managed CE</span>
        </div>
      </a>
      </li>
    </ul>
  </div>
</div>

<footer></footer>
</body>
</html>
