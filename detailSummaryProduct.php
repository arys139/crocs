<?php 
include '../../inc/CROCSLogin.php';

include 'inc_fn_userid_enc.php';

 //Inialize session
 session_start();

 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    $PRODUCT = $_GET['PRODUCT'];
    $userID = decrypt($U);
      
   $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$userID."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";
      
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
  oci_free_statement($stid);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CE Summary Details</title>

<style type="text/css">
	body
	{
		font-family: 'Helvetica Neue', Helvetica, Arial;
  		-webkit-font-smoothing: antialiased;
  		font-smoothing: antialiased;
		
	}

	h3
	{
		/*font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;*/
		font-size:15px;
		text-align:center;
		
		width:100%;
		height:20px;
		background: #FFFFFF;
		margin:20px auto;
		box-shadow: 0 10px 6px -6px #777;
	}

	
	table
	{
		overflow: hidden;
		/*font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;*/
		font-size:11px;
		/*text-align:center;*/
		/*width:100%;*/
		border: thin;
	
		box-shadow: 0 2px 3px rgba(0,0,0,0.2);
		display:table;
		
	}
	
</style>


</head>
<body>
<big>

<h3>Report #1: Detail Number of Customer Equipment</h3>
<?php

$sql = "SELECT UPPER(CROCS_LOB) AS CROCS_LOB, UPPER(CROCS_CUST_ID) AS CROCS_CUST_ID, UPPER(CROCS_CUST_NAME) AS CROCS_CUST_NAME, COUNT(*) AS TOTAL, WM_CONCAT(UPPER(CROCS_ASSET_STATUS)) AS CROCS_ASSET_STATUS FROM DATA_MAPPING_CROCS WHERE UPPER(CROCS_HO_ACT_REP)='".$PRODUCT."' AND (CROCS_CUST_NAME <> '' OR CROCS_CUST_NAME IS NOT NULL)GROUP BY CROCS_LOB, CROCS_CUST_NAME, CROCS_CUST_ID ORDER BY CROCS_LOB, CROCS_CUST_NAME, CROCS_CUST_ID";    
 $stid1 = oci_parse($cemdb, $sql);
 $result = oci_execute($stid1);
 if (!$stid1) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else {
oci_define_by_name($stid1, 'CROCS_CUST_ID', $CROCS_CUST_ID); 
oci_define_by_name($stid1, 'CROCS_CUST_NAME', $CROCS_CUST_NAME); 	
oci_define_by_name($stid1, 'CROCS_LOB', $LOB_SEGMENT); 
oci_define_by_name($stid1, 'CROCS_ASSET_STATUS', $CROCS_ASSET_STATUS);	
oci_define_by_name($stid1, 'TOTAL', $TOTAL);
}
    	
 echo '<table border="1" align="center">
  <tr>
    <th style="background-color:#0080FF;" rowspan="2" align="center">LOB SEGMENT</th>
    <th style="background-color:#0080FF;" rowspan="2" align="center">CUSTOMER NAME</th>
    <th style="background-color:#0080FF;" rowspan="2" align="center">CUSTOMER ID</th>
    <th style="background-color:#0080FF;" colspan="2" align="center">ASSET STATUS</th>
    <th style="background-color:#0080FF;" rowspan="2" align="center">TOTAL</th> 
  </tr>
  <tr>
    <th style="background-color:#0080FF;" align="center">ACTIVE</th>
    <th style="background-color:#0080FF;" align="center">INACTIVE</th>
  </tr>';
$OVERALL = 0;
$SavedLOB = "";
$SavedCustID = "";
$SavedCustName = "";
$TOTALACTIVE = 0;
$TOTALINACTIVE = 0;
$TOTALACT = 0;
$TOTALINACT = 0;
while (($row1 = oci_fetch_array($stid1)) != false) {
    $CROCS_CUST_ID = $row1['CROCS_CUST_ID'];
    $CROCS_CUST_NAME = $row1['CROCS_CUST_NAME'];
 	$LOB_SEGMENT = $row1['CROCS_LOB'];    
    if ($row1['CROCS_ASSET_STATUS'] <> ''){
        $CROCS_ASSET_STATUS = $row1['CROCS_ASSET_STATUS']->load();        
    } 
    else{
        $CROCS_ASSET_STATUS = $CROCS_ASSET_STATUS;
    }
    $TOTAL = $row1['TOTAL'];
    $OVERALL = $OVERALL + $TOTAL;
    //echo json_encode($row1);
     echo '<tr>';
     if ($row1['CROCS_LOB'] == $SavedLOB){
           echo "<td>&nbsp</td>";
     }
     else {
           //echo "<td>".$row1['CROCS_LOB']."</td>";
           echo"<td align='center'><a href='detailSummaryLOB.php?U=".$U."&SEGMENT=".$LOB_SEGMENT."&PRODUCT=".$PRODUCT."'>".$row1['CROCS_LOB']."</a></td>";
           $SavedLOB =$row1['CROCS_LOB'];
     }
     echo "<td align='center'><a href='detailSummaryCustName.php?U=".$U."&CUSTNAME=".$CROCS_CUST_NAME."&LOB=".$LOB_SEGMENT."&PRODUCT=".$PRODUCT."'>".$row1['CROCS_CUST_NAME']."</a></td>";
     echo "<td align='center'><a href='detailSummaryCustID.php?U=".$U."&CUSTID=".$CROCS_CUST_ID."&LOB=".$LOB_SEGMENT."&PRODUCT=".$PRODUCT."'>".$row1['CROCS_CUST_ID']."</a></td>";     
     $TOTALACTIVE = substr_count((string)$CROCS_ASSET_STATUS, 'ACTIVE');
     $TOTALINACTIVE = substr_count((string)$CROCS_ASSET_STATUS, 'INACTIVE');
     $TOTALACTIVE = $TOTALACTIVE - $TOTALINACTIVE; 
     echo "<td align='center'>".$TOTALACTIVE."</td>";
     echo "<td align='center'>".$TOTALINACTIVE."</td>";
     $TOTALACTINACT = $TOTALACTIVE + $TOTALINACTIVE;
     echo "<td align='center'>".$TOTALACTINACT."</td></tr>";
     $TOTALACT = $TOTALACT +  $TOTALACTIVE;
     $TOTALINACT = $TOTALINACT +  $TOTALINACTIVE;
 } 
 echo '<tr><td colspan="2"></td>
    <th style="background-color:#FFA500;">TOTAL</th>
    <td align="center">'.$TOTALACT.'</td> 
    <td align="center">'.$TOTALINACT.'</td>
    <td align="center">'.$OVERALL.'</td> 
  </tr></table> <br>';
  
?>

</big>
</body>
</html>