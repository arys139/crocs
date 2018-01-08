<?php

include '../../inc/CROCSLogin.php'; 

include 'inc_fn_userid_enc.php'; 

date_default_timezone_set('Asia/Kuala_Lumpur');

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
//        header('Location: index.php');
        echo("<script language=\"javascript\">");
        echo("top.location.href = \"index.php\";");
        echo("</script>");
        exit;
}
else {
   $userID = $_SESSION['username'];
   $userID = strtoupper($userID);
   $U = encrypt ($userID);
      
   $sql = "SELECT USERNAME, ROLE, USER_ACCESS FROM USERS WHERE USERID = '".$userID."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";
      
   $stid = oci_parse($cemdb, $sql);
   
   if(!$stid) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 
   else{
    oci_define_by_name($stid, 'USERNAME', $name);
    oci_define_by_name($stid, 'ROLE', $role);
    oci_define_by_name($stid, 'USER_ACCESS', $access);
    oci_execute($stid);}
    
   if ($row = !oci_fetch($stid)){
        $name = "GUEST";
        $role = "GUEST";
        $access = "NORMAL";
        }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title> CRoCS </title>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<link rel="stylesheet" href="css/fontawesome-all.css">

<style type="text/css">

<!-- 	-->
body, html { 
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}

.container{
  background-color: #2b2a2a;
  top: 0;
  left: 0;
}

.menu {
  height: 30px;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  font-family: Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
  Verdana, serif, Arial, Helvetica;
  font-size: 11.5px;
  //perspective: 300px; //to make 3d perspective. only in chrome
}

.menu li {
  float: left;
}

.menu li a {
  float: left;
  display: block;
  color: #ffffff;
  padding: 7px 16px;
  text-decoration: none;
}

.menu-content {
  left: 20px;
  width: 100%;
  height: 13px;
  top: 0px;
}

span .fa-icon {
  vertical-align: middle;
  padding: 0px 4px;
}

.menu li:hover {
  background-color: #111;
  border-bottom: 2px solid #2e7ef4;
  transform: rotateY(0deg);
}

.menu li:hover .menu-content{
    color: #b8b9ba;
}

.menu li:hover .fa-search {
  transition: 0.9s;
  transform: rotateY(180deg);
}

.fa-search {
  transition: 0.9s;
  transform: rotateY(0deg);
}

.menu li:hover .fa-arrow-alt-circle-down {
  transition: 0.9s;
  transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
}

.fa-arrow-alt-circle-down {
  transition: 0.9s;
  transform: rotateY(0deg);
}

.menu li:hover .fa-edit {
  transition: 0.9s;
  transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
}

.fa-edit {
  transition: 0.9s;
  transform: rotateY(0deg);
}

.menu li:hover .fa-list-alt {
  transition: 0.9s;
  transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
}

.fa-list-alt {
  transition: 0.9s;
  transform: rotateY(0deg);
}

.menu li:hover .admin {
  color: #1BE839;
}

.menu li:hover .fa-user-secret:before{
  color: #1BE839;
}

.menu li:hover .logout {
  color: #ff2b2b;
}

.menu li:hover .fa-sign-out-alt:before {
  color: #ff2b2b;
}

.divright
{
	font-size:10.5px;
	margin-top:8px;
}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php if (($role == 'Administrator') && ($access == 'NORMAL')) {?>
<div class="container">
  <nav class="content">   
    <ul class="menu">  
      <li>
      <a href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For Update/Download" title="List CE For Update/Download"> 
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-search " aria-hidden="true"></i></span>
          <span class="search">Search CE</span>
        </div>
      </a>
      </li>
      <li>
      <a href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous Download Contents" title="Previous Download Contents">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-arrow-alt-circle-down" aria-hidden="true"></i></span>
          <span class="downloadcontent">Download Content</span>
        </div>
      </a>
      </li>
      <li>
      <a href="BulkUpdate.php?U=<?php echo $U; ?>" target="main" aria-label="Bulk Update (Excel File)" title="Bulk Update (Excel File)">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-edit" aria-hidden="true"></i></span>
          <span class="bulkupdate">Bulk Update</span>
        </div>
      </a>
      </li>  
      <li>
      <a href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" title="CE Summary">
        <div class="menu-content">
          <span class="fa-icon"><i class="far fa-list-alt" aria-hidden="true"></i></span>
          <span class="cesummary">CE Summary</span>
        </div>
      </a>
      </li>
      <li>
      <a href="logout.php" target="_top" aria-label="Logout" title="Logout">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></span>
          <span class="logout">Logout <?php echo '[ '.strtolower($userID).' ]'; ?></span>
        </div>
      </a>
      </li>      
      <div class="divright" style="float: right; font-align: middle">
        <i class="fas fa-user fa-lg" style="vertical-align: middle;color:#06ce25;" aria-hidden="true"></i>
        <span style="color:#06ce25"><?php echo $name; ?></span>
      </div>
    </ul>
  </nav>
</div>
    
<?php } ?>

<?php if (($role == 'Administrator') && ($access == 'SUPER')) {?>
<div class="container">
  <nav class="content">   
    <ul class="menu">
      <li>
      <a href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For Update/Download" title="List CE For Update/Download"> 
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-search " aria-hidden="true"></i></span>
          <span class="search">Search CE</span>
        </div>
      </a>
      </li>
      <li>
      <a href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous Download Contents" title="Previous Download Contents">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-arrow-alt-circle-down" aria-hidden="true"></i></span>
          <span class="downloadcontent">Download Content</span>
        </div>
      </a>
      </li>    
      <li>
      <a href="BulkUpdate.php?U=<?php echo $U; ?>" target="main" aria-label="Bulk Update (Excel File)" title="Bulk Update (Excel File)">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-edit" aria-hidden="true"></i></span>
          <span class="bulkupdate">Bulk Update</span>
        </div>
      </a>
      </li>   
      <li>
      <a href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" title="CE Summary">
        <div class="menu-content">
          <span class="fa-icon"><i class="far fa-list-alt" aria-hidden="true"></i></span>
          <span class="cesummary">CE Summary</span>
        </div>
      </a>
      </li>  
      <li>
      <a href="ListUser.php?U=<?php echo $U; ?>" target="main" aria-label="User Management" title="User Management">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-user-secret" aria-hidden="true"></i></span>
          <span class="admin">Admin</span>
        </div>
      </a>
      </li>   
      <li>
      <a href="logout.php" target="_top" aria-label="Logout" title="Logout">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></span>
          <span class="logout">Logout <?php echo '[ '.strtolower($userID).' ]'; ?></span>
        </div>
      </a>
      </li> 
      <div class="divright" style="float: right; font-align: middle">
    	<i class="fas fa-user fa-lg" style="vertical-align: middle;color:#06ce25;" aria-hidden="true"></i>
    	<span style="color:#06ce25"><?php echo $name; ?></span> 
    </div>
    </ul>
  </nav>
</div> 

<?php } ?>

<?php if (($role == 'GUEST') && ($access == 'NORMAL')) {?>
<div class="container">
  <nav class="content">   
    <ul class="menu">  
      <li>
      <a href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For Update/Download" title="List CE For Update/Download"> 
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-search " aria-hidden="true"></i></span>
          <span class="search" style="width: 80px">Search CE</span>
        </div>
      </a>
      </li>
      <?php /*?>
      <li>
      <a href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous Download Contents" title="Previous Download Contents">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-arrow-alt-circle-down" aria-hidden="true"></i></span>
          <span class="downloadcontent">Download Content</span>
        </div>
      </a>
      </li> 
      <?php */?>
      <li>
      <a href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" title="CE Summary">
        <div class="menu-content">
          <span class="fa-icon"><i class="far fa-list-alt" aria-hidden="true"></i></span>
          <span class="cesummary">CE Summary</span>
        </div>
      </a>
      </li>
      <li>
      <a href="logout.php" target="_top" aria-label="Logout" title="Logout">
        <div class="menu-content">
          <span class="fa-icon"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></span>
          <span class="logout">Logout <?php echo '[ '.strtolower($userID).' ]'; ?></span>
        </div>
      </a>
      </li>            
      <div class="divright" style="float: right; font-align: middle">
        <i class="fas fa-user fa-lg" style="vertical-align: middle;color:#06ce25;" aria-hidden="true"></i>
        <span style="color:#06ce25"><?php echo $name; ?></span> 
      </div>
    </ul>
  </nav>
</div>
    
<?php } ?>


</body>
</html>
