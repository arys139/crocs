<?PHP
ini_set('memory_limit', '-1');
 include '../../inc/CROCSLogin.php'; 

 function cleanData(&$str)
 { 
 $str = preg_replace("/\t/", "\\t", $str); 
 $str = preg_replace("/\r?\n/", "\\n", $str); 
 if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
 }
 # filename for download 
 $filename = "crocs_data_" . date('Ymd') . ".xls"; 
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
 $flag = false;
 
 $sql = "SELECT CE_HOSTNAME, CUST_SEGMENT, REGION, STATE, CUST_SITE_NAME, SERVICE_ID, CE_WAN_IP_ADDR, CE_BKP_IP_ADDR, RESELLER, NODE_PE, CUST_NAME, CUST_ID, ";
 $sql = $sql."SVC_TYPE, BR_CODE, BR_NAME, BR_ADD1, BR_ADD2, BR_ADD3, BR_ADD4, FIRST_CUST_CONTACT, SECOND_CUST_CONTACT, THIRD_CUST_CONTACT, ROOT_SERVICE_ID, ";
 $sql = $sql."PS_NUMBER, BS_NUMBER, HANDOVER_STATUS, BKP_TYPE, BKP_NO, ISDN_LOGIN_ID, ISDN_PE_PRIMARY, ISDN_PE_SECONDARY, LAN_IP_ADDR, HQ_IP_ADDR, CROCS_TACACS, ";
 $sql = $sql."CROCS_KIWI, CROCS_CDF_SIGN_OFF_DATE, CROCS_CDF_PERSONNEL, CROCS_TUNNEL_IP, CROCS_LOOPBACK_IP, CROCS_CR_NOTES, CROCS_CR_ORDER_NUMBER, ";
 $sql = $sql."CROCS_CE_MANAGEMENT, CROCS_CE_SERIAL_NUMBER, CROCS_ROUTER_TYPE, CROCS_ROUTER_MODEL, CROCS_LATEST_PM_DATE, CROCS_UPDATE_DATE, CROCS_UPDATE_USER_ID, ";
 $sql = $sql."CROCS_SVC_INSTALL_DATE, CROCS_ORDER_TYPE, CROCS_ASSET_STATUS, CROCS_ROUTER_PACKAGE, CROCS_BANDWIDTH_SVC, CROCS_ROUTING_PROTOCOL, CROCS_SERVICE_LEVEL, ";
 $sql = $sql."CROCS_QOS_SVC, CROCS_CPE_ID, CROCS_WAN_CPE_INTERFACE, CROCS_CE_PARTNER_MGMT, CROCS_CE_LEASING_CONTRACT_NO, CROCS_CE_LEASING_EXPIRY_DATE, ";
 $sql = $sql."CROCS_CE_PURCHACE_ORDER_NO, CROCS_CE_INVOICE_NO, CROCS_CR_CREATED_DATE, CROCS_CR_TYPE, CROCS_CR_STATUS, CROCS_CTT_DESCRIPTION, CROCS_CTT_CAUSE_CATEGORY,";
 $sql = $sql."CROCS_CTT_CAUSE_CODE, CROCS_CTT_RESOLUTION_CODE, CROCS_CTT_CLOSED_BY_NAME, CROCS_CTT_CLOSED_BY_TEAM, CROCS_PM_DESCRIPTION, CROCS_CTT_NUMBER, ";
 $sql = $sql."CROCS_CTT_CREATED_DATE, CROCS_CTT_CLOSED_DATE, CROCS_CTT_PRIORITY, CROCS_CTT_SVC_LEG, SLG ";
 $sql = $sql."FROM DATA_MAPPING";

 $stid1 = oci_parse($cemdb, $sql);
 $result1 = oci_execute($stid1);
   
   if(!$stid1) {
    echo "An error occurred in parsing the sql string.\n";
    exit;
    } 
   else{
 	oci_define_by_name($stid1, 'CE_HOSTNAME', $CE_HOSTNAME_REAL);
	oci_define_by_name($stid1, 'ROOT_SERVICE_ID', $CE_HOSTNAME);
	oci_define_by_name($stid1, 'CUST_SEGMENT', $CUST_SEGMENT);
	oci_define_by_name($stid1, 'REGION', $REGION);
	oci_define_by_name($stid1, 'STATE', $STATE);
	oci_define_by_name($stid1, 'CUST_SITE_NAME', $CUST_SITE_NAME);
	oci_define_by_name($stid1, 'SERVICE_ID', $SERVICE_ID);
	oci_define_by_name($stid1, 'CE_WAN_IP_ADDR', $CE_WAN_IP_ADDR);
	oci_define_by_name($stid1, 'CE_BKP_IP_ADDR', $CE_BKP_IP_ADDR);
	oci_define_by_name($stid1, 'RESELLER', $RESELLER);
	oci_define_by_name($stid1, 'NODE_PE', $NODE_PE);
	oci_define_by_name($stid1, 'CUST_NAME', $CUST_NAME);
	oci_define_by_name($stid1, 'CUST_ID', $CUST_ID);
	oci_define_by_name($stid1, 'SVC_TYPE', $SVC_TYPE);
	oci_define_by_name($stid1, 'BR_CODE', $BR_CODE);
	oci_define_by_name($stid1, 'BR_NAME', $BR_NAME);
	oci_define_by_name($stid1, 'BR_ADD1', $BR_ADD1);
	oci_define_by_name($stid1, 'BR_ADD2', $BR_ADD2);
	oci_define_by_name($stid1, 'BR_ADD3', $BR_ADD3);
	oci_define_by_name($stid1, 'BR_ADD4', $BR_ADD4);
	oci_define_by_name($stid1, 'FIRST_CUST_CONTACT', $FIRST_CUST_CONTACT);
	oci_define_by_name($stid1, 'SECOND_CUST_CONTACT', $SECOND_CUST_CONTACT);
	oci_define_by_name($stid1, 'THIRD_CUST_CONTACT', $THIRD_CUST_CONTACT);
	oci_define_by_name($stid1, 'ROOT_SERVICE_ID', $ROOT_SERVICE_ID);
	oci_define_by_name($stid1, 'PS_NUMBER', $PS_NUMBER);
	oci_define_by_name($stid1, 'BS_NUMBER', $BS_NUMBER);
	oci_define_by_name($stid1, 'HANDOVER_STATUS', $HANDOVER_STATUS);
	oci_define_by_name($stid1, 'BKP_TYPE', $BKP_TYPE);
	oci_define_by_name($stid1, 'BKP_NO', $BKP_NO);
	oci_define_by_name($stid1, 'ISDN_LOGIN_ID', $ISDN_LOGIN_ID);
	oci_define_by_name($stid1, 'LAN_IP_ADDR', $LAN_IP_ADDR);
	oci_define_by_name($stid1, 'HQ_IP_ADDR', $HQ_IP_ADDR);
	oci_define_by_name($stid1, 'ISDN_PE_PRIMARY', $ISDN_PE_PRIMARY);
	oci_define_by_name($stid1, 'ISDN_PE_SECONDARY', $ISDN_PE_SECONDARY);
	oci_define_by_name($stid1, 'CROCS_TACACS', $CROCS_TACACS);
	oci_define_by_name($stid1, 'CROCS_KIWI', $CROCS_KIWI);
    oci_define_by_name($stid1, 'CROCS_CDF_SIGN_OFF_DATE', $CROCS_CDF_SIGN_OFF_DATE);
    oci_define_by_name($stid1, 'CROCS_CDF_PERSONNEL', $CROCS_CDF_PERSONNEL);
    oci_define_by_name($stid1, 'CROCS_TUNNEL_IP', $CROCS_TUNNEL_IP);
    oci_define_by_name($stid1, 'CROCS_LOOPBACK_IP', $CROCS_LOOPBACK_IP);
    oci_define_by_name($stid1, 'CROCS_CR_NOTES', $CROCS_CR_NOTES);
    oci_define_by_name($stid1, 'CROCS_CR_ORDER_NUMBER', $CROCS_CR_ORDER_NUMBER);
    oci_define_by_name($stid1, 'CROCS_CE_MANAGEMENT', $CROCS_CE_MANAGEMENT);
    oci_define_by_name($stid1, 'CROCS_CE_SERIAL_NUMBER', $CROCS_CE_SERIAL_NUMBER);
    oci_define_by_name($stid1, 'CROCS_ROUTER_TYPE', $CROCS_ROUTER_TYPE);
    oci_define_by_name($stid1, 'CROCS_ROUTER_MODEL', $CROCS_ROUTER_MODEL);
    oci_define_by_name($stid1, 'CROCS_LATEST_PM_DATE', $CROCS_LATEST_PM_DATE);
    oci_define_by_name($stid1, 'CROCS_UPDATE_DATE', $CROCS_UPDATE_DATE);
    oci_define_by_name($stid1, 'CROCS_UPDATE_USER_ID', $CROCS_UPDATE_USER_ID);    
    oci_define_by_name($stid1, 'CROCS_SVC_INSTALL_DATE', $CROCS_SVC_INSTALL_DATE);
    oci_define_by_name($stid1, 'CROCS_ORDER_TYPE', $CROCS_ORDER_TYPE);
    oci_define_by_name($stid1, 'CROCS_ASSET_STATUS', $CROCS_ASSET_STATUS);
    oci_define_by_name($stid1, 'CROCS_ROUTER_PACKAGE', $CROCS_ROUTER_PACKAGE);
    oci_define_by_name($stid1, 'CROCS_BANDWIDTH_SVC', $CROCS_BANDWIDTH_SVC);
    oci_define_by_name($stid1, 'CROCS_ROUTING_PROTOCOL', $CROCS_ROUTING_PROTOCOL);
    oci_define_by_name($stid1, 'CROCS_SERVICE_LEVEL', $CROCS_SERVICE_LEVEL);
    oci_define_by_name($stid1, 'CROCS_QOS_SVC', $CROCS_QOS_SVC);
    oci_define_by_name($stid1, 'CROCS_CPE_ID', $CROCS_CPE_ID);
    oci_define_by_name($stid1, 'CROCS_WAN_CPE_INTERFACE', $CROCS_WAN_CPE_INTERFACE);
    oci_define_by_name($stid1, 'CROCS_CE_PARTNER_MGMT', $CROCS_CE_PARTNER_MGMT);
    oci_define_by_name($stid1, 'CROCS_CE_LEASING_CONTRACT_NO', $CROCS_CE_LEASING_CONTRACT_NO);
    oci_define_by_name($stid1, 'CROCS_CE_LEASING_EXPIRY_DATE', $CROCS_CE_LEASING_EXPIRY_DATE);
    oci_define_by_name($stid1, 'CROCS_CE_PURCHACE_ORDER_NO', $CROCS_CE_PURCHACE_ORDER_NO);
    oci_define_by_name($stid1, 'CROCS_CE_INVOICE_NO', $CROCS_CE_INVOICE_NO);
    oci_define_by_name($stid1, 'CROCS_CR_CREATED_DATE', $CROCS_CR_CREATED_DATE);
    oci_define_by_name($stid1, 'CROCS_CR_TYPE', $CROCS_CR_TYPE);
    oci_define_by_name($stid1, 'CROCS_CR_STATUS', $CROCS_CR_STATUS);
    oci_define_by_name($stid1, 'CROCS_CTT_DESCRIPTION', $CROCS_CTT_DESCRIPTION);
    oci_define_by_name($stid1, 'CROCS_CTT_CAUSE_CATEGORY', $CROCS_CTT_CAUSE_CATEGORY);
    oci_define_by_name($stid1, 'CROCS_CTT_CAUSE_CODE', $CROCS_CTT_CAUSE_CODE);
    oci_define_by_name($stid1, 'CROCS_CTT_RESOLUTION_CODE', $CROCS_CTT_RESOLUTION_CODE);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_BY_NAME', $CROCS_CTT_CLOSED_BY_NAME);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_BY_TEAM', $CROCS_CTT_CLOSED_BY_TEAM);
    oci_define_by_name($stid1, 'CROCS_PM_DESCRIPTION', $CROCS_PM_DESCRIPTION);
    oci_define_by_name($stid1, 'CROCS_CTT_NUMBER', $CROCS_CTT_NUMBER);
    oci_define_by_name($stid1, 'CROCS_CTT_CREATED_DATE', $CROCS_CTT_CREATED_DATE);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_DATE', $CROCS_CTT_CLOSED_DATE);
    oci_define_by_name($stid1, 'CROCS_CTT_PRIORITY', $CROCS_CTT_PRIORITY);
    oci_define_by_name($stid1, 'CROCS_CTT_SVC_LEG', $CROCS_CTT_SVC_LEG);
    }

 $rowcount = 0;
 
 echo "No \t LV# \t Service Installation Date \t CDF Signoff Date \t CDF Personnel \t Handover Status \t TACACS \t KIWI \t CE Management \t CE Serial Number \t Router Type \t Router Model \t Order Type \t Asset Status \t Router Package \t Bandwidth Service \t Routing Protocol \t Service Level \t QOS Service \t CPE ID \t WAN CPE Interface \t CE Partner Management \t CE Leasing Contract No \t CE Leasing Expiry Date \t CE Purchase Order (PO) No \t CE Invoice No \t CR Description \t CR Order No \t CR Created Date \t CR Order Type \t CR Status \t CTT Number \t CTT Created Date \t CTT Closed Date \t CTT Priority \t CTT Service/Leg For Which Ticket is Raised \t CTT Description \t CTT Cause Category \t CTT Cause Code \t CTT Resolution Code \t CTT Closed By Name \t CTT Closed by Team \t Latest Preventive Maintenance Date \t Preventive Maintenance Description \t Tunnel IP \t Loopback IP \t LAN IP \t Last Updated Date \t Last Updated By \t Latest CE Configuration Attachment \t Latest CE Handover Attachment \t CE Hostname \t Customer Segment \t Region \t State \t Customer Site Name \t Service ID \t CE WAN IP Address \t CE Backup IP Address \t Reseller \t Node/PE \t Customer Name \t Customer ID \t Service Type \t Branch Code \t Branch Name \t Branch Address1 \t Branch Address2 \t Branch Address3 \t Branch Address4 \t First Customer Contact Person \t Second Customer Contact Person \t Third Customer Contact Person \t Root Service ID \t PS Number \t BS Number \t Handover Status \t Backup Type \t Backup Number \t ISDN Login ID \t ISDN PE (Primary) \t ISDN PE (Secondary) \t LAN IP Address \t HQ IP Address \r\n";
 
 while ($row1 = oci_fetch_assoc($stid1)) {
    $CE_HOSTNAME_REAL = $row1['CE_HOSTNAME'];
	$CE_HOSTNAME = $row1['ROOT_SERVICE_ID'];
	$CUST_SEGMENT = $row1['CUST_SEGMENT'];
	$REGION = $row1['REGION'];
	$STATE = $row1['STATE'];
	$CUST_SITE_NAME = $row1['CUST_SITE_NAME'];
	$SERVICE_ID = $row1['SERVICE_ID'];
	$CE_WAN_IP_ADDR = $row1['CE_WAN_IP_ADDR'];
    $CE_BKP_IP_ADDR = $row1['CE_BKP_IP_ADDR'];
	$RESELLER = $row1['RESELLER'];
	$NODE_PE = $row1['NODE_PE'];
	$CUST_NAME = $row1['CUST_NAME'];
	$CUST_ID = $row1['CUST_ID'];
	$SVC_TYPE = $row1['SVC_TYPE'];
	$BR_CODE = $row1['BR_CODE'];
	$BR_NAME = $row1['BR_NAME'];
	$BR_ADD1 = $row1['BR_ADD1'];
	$BR_ADD2 = $row1['BR_ADD2'];
	$BR_ADD3 = $row1['BR_ADD3'];
	$BR_ADD4 = $row1['BR_ADD4'];
	$FIRST_CUST_CONTACT = $row1['FIRST_CUST_CONTACT'];
	$SECOND_CUST_CONTACT = $row1['SECOND_CUST_CONTACT'];
	$THIRD_CUST_CONTACT = $row1['THIRD_CUST_CONTACT'];
    $ROOT_SERVICE_ID = $row1['ROOT_SERVICE_ID'];
	$PS_NUMBER = $row1['PS_NUMBER'];
	$BS_NUMBER = $row1['BS_NUMBER'];
	$HANDOVER_STATUS = $row1['HANDOVER_STATUS'];
	$BKP_TYPE = $row1['BKP_TYPE'];
	$BKP_NO = $row1['BKP_NO'];
	$ISDN_LOGIN_ID = $row1['ISDN_LOGIN_ID'];
	$LAN_IP_ADDR = $row1['LAN_IP_ADDR'];
	$HQ_IP_ADDR = $row1['HQ_IP_ADDR'];
	$ISDN_PE_PRIMARY = $row1['ISDN_PE_PRIMARY'];
	$ISDN_PE_SECONDARY = $row1['ISDN_PE_SECONDARY'];
	$CROCS_TACACS = $row1['CROCS_TACACS'];
	$CROCS_KIWI = $row1['CROCS_KIWI'];
	$CROCS_CDF_SIGN_OFF_DATE = $row1['CROCS_CDF_SIGN_OFF_DATE'];
	$CROCS_CDF_PERSONNEL = $row1['CROCS_CDF_PERSONNEL'];
	$CROCS_TUNNEL_IP = $row1['CROCS_TUNNEL_IP'];
	$CROCS_LOOPBACK_IP = $row1['CROCS_LOOPBACK_IP'];
	$CROCS_CR_NOTES = $row1['CROCS_CR_NOTES'];
	$CROCS_CR_ORDER_NUMBER = $row1['CROCS_CR_ORDER_NUMBER'];
	$CROCS_CE_MANAGEMENT = $row1['CROCS_CE_MANAGEMENT'];
	$CROCS_CE_SERIAL_NUMBER = $row1['CROCS_CE_SERIAL_NUMBER'];
	$CROCS_ROUTER_TYPE = $row1['CROCS_ROUTER_TYPE'];
	$CROCS_ROUTER_MODEL = $row1['CROCS_ROUTER_MODEL'];
	$CROCS_LATEST_PM_DATE = $row1['CROCS_LATEST_PM_DATE'];
	$CROCS_UPDATE_DATE = $row1['CROCS_UPDATE_DATE'];
    $CROCS_UPDATE_USER_ID = $row1['CROCS_UPDATE_USER_ID'];
	$CROCS_ORDER_TYPE = $row1['CROCS_ORDER_TYPE'];
	$CROCS_ASSET_STATUS = $row1['CROCS_ASSET_STATUS'];
	$CROCS_ROUTER_PACKAGE = $row1['CROCS_ROUTER_PACKAGE'];
	$CROCS_BANDWIDTH_SVC = $row1['CROCS_BANDWIDTH_SVC'];
	$CROCS_ROUTING_PROTOCOL = $row1['CROCS_ROUTING_PROTOCOL'];    
    $CROCS_SVC_INSTALL_DATE = $row1['CROCS_SVC_INSTALL_DATE'];
   	$CROCS_SERVICE_LEVEL = $row1['CROCS_SERVICE_LEVEL'];
	$CROCS_QOS_SVC = $row1['CROCS_QOS_SVC'];
    $CROCS_CPE_ID = $row1['CROCS_CPE_ID'];
	$CROCS_WAN_CPE_INTERFACE = $row1['CROCS_WAN_CPE_INTERFACE'];
	$CROCS_CE_LEASING_CONTRACT_NO = $row1['CROCS_CE_LEASING_CONTRACT_NO'];
	$CROCS_CE_LEASING_EXPIRY_DATE = $row1['CROCS_CE_LEASING_EXPIRY_DATE'];
	$CROCS_CE_PURCHACE_ORDER_NO = $row1['CROCS_CE_PURCHACE_ORDER_NO'];
	$CROCS_CE_INVOICE_NO = $row1['CROCS_CE_INVOICE_NO'];    
    $CROCS_CR_CREATED_DATE = $row1['CROCS_CR_CREATED_DATE'];
    $CROCS_CE_PARTNER_MGMT = $row1['CROCS_CE_PARTNER_MGMT'];
   	$CROCS_CR_TYPE = $row1['CROCS_CR_TYPE'];
	$CROCS_CR_STATUS = $row1['CROCS_CR_STATUS'];
	$CROCS_CTT_DESCRIPTION = $row1['CROCS_CTT_DESCRIPTION'];    
    $CROCS_CTT_CAUSE_CATEGORY = $row1['CROCS_CTT_CAUSE_CATEGORY'];
   	$CROCS_CTT_CAUSE_CODE = $row1['CROCS_CTT_CAUSE_CODE'];
	$CROCS_CTT_RESOLUTION_CODE = $row1['CROCS_CTT_RESOLUTION_CODE'];
    $CROCS_CTT_CLOSED_BY_NAME = $row1['CROCS_CTT_CLOSED_BY_NAME'];
	$CROCS_CTT_CLOSED_BY_TEAM = $row1['CROCS_CTT_CLOSED_BY_NAME'];
	$CROCS_PM_DESCRIPTION = $row1['CROCS_PM_DESCRIPTION'];
	$CROCS_CTT_NUMBER = $row1['CROCS_CTT_NUMBER'];
	$CROCS_CTT_CREATED_DATE = $row1['CROCS_CTT_CREATED_DATE'];
	$CROCS_CTT_CLOSED_DATE = $row1['CROCS_CTT_CLOSED_DATE'];    
    $CROCS_CTT_PRIORITY = $row1['CROCS_CTT_PRIORITY'];
    $CROCS_CTT_SVC_LEG = $row1['CROCS_CTT_SVC_LEG'];
 
 //   $Num_Rows = oci_fetch_all($stid1, $Result);
    
//    for($i=0;$i<$Num_Rows;$i++)
//    { 

$attachment = '';
$attachment1 = '';
//Get latest Attachment
 $sqlAttach = "SELECT CA1.CROCS_FILE_NAME ";
 $sqlAttach = $sqlAttach."FROM DATA_MAPPING_CROCS_ATTACHMENT CA1 WHERE CROCS_ATTACHMENT_TYPE = 'CA' ";
 $sqlAttach = $sqlAttach."AND CROCS_LV_NUMBER = '".$CE_HOSTNAME."' ";
 $sqlAttach = $sqlAttach."AND CA1.CROCS_UPLOAD_DATE = (SELECT MAX(CA2.CROCS_UPLOAD_DATE) FROM DATA_MAPPING_CROCS_ATTACHMENT CA2 WHERE CA1.CROCS_LV_NUMBER = CA2.CROCS_LV_NUMBER) "; 
 $stidAttach = oci_parse($cemdb, $sqlAttach);
 oci_execute($stidAttach);
 if (!$stidAttach) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
	oci_define_by_name($stidAttach, 'CROCS_FILE_NAME', $CROCS_FILE_NAME_CA);
 }
if (($rowAttach = oci_fetch_assoc($stidAttach)) != false) {
    $CROCS_FILE_NAME_CA = $rowAttach['CROCS_FILE_NAME'];
    $attachment = $CROCS_FILE_NAME_CA;
}
else{
    $attachment = '';
}
  

 $sqlAttach1 = "SELECT CA1.CROCS_FILE_NAME ";
 $sqlAttach1 = $sqlAttach1."FROM DATA_MAPPING_CROCS_ATTACHMENT CA1 WHERE CROCS_ATTACHMENT_TYPE = 'HA' ";
 $sqlAttach1 = $sqlAttach1."AND CROCS_LV_NUMBER = '".$CE_HOSTNAME."' ";
 $sqlAttach1 = $sqlAttach1."AND CA1.CROCS_UPLOAD_DATE = (SELECT MAX(CA2.CROCS_UPLOAD_DATE) FROM DATA_MAPPING_CROCS_ATTACHMENT CA2 WHERE CA1.CROCS_LV_NUMBER = CA2.CROCS_LV_NUMBER) "; 
 $stidAttach1 = oci_parse($cemdb, $sqlAttach1);
 oci_execute($stidAttach1);
 if (!$stidAttach1) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
	oci_define_by_name($stidAttach1, 'CROCS_FILE_NAME', $CROCS_FILE_NAME_HA);
 }
if (($rowAttach1 = oci_fetch_assoc($stidAttach1)) != false) {
    $CROCS_FILE_NAME_HA = $rowAttach1['CROCS_FILE_NAME'];
    $attachment1 = $CROCS_FILE_NAME_HA;
}
else{
    $attachment1 = '';
}
    
    $rowcount =  $rowcount+1;
    echo $rowcount." \t ";
    echo $CE_HOSTNAME." \t ";
    echo $CROCS_SVC_INSTALL_DATE." \t ";
    echo $CROCS_CDF_SIGN_OFF_DATE." \t ";
    echo $CROCS_CDF_PERSONNEL." \t ";
    echo $HANDOVER_STATUS." \t ";
    echo $CROCS_TACACS." \t ";
    echo $CROCS_KIWI." \t ";
    echo $CROCS_CE_MANAGEMENT." \t ";
    echo $CROCS_CE_SERIAL_NUMBER." \t ";
    echo $CROCS_ROUTER_TYPE." \t ";
    echo $CROCS_ROUTER_MODEL." \t ";
    echo $CROCS_ORDER_TYPE." \t ";
    echo $CROCS_ASSET_STATUS." \t ";
    echo $CROCS_ROUTER_PACKAGE." \t ";
    echo $CROCS_BANDWIDTH_SVC." \t ";
    echo $CROCS_ROUTING_PROTOCOL." \t ";
    echo $CROCS_SERVICE_LEVEL." \t ";
    echo $CROCS_QOS_SVC." \t ";
    echo $CROCS_CPE_ID." \t ";
    echo $CROCS_WAN_CPE_INTERFACE." \t ";
    echo $CROCS_CE_PARTNER_MGMT." \t ";
    echo $CROCS_CE_LEASING_CONTRACT_NO." \t ";
    echo $CROCS_CE_LEASING_EXPIRY_DATE." \t ";
    echo $CROCS_CE_PURCHACE_ORDER_NO." \t ";
    echo $CROCS_CE_INVOICE_NO." \t ";
    echo $CROCS_CR_NOTES." \t ";
    echo $CROCS_CR_ORDER_NUMBER." \t ";
    echo $CROCS_CR_CREATED_DATE." \t ";
    echo $CROCS_CR_TYPE." \t ";
    echo $CROCS_CR_STATUS." \t ";
    echo $CROCS_CTT_NUMBER." \t ";
    echo $CROCS_CTT_CREATED_DATE." \t ";
    echo $CROCS_CTT_CLOSED_DATE." \t ";
    echo $CROCS_CTT_PRIORITY." \t ";
    echo $CROCS_CTT_SVC_LEG." \t ";
    echo $CROCS_CTT_DESCRIPTION." \t ";
    echo $CROCS_CTT_CAUSE_CATEGORY." \t ";
    echo $CROCS_CTT_CAUSE_CODE." \t ";
    echo $CROCS_CTT_RESOLUTION_CODE." \t ";
    echo $CROCS_CTT_CLOSED_BY_NAME." \t ";
    echo $CROCS_CTT_CLOSED_BY_TEAM." \t ";
    echo $CROCS_LATEST_PM_DATE." \t ";
    echo $CROCS_PM_DESCRIPTION." \t ";
    echo $CROCS_TUNNEL_IP." \t ";
    echo $CROCS_LOOPBACK_IP." \t ";
    echo $LAN_IP_ADDR." \t ";
    echo $CROCS_UPDATE_DATE." \t ";
    echo $CROCS_UPDATE_USER_ID." \t ";
    echo $attachment." \t ";
    echo $attachment1." \t ";
    //echo "Test \t ";
    //echo "TEST \t ";
    echo $CE_HOSTNAME_REAL." \t ";
    echo $CUST_SEGMENT." \t ";
    echo $REGION." \t ";
    echo $STATE." \t ";
    echo $CUST_SITE_NAME." \t ";
    echo $SERVICE_ID." \t ";
    echo $CE_WAN_IP_ADDR." \t ";
    echo $CE_BKP_IP_ADDR." \t ";
    echo $RESELLER." \t ";
    echo $NODE_PE." \t ";
    echo $CUST_NAME." \t ";
    echo $CUST_ID." \t ";
    echo $SVC_TYPE." \t ";
    echo $BR_CODE." \t ";
    echo $BR_NAME." \t ";
    echo $BR_ADD1." \t ";
    echo $BR_ADD2." \t ";
    echo $BR_ADD3." \t ";
    echo $BR_ADD4." \t ";
    echo $FIRST_CUST_CONTACT." \t ";
    echo $SECOND_CUST_CONTACT." \t ";
    echo $THIRD_CUST_CONTACT." \t ";
    echo $CE_HOSTNAME." \t ";
    echo $PS_NUMBER." \t ";
    echo $BS_NUMBER." \t ";
    echo $HANDOVER_STATUS." \t ";
    echo $BKP_TYPE." \t ";
    echo $BKP_NO." \t ";
    echo $ISDN_LOGIN_ID." \t ";
    echo $ISDN_PE_PRIMARY." \t ";
    echo $ISDN_PE_SECONDARY." \t ";
    echo $LAN_IP_ADDR." \t ";
    echo $HQ_IP_ADDR." \r\n ";
    

    }
$data = ob_get_contents();
file_put_contents('download/'.$filename, $data);
//flush();
 //readfile($filename);
 
 ?>