<html>
 <head>
 
 <style type="text/css">
 
	body
	{
		font-family: 'Helvetica Neue', Helvetica, Arial;
  		-webkit-font-smoothing: antialiased;
  		font-smoothing: antialiased;
		
	}
 
 	h2
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
	
	.title
	{
		/*font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;*/
		font-size:12px;
		text-align:center;
	}
	
	.wrapper
	{
		margin: 0 auto;
  		padding: 10px;
  		/*max-width: 100%;*/	
	}
	
	table
	{
		overflow: hidden;
		/*font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;*/
		font-size:11px;
		text-align:center;
		border: thin;
		
		width: 100%;
		
		box-shadow: 0 2px 3px rgba(0,0,0,0.2);
		display:table;
		/*@media screen and (max-width: 580px);
		display: block;*/

	}
	
	/*Stripe table*/  
	tbody tr:nth-child(odd) 
	{
   		background-color: #ccc;
	}

	tr:hover 
	{
    	background-color: #CFCACA;
	}
	
	td:hover 
	{
    	background-color: #ffa;
	}
 
 </style>
 <body>

<?php 
 //Allow program to run for up to 100 seconds.
 //set_time_limit(100);
 ini_set('memory_limit', '-1');
 ini_set('max_execution_time', 300);
  
 include '../../inc/CROCSLogin.php'; 

 include 'inc_fn_userid_enc.php'; 

 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    $userID = decrypt($U);
    $CUSTID = $_GET['CUSTID'];
    $PRODUCT = $_GET['PRODUCT'];
    $LOB = $_GET['LOB'];
      
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

    $where = " WHERE CROCS_CUST_ID = '".$CUSTID."' AND UPPER(CROCS_HO_ACT_REP) = '".$PRODUCT."' AND UPPER(CROCS_ASSET_STATUS) LIKE '%ACTIVE%' AND UPPER(CROCS_LOB) = '".$LOB."'"; 
/*    $sql = "SELECT CROCS_ORDER_SVC_ID, CROCS_CUST_NAME, CROCS_CUST_SITE_NAME, CROCS_CUST_ID, CROCS_REGION, CROCS_STATE,CROCS_RESELLER,";
    $sql = $sql."CROCS_NODE_PE,CROCS_BR_CODE,CROCS_BR_ADD_1,CROCS_BR_ADD_2,CROCS_BR_ADD_3,CROCS_BR_ADD_4,CROCS_CUST_CONTACT_1,";
    $sql = $sql."CROCS_CUST_CONTACT_2,CROCS_CUST_CONTACT_3,CROCS_SVC_INSTALL_DATE,CROCS_PRODUCT_NAME,CROCS_LOB,CROCS_COB,CROCS_TACACS,";
    $sql = $sql."CROCS_KIWI,CROCS_CE_MGMT,CROCS_ASSET_STATUS,CROCS_PS_ID,CROCS_PS_LEVEL,CROCS_PS_BANDWIDTH,CROCS_PS_ACCESS_TYPE,";
    $sql = $sql."CROCS_PS_ROUTING_PROTOCOL,CROCS_PS_CE_WAN_IP,CROCS_PS_FRAMED_IP,CROCS_BS_ID,CROCS_BS_LEVEL,CROCS_BS_BANDWIDTH,";
    $sql = $sql."CROCS_BS_ACCESS_TYPE,CROCS_BS_ROUTING_PROTOCOL,CROCS_BS_CE_WAN_IP,CROCS_BS_FRAMED_IP,CROCS_QOS,CROCS_PROFILE,";
    $sql = $sql."CROCS_USERNAME,CROCS_PASSWORD,CROCS_FRAMED_PROTOCOL,CROCS_INPUT_POLICY,CROCS_OUTPUT_POLICY,CROCS_HQ_IP,CROCS_LAN_IP,";
    $sql = $sql."CROCS_LOOPBACK_IP,CROCS_UPE_LOOPBACK_IP,CROCS_TUNNEL_IP,CROCS_CE_SERIAL_NO,CROCS_ROUTER_TYPE,CROCS_ROUTER_MODEL,";
    $sql = $sql."CROCS_ROUTER_PACKAGE,CROCS_CPE_ID,CROCS_WAN_CE_INTERFACE,CROCS_ROUTER_STATUS,CROCS_WARRANTY_DATE,CROCS_CE_PARTNER_MGMT,";
    $sql = $sql."CROCS_CE_LEASE_CONTRACT_NO,CROCS_CE_EXPIRY_DATE,CROCS_CE_PO_NO,CROCS_CE_INVOCE_NO,CROCS_CDF_SIGN_OFF_DATE,";
    $sql = $sql."CROCS_CDF_PERSONNEL,CROCS_HO_ORDER_TYPE,CROCS_HO_STATUS,CROCS_HO_REMARKS,CROCS_HO_ACTIVITY_COMMENT,CROCS_CR_ORDER_NO,";
    $sql = $sql."CROCS_CR_DESC,CROCS_CR_CREATED_DATE,CROCS_CR_ORDER_TYPE,CROCS_CR_STATUS,CROCS_CTT_NO,CROCS_CTT_CREATED_DATE,";
    $sql = $sql."CROCS_CTT_CLOSED_DATE,CROCS_CTT_PRIORITY,CROCS_CTT_SVC_LEG,CROCS_CTT_DESC,CROCS_CTT_CAUSE_CAT,CROCS_CTT_CAUSE_CODE,";
    $sql = $sql."CROCS_CTT_RES_CODE,CROCS_CTT_CLOSED_NAME,CROCS_CTT_CLOSED_TEAM,CROCS_LATEST_PM_DATE,CROCS_PM_DESC,CROCS_UPDATED_DATE,";
    $sql = $sql."CROCS_UPDATED_BY,CROCS_MANAGED_IND,CROCS_MONITOR_IND,CROCS_HOSTNAME ";
    $sql = $sql."FROM DATA_MAPPING_CROCS".$where;*/
    
    $sql = "SELECT CROCS_ORDER_SVC_ID, CROCS_CUST_NAME, CROCS_CUST_SITE_NAME, CROCS_CUST_ID, CROCS_ASSET_STATUS, CROCS_HOSTNAME ";
    $sql = $sql."FROM DATA_MAPPING_CROCS".$where;
     
    $stid1 = oci_parse($cemdb, $sql);                
    
   
 if(!$stid1) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 

 else {
	oci_define_by_name($stid1, 'CROCS_ORDER_SVC_ID', $CROCS_ORDER_SVC_ID); 	
 	oci_define_by_name($stid1, 'CROCS_CUST_NAME', $CROCS_CUST_NAME);
	oci_define_by_name($stid1, 'CROCS_CUST_SITE_NAME', $CROCS_CUST_SITE_NAME);
	oci_define_by_name($stid1, 'CROCS_CUST_ID', $CROCS_CUST_ID);
	oci_define_by_name($stid1, 'CROCS_ASSET_STATUS', $CROCS_ASSET_STATUS);
	oci_define_by_name($stid1, 'CROCS_HOSTNAME', $CROCS_HOSTNAME);

	oci_execute($stid1);
 }

 //Page header & remarks
 echo '<h2>List Equipment Based On Customer ID</h2><p>'; 
 
 echo '<div class="title">';
 echo '<p><big>You may view/edit the information by clicking on the equipment LV No. listed under <b>Order Service ID</b> column.</big><br><br>';
 echo '</div>';

 //Prepare table
 echo "<div class='wrapper'>";
 echo "<table align='center'><tr>";
 echo "<td style='background-color:#FFA500;' align='center'>No.</td>";
 echo "<td style='background-color:#FFA500;' align='center'>Order Service ID</td>";  
 echo "<td style='background-color:#FFA500;' align='center'>Customer ID</td>";
 echo "<td style='background-color:#FFA500;' align='center'>Customer Name</td>"; 
 echo "<td style='background-color:#FFA500;' align='center'>Customer Site Name</td>";  
 echo "<td style='background-color:#FFA500;' align='center'>Hostname</td>";
 echo "<td style='background-color:#FFA500;' align='center'>Asset Status</td>"; 
 echo "</tr>";

$count = 0;
//while (($row = oci_fetch_array($stid1, OCI_BOTH)) != false) {
while (($row = oci_fetch_array($stid1)) != false) {
$count = $count + 1;
$stringData = "<tr><td>".$count."</td>";
if ($role <> 'Administrator'){
    $stringData = $stringData."<td align='center'><a href='UpdCE.php?CE_Hostname=".$row['CROCS_ORDER_SVC_ID']."&R=GUEST&U=".$U."'>";
}
if ($role <> 'GUEST'){
    $stringData = $stringData."<td align='center'><a href='UpdCE.php?CE_Hostname=".$row['CROCS_ORDER_SVC_ID']."&R=Administrator&U=".$U."'>";
}    
//set all info from data_mapping as nbsp for unmanaged_device
//if ($ext1Ind <> 'Y1'){
 	$CROCS_ORDER_SVC_ID = $row['CROCS_ORDER_SVC_ID'];    
    $CROCS_CUST_NAME = $row['CROCS_CUST_NAME'];
	$CROCS_CUST_SITE_NAME = $row['CROCS_CUST_SITE_NAME'];    
	$CROCS_CUST_ID = $row['CROCS_CUST_ID'];
	$CROCS_HOSTNAME = $row['CROCS_HOSTNAME'];
	$CROCS_ASSET_STATUS = $row['CROCS_ASSET_STATUS'];       

    $stringData = $stringData.$CROCS_ORDER_SVC_ID."</td><td align='center'>".$CROCS_CUST_ID."</td><td align='center'>".$CROCS_CUST_NAME."</td><td align='center'>";
    $stringData = $stringData.$CROCS_CUST_SITE_NAME."</td><td align='center'>".$CROCS_HOSTNAME."</td><td align='center'>".$CROCS_ASSET_STATUS."</td></tr>";
 
    echo $stringData; 
    }  
 echo "</table><br>";
 echo "</div>";
 ?> 
 
  </body>
 </head>
 </html>
