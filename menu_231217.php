<?php

include '../../inc/CROCSLogin.php'; 

include 'inc_fn_userid_enc.php'; 

date_default_timezone_set('Asia/Kuala_Lumpur');

// Inialize session
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




.btn-primary{
	text-decoration: none; /* Menu link without underline */
}

.menu{
  color:#eaeced;
}

.menuadmin{
  color:#eaeced;
}

.menulogout{
  color:#eaeced;
}

.menu:hover
{

	color:#b8b9ba;
	opacity:1;
  font-size:11px;
  transition: 0.5s ease-out;
}

.menuadmin:hover
{
	color:#1BE839;
	opacity:1;
  font-size:11px;
  transition: 0.5s ease-out;
}

.menulogout:hover
{
	color:#ff0040;
	opacity:1;
  font-size:11px;
  transition: 0.5s ease-out;
}

.search:hover .fa-search:before
{
	content:"\f00e";
	color:#b8b9ba;
	opacity:1;
/* 	font-size:15px;
  transition: 0.5s ease-out; */
}

.downloadcontent:hover .fa-arrow-alt-circle-down:before
{
	content:"\f0ab";
	color:#b8b9ba;
	opacity:1;
/* 	font-size:15px;
  transition: 0.5s ease-out; */
}

.bulkupdate:hover .fa-edit:before
{
	content:"\f044";
	color:#b8b9ba;
	opacity:1;
/* 	font-size:22px;
  transition: 0.5s ease-out; */
}

.cesummary:hover .fa-list-alt:before
{
	content:"\f022";
	color:#b8b9ba;
	opacity:1;
/* 	font-size:18px;
  transition: 0.5s ease-out; */
}

.adminuser:hover .fa-user-secret:before
{
	content:&quot;f05d&quot;;
	color:#1BE839;
  opacity:1;
}

.logout:hover .fa-sign-out-alt:before
{
	content:&quot;f05d&quot;;
	color:#ff0040;
	opacity:1;
}

.divright
{
	font-size:11px;
	margin-top:5px;
}

<!-- 	-->
body, html { 
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
}

.menucontainer{
  background-color: #2b2a2a;
  top: 0;
  left: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;

    font-family: Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
    Verdana, serif, Arial, Helvetica;
    font-size:12px;

}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 7px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php if (($role == 'Administrator') && ($access == 'NORMAL')) {?>
<div class="divclass">

    <div class="search" style="float: left; width: 110px;">
      <!--List CE For Update/Download-->	
      <a href="listCE.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="List CE For 
      Update/Download" title="List CE For Update/Download">
      <i class="fas fa-search" style="vertical-align:middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menu">Search CE</span>
      </a>
    </div>
 
    <div class="downloadcontent" style="float: left; width: 170px;">
      <!--Previous Download Contents-->
      <a href="downloadCE.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="Previous Download 
      Contents" title="Previous Download Contents">
      <i class="fas fa-arrow-alt-circle-down" style="vertical-align:middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menu">Download Content</span>
      </a>
    </div>
    
    <div class="bulkupdate" style="float: left; width: 130px;">
      <!--Bulk Update (Excel File)-->	
      <a href="BulkUpdate.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="Bulk Update (Excel 
      File)" title="Bulk Update (Excel File)">
      <i class="fas fa-edit" style="vertical-align: middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menu">Bulk Update</span>
      </a>
    </div>
    
    <div class="cesummary" style="float: left; width: 130px;">
      <!--CE Summary-->	
      <a href="CESummary.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="CE Summary" 
      title="CE Summary">
      <i class="far fa-list-alt" style="vertical-align: middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menu">CE Summary</span>
      </a>
    </div>
    
    <div class="logout" style="float: left; width: 80px;">
      <!--Logout-->
      <a href="logout.php" class="btn btn-primary" target="_top" aria-label="Logout" title="Logout">
      <i class="fas fa-sign-out-alt" style="vertical-align: middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menulogout">Logout</span>
      </a>
      <br>
    </div>
    
    <div class="divright" style="float: right; font-align: middle">
    	<i class="fas fa-user fa-lg" style="vertical-align: middle;color:#06ce25;" aria-hidden="true"></i>
    	<span style="color:#06ce25"><?php echo $name; ?></span>
    </div>
   
</div>
    
<?php } ?>

<?php if (($role == 'Administrator') && ($access == 'SUPER')) {?>
<div class="menucontainer"> 
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
</div>

<?php } ?>

<?php if (($role == 'GUEST') && ($access == 'NORMAL')) {?>
<div class="divclass">   

	<div class="search" style="float: left; width: 110px;">
		<!--List CE For Update/Download--> 
		<a href="listCE.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="List CE For 
		View/Download" title="List CE For Update/Download">
		<i class="fas fa-search" style="vertical-align:middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
    <span class="menu">Search CE</span>
		</a>  
    </div>
   
   <?php /*?><div class="downloadcontent" style="float: left; width: 170px;">
    <!--Previous Download Contents-->
		<a href="downloadCE.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="Previous Download 
		Contents" title="Previous Download Contents">
		<i class="fas fa-arrow-alt-circle-down" style="vertical-align:middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
    <span class="menu">Download Content</span>
		</a>
    </div><?php */?>
    
    
    <div class="cesummary" style="float: left; width: 130px;">
      <!--CE Summary-->
      <a href="CESummary.php?U=<?php echo $U; ?>" class="btn btn-primary" target="main" aria-label="CE Summary" 
      title="CE Summary">
      <i class="far fa-list-alt" style="vertical-align: middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menu">CE Summary</span>
      </a>
    </div>
    
    <div class="logout" style="float: left; width: 80px;">
      <!--Logout-->
      <a href="logout.php" class="btn btn-primary" target="_top" aria-label="Logout" title="Logout">
      <i class="fas fa-sign-out-alt" style="vertical-align: middle;color:#eaeced;font-size:1.7em" aria-hidden="true"></i>
      <span class="menulogout">Logout</span>
      </a>
      <br>
    </div>
            
    <div class="divright" style="float: right; font-align: middle">
    	<i class="fas fa-user fa-lg" style="vertical-align: middle;color:#06ce25;" aria-hidden="true"></i>
    	<span style="color:#06ce25"><?php echo $name; ?></span> 
    </div>

</div>
    
<?php } ?>


</body>
</html>
