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
<html>
<head>
<title> CRoCS </title>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<link rel="stylesheet" href="css/font-awesome.min.css">

<style type="text/css">
body 
{
	background-color: #F9F9F9;
	text-align:left;
	font-weight:bold;
	color:orange;
}

.divclass
{
	font-family: Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
	Verdana, serif, Arial;
	font-size:12px;
	color:black;
}	

.search:hover .fa-search:before
{
	content:&quot;f05d&quot;;
	color:#009933;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.downloadcontent:hover .fa-download:before
{
	content:&quot;f05d&quot;;
	color:#009933;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.bulkupdate:hover .fa-pencil-square-o:before
{
	content:&quot;f05d&quot;;
	color:#009933;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.cesummary:hover .fa-list-alt:before
{
	content:&quot;f05d&quot;;
	color:#009933;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.user:hover .fa-user-circle-o:before
{
	content:&quot;f05d&quot;;
	color:#1BE839;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.logout:hover .fa-sign-out:before
{
	content:&quot;f05d&quot;;
	color:#F37577;
	opacity:1;
	font-size:20px;
    transition: 0.5s ease-out;
}

.divright
{
	font-size:11px;
	margin-top:5px;
}

}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<!-- body bgcolor="#FFA500" --!>
<body>
<!-- Please select the option below --!>
<big>


<?php if (($role == 'Administrator') && ($access == 'NORMAL')) {?>
<div class="divclass">

	<div class="search" style="float: left; width: 110px;">
    <!--List CE For Update/Download--!> 
    <a class="btn btn-primary" href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For 
    Update/Download" title="List CE For Update/Download">
	<i class="fa fa-search fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>
    &nbsp;Search CE &nbsp;&nbsp;
    </div>
    
    <div class="downloadcontent" style="float: left; width: 170px;">
    <!--Previous Download Contents--!>
    <a class="btn btn-primary" href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous Download 
    Contents" title="revious Download Contents">
	<i class="fa fa-download fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>
    &nbsp;Download Content &nbsp;&nbsp;
    </div>
    
    <div class="bulkupdate" style="float: left; width: 130px;">
    <!--Bulk Update (Excel File)--!>
    <a class="btn btn-primary" href="BulkUpdate.php?U=<?php echo $U; ?>" target="main" aria-label="Bulk Update (Excel 
    File)" title="Bulk Update (Excel File)">
	<i class="fa fa-pencil-square-o fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>
    &nbsp;Bulk Update &nbsp;&nbsp;
    </div>
    
    <div class="cesummary" style="float: left; width: 130px;">
    <!--CE Summary--!>
    <a class="btn btn-primary" href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" 
    title="CE Summary">
	<i class="fa fa-list-alt fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>&nbsp; CE
    Summary &nbsp;&nbsp;
    </div>
    
    <div class="logout" style="float: left; width: 80px;">
    <!--Logout--!>
    <a class="btn btn-primary" href="logout.php" target="_top" aria-label="Logout" title="Logout">
	<i class="fa fa-sign-out fa-2x" style="vertical-align: middle;color:#ff0040;" aria-hidden="true"></i></a>
    &nbsp;Logout 
    &nbsp;&nbsp;
    <br>
    </div>
    
    <div class="divright" style="float: right; font-align: middle">
    	<i class="fa fa-user fa-lg" style="vertical-align: middle;" aria-hidden="true"></i>
    	<?php 
		echo  $name;
		?> 
    </div>
   
</div>
    
<?php } ?>

<?php if (($role == 'Administrator') && ($access == 'SUPER')) {?>
	<div class="divclass">

		<div class="search" style="float: left; width: 110px;">
        <!--List CE For Update/Download--!> 
        <a class="btn btn-primary" href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For 
        Update/Download" title="List CE For Update/Download">
        <i class="fa fa-search fa-2x" style="vertical-align: middle;color: #0066ff;" aria-hidden="true"></i></a>
        &nbsp;Search CE &nbsp;&nbsp;
        </div>
            
        <div class="downloadcontent" style="float: left; width: 170px;">
        <!--Previous Download Contents--!>
        <a class="btn btn-primary" href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous 
        Download Contents" title="Previous Download Contents">
        <i class="fa fa-download fa-2x" style="vertical-align: middle;color: #0066ff;" aria-hidden="true"></i></a>
        &nbsp;Download Content &nbsp;&nbsp;
        </div>
        
        <div class="bulkupdate" style="float: left; width: 130px;">
        <!--Bulk Update (Excel File)--!>
        <a class="btn btn-primary" href="BulkUpdate.php?U=<?php echo $U; ?>" target="main" aria-label="Bulk Update 
        (Excel File)" title="Bulk Update (Excel File)">
        <i class="fa fa-pencil-square-o fa-2x" style="vertical-align: middle;color: #0066ff;" aria-hidden="true"></i></a>
        &nbsp;Bulk Update &nbsp;&nbsp;
        </div>
        
        <div class="cesummary" style="float: left; width: 130px;">
        <!--CE Summary--!>
        <a class="btn btn-primary" href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" 
        title="CE Summary">
        <i class="fa fa-list-alt fa-2x" style="vertical-align: middle;color: #0066ff;" aria-hidden="true"></i></a>
        &nbsp;CE
        Summary &nbsp;&nbsp;
        </div>
        
        <div class="user" style="float: left; width: 90px;">
        <!--User Management--!>
        <a class="btn btn-primary" href="ListUser.php?U=<?php echo $U; ?>" target="main" aria-label="User Management"
        title="User Management">
        <i class="fa fa-user-circle-o fa-2x" style="vertical-align: middle;color: green;" aria-hidden="true"></i></a>
        &nbsp;Admin 
        &nbsp;&nbsp;
        </div>
        
        <div class="logout" style="float: left; width: 80px;">
        <!--Logout--!>
        <a class="btn btn-primary" href="logout.php" target="_top" aria-label="Logout" title="Logout">
        <i class="fa fa-sign-out fa-2x" style="vertical-align: middle;color: #ff0040;" aria-hidden="true"></i></a>
        &nbsp;Logout 
        &nbsp;&nbsp;
        <br>
        </div>
        
        <div class="divright" style="float: right; font-align: middle">
    		<i class="fa fa-user fa-lg" style="vertical-align: middle;" aria-hidden="true"></i>
    		<?php 
			echo  $name;
			?> 
    	</div>     
           
   	</div>    
    
<?php } ?>

<?php if (($role == 'GUEST') && ($access == 'NORMAL')) {?>
<div class="divclass">   

	<div class="search" style="float: left; width: 110px;">
    <!--List CE For Update/Download--!> 
    <a class="btn btn-primary" href="listCE.php?U=<?php echo $U; ?>" target="main" aria-label="List CE For 
    View/Download" title="List CE For Update/Download">
	<i class="fa fa-search fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>
    &nbsp;Search CE &nbsp;&nbsp;
    </div>
   
   
   <?php /*?><div class="downloadcontent" style="float: left; width: 170px;">
    <!--Previous Download Contents--!>
    <a class="btn btn-primary" href="downloadCE.php?U=<?php echo $U; ?>" target="main" aria-label="Previous Download 
    Contents" title="Previous Download Contents">
	<i class="fa fa-download fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>
    &nbsp;Download Content &nbsp;&nbsp;
    </div><?php */?>
    
    
    <div class="cesummary" style="float: left; width: 130px;">
    <!--CE Summary--!>
    <a class="btn btn-primary" href="CESummary.php?U=<?php echo $U; ?>" target="main" aria-label="CE Summary" 
    title="CE Summary">
	<i class="fa fa-list-alt fa-2x" style="vertical-align: middle;color:#0066ff;" aria-hidden="true"></i></a>&nbsp;CE 
    Summary &nbsp;&nbsp;
    </div>
    
    <div class="logout" style="float: left; width: 80px;">
    <!--Logout--!>
    <a class="btn btn-primary" href="logout.php" target="_top" aria-label="Logout" title="Logout">
	<i class="fa fa-sign-out fa-2x" style="vertical-align: middle;color:#ff0040;" aria-hidden="true"></i></a>
    &nbsp;Logout 
    &nbsp;&nbsp;
    <br>
    </div>
            
	<div class="divright" style="float: right; font-align: middle">
    	<i class="fa fa-user fa-lg" style="vertical-align: middle;" aria-hidden="true"></i>
    	<?php 
		echo $name;
		?> 
    </div>

</div>
    
<?php } ?>
</big>
</body>
</html>
