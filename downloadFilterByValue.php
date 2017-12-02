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
 $filename = "crocs_filter_by_value_" . date('Ymd') . ".xls"; 
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
 $flag = false;
    $where = " WHERE ".$Select_Field." LIKE '%".$Sel_Field_Value."%'"; 
    $sql = "SELECT CROCS_ORDER_SVC_ID, CROCS_CUST_NAME, CROCS_CUST_SITE_NAME, CROCS_CUST_ID, CROCS_REGION, CROCS_STATE,CROCS_RESELLER,";
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
    $sql = $sql."CROCS_UPDATED_BY,CROCS_MANAGED_IND,CROCS_MONITOR_IND ";
    $sql = $sql."FROM DATA_MAPPING_CROCS".$where;

 $stid1 = oci_parse($cemdb, $sql);
 $result1 = oci_execute($stid1);
   
   if(!$stid1) {
    echo "An error occurred in parsing the sql string.\n";
    exit;
    } 
   else{
	oci_define_by_name($stid1, 'CROCS_ORDER_SVC_ID', $CROCS_ORDER_SVC_ID); 	
 	oci_define_by_name($stid1, 'CROCS_CUST_NAME', $CROCS_CUST_NAME);
	oci_define_by_name($stid1, 'CROCS_CUST_SITE_NAME', $CROCS_CUST_SITE_NAME);
	oci_define_by_name($stid1, 'CROCS_CUST_ID', $CROCS_CUST_ID);
	oci_define_by_name($stid1, 'CROCS_REGION', $CROCS_REGION);
	oci_define_by_name($stid1, 'CROCS_STATE', $CROCS_STATE);
	oci_define_by_name($stid1, 'CROCS_RESELLER', $CROCS_RESELLER);
	oci_define_by_name($stid1, 'CROCS_NODE_PE', $CROCS_NODE_PE);   
	oci_define_by_name($stid1, 'CROCS_BR_CODE', $CROCS_BR_CODE);
	oci_define_by_name($stid1, 'CROCS_BR_ADD_1', $CROCS_BR_ADD_1);
	oci_define_by_name($stid1, 'CROCS_BR_ADD_2', $CROCS_BR_ADD_2);
	oci_define_by_name($stid1, 'CROCS_BR_ADD_3', $CROCS_BR_ADD_3);
	oci_define_by_name($stid1, 'CROCS_BR_ADD_4', $CROCS_BR_ADD_4); 
	oci_define_by_name($stid1, 'CROCS_CUST_CONTACT_1', $CROCS_CUST_CONTACT_1);
	oci_define_by_name($stid1, 'CROCS_CUST_CONTACT_2', $CROCS_CUST_CONTACT_2);
	oci_define_by_name($stid1, 'CROCS_CUST_CONTACT_3', $CROCS_CUST_CONTACT_3);
    oci_define_by_name($stid1, 'CROCS_SVC_INSTALL_DATE', $CROCS_SVC_INSTALL_DATE);	
    oci_define_by_name($stid1, 'CROCS_PRODUCT_NAME', $CROCS_PRODUCT_NAME);
    oci_define_by_name($stid1, 'CROCS_LOB', $CROCS_LOB);    
	oci_define_by_name($stid1, 'CROCS_COB', $CROCS_COB);            
 	oci_define_by_name($stid1, 'CROCS_TACACS', $CROCS_TACACS);
	oci_define_by_name($stid1, 'CROCS_KIWI', $CROCS_KIWI);       
    oci_define_by_name($stid1, 'CROCS_CE_MGMT', $CROCS_CE_MGMT);
    oci_define_by_name($stid1, 'CROCS_ASSET_STATUS', $CROCS_ASSET_STATUS);   
	oci_define_by_name($stid1, 'CROCS_PS_ID', $CROCS_PS_ID);    
	oci_define_by_name($stid1, 'CROCS_PS_LEVEL', $CROCS_PS_LEVEL);
	oci_define_by_name($stid1, 'CROCS_PS_BANDWIDTH', $CROCS_PS_BANDWIDTH);    
	oci_define_by_name($stid1, 'CROCS_PS_ACCESS_TYPE', $CROCS_PS_ACCESS_TYPE);
	oci_define_by_name($stid1, 'CROCS_PS_ROUTING_PROTOCOL', $CROCS_PS_ROUTING_PROTOCOL);
	oci_define_by_name($stid1, 'CROCS_PS_CE_WAN_IP', $CROCS_PS_CE_WAN_IP);
	oci_define_by_name($stid1, 'CROCS_PS_FRAMED_IP', $CROCS_PS_FRAMED_IP);    
	oci_define_by_name($stid1, 'CROCS_BS_ID', $CROCS_BS_ID);
	oci_define_by_name($stid1, 'CROCS_BS_LEVEL', $CROCS_BS_LEVEL);
	oci_define_by_name($stid1, 'CROCS_BS_BANDWIDTH', $CROCS_BS_BANDWIDTH);    
	oci_define_by_name($stid1, 'CROCS_BS_ACCESS_TYPE', $CROCS_BS_ACCESS_TYPE);
	oci_define_by_name($stid1, 'CROCS_BS_ROUTING_PROTOCOL', $CROCS_BS_ROUTING_PROTOCOL);
	oci_define_by_name($stid1, 'CROCS_BS_CE_WAN_IP', $CROCS_BS_CE_WAN_IP);
	oci_define_by_name($stid1, 'CROCS_BS_FRAMED_IP', $CROCS_BS_FRAMED_IP); 
	oci_define_by_name($stid1, 'CROCS_QOS', $CROCS_QOS);
	oci_define_by_name($stid1, 'CROCS_PROFILE', $CROCS_PROFILE);    
	oci_define_by_name($stid1, 'CROCS_USERNAME', $CROCS_USERNAME);
	oci_define_by_name($stid1, 'CROCS_PASSWORD', $CROCS_PASSWORD);
	oci_define_by_name($stid1, 'CROCS_FRAMED_PROTOCOL', $CROCS_FRAMED_PROTOCOL);
	oci_define_by_name($stid1, 'CROCS_INPUT_POLICY', $CROCS_INPUT_POLICY);    
	oci_define_by_name($stid1, 'CROCS_OUTPUT_POLICY', $CROCS_OUTPUT_POLICY);            
	oci_define_by_name($stid1, 'CROCS_HQ_IP', $CROCS_HQ_IP);    
    oci_define_by_name($stid1, 'CROCS_LAN_IP', $CROCS_LAN_IP);
    oci_define_by_name($stid1, 'CROCS_LOOPBACK_IP', $CROCS_LOOPBACK_IP);
    oci_define_by_name($stid1, 'CROCS_TUNNEL_IP', $CROCS_TUNNEL_IP);
    oci_define_by_name($stid1, 'CROCS_UPE_LOOPBACK_IP', $CROCS_UPE_OOPBACK_IP);
    oci_define_by_name($stid1, 'CROCS_CE_SERIAL_NO', $CROCS_CE_SERIAL_NO);
    oci_define_by_name($stid1, 'CROCS_ROUTER_TYPE', $CROCS_ROUTER_TYPE);
    oci_define_by_name($stid1, 'CROCS_ROUTER_MODEL', $CROCS_ROUTER_MODEL);    
    oci_define_by_name($stid1, 'CROCS_ROUTER_PACKAGE', $CROCS_ROUTER_PACKAGE);    
    oci_define_by_name($stid1, 'CROCS_CPE_ID', $CROCS_CPE_ID);
    oci_define_by_name($stid1, 'CROCS_WAN_CE_INTERFACE', $CROCS_WAN_CE_INTERFACE);
    oci_define_by_name($stid1, 'CROCS_ROUTER_STATUS', $CROCS_ROUTER_STATUS);   
    oci_define_by_name($stid1, 'CROCS_WARRANTY_DATE', $CROCS_WARRANTY_DATE);           
    oci_define_by_name($stid1, 'CROCS_CE_PARTNER_MGMT', $CROCS_CE_PARTNER_MGMT);
    oci_define_by_name($stid1, 'CROCS_CE_LEASE_CONTRACT_NO', $CROCS_CE_LEASE_CONTRACT_NO);
    oci_define_by_name($stid1, 'CROCS_CE_EXPIRY_DATE', $CROCS_CE_EXPIRY_DATE);
    oci_define_by_name($stid1, 'CROCS_CE_PO_NO', $CROCS_CE_PO_NO);
    oci_define_by_name($stid1, 'CROCS_CE_INVOCE_NO', $CROCS_CE_INVOCE_NO);
    oci_define_by_name($stid1, 'CROCS_CDF_SIGN_OFF_DATE', $CROCS_CDF_SIGN_OFF_DATE);
    oci_define_by_name($stid1, 'CROCS_CDF_PERSONNEL', $CROCS_CDF_PERSONNEL);    
	oci_define_by_name($stid1, 'CROCS_HO_ORDER_TYPE', $CROCS_HO_ORDER_TYPE);
	oci_define_by_name($stid1, 'CROCS_HO_STATUS', $CROCS_HO_STATUS);    
	oci_define_by_name($stid1, 'CROCS_HO_REMARKS', $CROCS_HO_REMARKS);        
	oci_define_by_name($stid1, 'CROCS_HO_ACTIVITY_COMMENT', $CROCS_HO_ACTIVITY_COMMENT);        
    oci_define_by_name($stid1, 'CROCS_CR_ORDER_NO', $CROCS_CR_ORDER_NO);
    oci_define_by_name($stid1, 'CROCS_CR_DESC', $CROCS_CR_DESC);
    oci_define_by_name($stid1, 'CROCS_CR_CREATED_DATE', $CROCS_CR_CREATED_DATE);
    oci_define_by_name($stid1, 'CROCS_CR_ORDER_TYPE', $CROCS_CR_ORDER_TYPE);
    oci_define_by_name($stid1, 'CROCS_CR_STATUS', $CROCS_CR_STATUS);
    oci_define_by_name($stid1, 'CROCS_CTT_NO', $CROCS_CTT_NO);    
    oci_define_by_name($stid1, 'CROCS_CTT_CREATED_DATE', $CROCS_CTT_CREATED_DATE);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_DATE', $CROCS_CTT_CLOSED_DATE);
    oci_define_by_name($stid1, 'CROCS_CTT_PRIORITY', $CROCS_CTT_PRIORITY);
    oci_define_by_name($stid1, 'CROCS_CTT_SVC_LEG', $CROCS_CTT_SVC_LEG);
    oci_define_by_name($stid1, 'CROCS_CTT_DESC', $CROCS_CTT_DESC);
    oci_define_by_name($stid1, 'CROCS_CTT_CAUSE_CAT', $CROCS_CTT_CAUSE_CAT);
    oci_define_by_name($stid1, 'CROCS_CTT_CAUSE_CODE', $CROCS_CTT_CAUSE_CODE);
    oci_define_by_name($stid1, 'CROCS_CTT_RES_CODE', $CROCS_CTT_RES_CODE);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_NAME', $CROCS_CTT_CLOSED_NAME);
    oci_define_by_name($stid1, 'CROCS_CTT_CLOSED_TEAM', $CROCS_CTT_CLOSED_TEAM);
    oci_define_by_name($stid1, 'CROCS_LATEST_PM_DATE', $CROCS_LATEST_PM_DATE);
    oci_define_by_name($stid1, 'CROCS_PM_DESC', $CROCS_PM_DESC);
    oci_define_by_name($stid1, 'CROCS_UPDATED_DATE', $CROCS_UPDATED_DATE);
    oci_define_by_name($stid1, 'CROCS_UPDATED_BY', $CROCS_UPDATED_BY);
    oci_define_by_name($stid1, 'CROCS_MANAGED_IND', $CROCS_MANAGED_IND);
    oci_define_by_name($stid1, 'CROCS_MONITOR_IND', $CROCS_MONITOR_IND); 
    }

 $rowcount = 0;
 
 echo "No.\tOrder Service ID\tCustomer Name\tCustomer Site Name\tCustomer ID\tRegion\tState\tReseller\tNode/PE\tBranch Code\tBr Address1\tBr Address2\tBr Address3\tBr Address4\tFirst Cust Contact\tSecond Cust Contact\tThird Cust Contact\tService Installation Date\tProduct Name\tLine of Business\tCode of Business\tTACACS\tKIWI\tCE Management\tAsset Status\tPrimary Service ID\tPrimary Service Level\tPrimary Service Bandwidth\tPrimary Service ID Access Type\tPS_Routing Protocol\tPS_CE WAN IP Address\tPS_Framed IP Address\tSecondary Service ID\tSecondary Service Level\tSecondary Service Bandwidth\tSec. Service ID Access Type\tBS_Routing Protocol\tBS_CE WAN IP Address\tBS_Framed IP Address\tQOS\tProfile\tUsername\tPassword\tFramed Protocol\tInput Policy\tOutput Policy\tHQ IP\tLAN IP\tLoopback IP\tTunnel IP\tUPE Loopback IP\tCE Serial Number\tRouter Type\tRouter Model\tRouter Package\tCPE ID\tWAN CPE Interface\tRouter Status\tWarranty Date\tCE Partner Management\tCE Leasing Contract No.\tCE Leasing Expiry Date\tCE Purchase Order (PO) No.\tCE Invoice No\tCDF Sign Off Date\tCDF Personnel\tHandover Order Type\tHandover Status\tHandover Remark/ Notes\tHandover Activity Comments\tCR Order  No.\tCR Description\tCR Created Date\tCR Order Type\tCR Status\tCTT Number\tCTT Created Date\tCTT Closed Date\tCTT Priority\tCTT Service/ Leg For Which Ticket is Raised\t CTT Description\tCTT Cause Category\tCTT Cause Code\tCTT Resolution Code\tCTT Closed By Name\tCTT Closed by Team\tLatest Preventive Maintenance Date\tPreventive Maintenance Description\tLast Updated Date\tUpdated By\tLatest Configuration Attachment\tLatest Handover Attachment\r\n";
 
 while ($row1 = oci_fetch_assoc($stid1)) {
 	$CROCS_ORDER_SVC_ID = $row1['CROCS_ORDER_SVC_ID'];    
    $CROCS_CUST_NAME = $row1['CROCS_CUST_NAME'];
	$CROCS_CUST_SITE_NAME = $row1['CROCS_CUST_SITE_NAME'];    
	$CROCS_CUST_ID = $row1['CROCS_CUST_ID'];
	$CROCS_REGION = $row1['CROCS_REGION'];
	$CROCS_STATE = $row1['CROCS_STATE'];    
	$CROCS_RESELLER = $row1['CROCS_RESELLER'];
	$CROCS_NODE_PE = $row1['CROCS_NODE_PE'];
	$CROCS_BR_CODE = $row1['CROCS_BR_CODE'];
	$CROCS_BR_ADD_1 = $row1['CROCS_BR_ADD_1'];
	$CROCS_BR_ADD_2 = $row1['CROCS_BR_ADD_2'];
	$CROCS_BR_ADD_3 = $row1['CROCS_BR_ADD_3'];
	$CROCS_BR_ADD_4 = $row1['CROCS_BR_ADD_4']; 
	$CROCS_CUST_CONTACT_1 = $row1['CROCS_CUST_CONTACT_1'];
	$CROCS_CUST_CONTACT_2 = $row1['CROCS_CUST_CONTACT_2'];
	$CROCS_CUST_CONTACT_3 = $row1['CROCS_CUST_CONTACT_3'];
    $CROCS_SVC_INSTALL_DATE = $row1['CROCS_SVC_INSTALL_DATE'];
   	$CROCS_PRODUCT_NAME = $row1['CROCS_PRODUCT_NAME'];
    $CROCS_LOB = $row1['CROCS_LOB'];   
    $CROCS_COB = $row1['CROCS_COB'];     
	$CROCS_TACACS = $row1['CROCS_TACACS'];
	$CROCS_KIWI = $row1['CROCS_KIWI'];    
	$CROCS_CE_MGMT = $row1['CROCS_CE_MGMT'];    
	$CROCS_ASSET_STATUS = $row1['CROCS_ASSET_STATUS'];
	$CROCS_PS_ID = $row1['CROCS_PS_ID'];
	$CROCS_PS_LEVEL = $row1['CROCS_PS_LEVEL'];
    $CROCS_PS_BANDWIDTH = $row1['CROCS_PS_BANDWIDTH'];
    $CROCS_PS_ACCESS_TYPE = $row1['CROCS_PS_ACCESS_TYPE'];
	$CROCS_PS_ROUTING_PROTOCOL = $row1['CROCS_PS_ROUTING_PROTOCOL'];
	$CROCS_PS_CE_WAN_IP = $row1['CROCS_PS_CE_WAN_IP'];
	$CROCS_PS_FRAMED_IP = $row1['CROCS_PS_FRAMED_IP']; 
	$CROCS_BS_ID = $row1['CROCS_BS_ID'];
	$CROCS_BS_LEVEL = $row1['CROCS_BS_LEVEL'];
    $CROCS_BS_BANDWIDTH = $row1['CROCS_BS_BANDWIDTH'];
    $CROCS_BS_ACCESS_TYPE = $row1['CROCS_BS_ACCESS_TYPE'];
	$CROCS_BS_ROUTING_PROTOCOL = $row1['CROCS_BS_ROUTING_PROTOCOL'];
	$CROCS_BS_CE_WAN_IP = $row1['CROCS_BS_CE_WAN_IP'];
	$CROCS_BS_FRAMED_IP = $row1['CROCS_BS_FRAMED_IP']; 
	$CROCS_QOS = $row1['CROCS_QOS'];
    $CROCS_PROFILE = $row1['CROCS_PROFILE'];
    $CROCS_USERNAME = $row1['CROCS_USERNAME'];
	$CROCS_PASSWORD = $row1['CROCS_PASSWORD'];
	$CROCS_FRAMED_PROTOCOL = $row1['CROCS_FRAMED_PROTOCOL'];
	$CROCS_INPUT_POLICY = $row1['CROCS_INPUT_POLICY'];
	$CROCS_OUTPUT_POLICY = $row1['CROCS_OUTPUT_POLICY'];
	$CROCS_HQ_IP = $row1['CROCS_HQ_IP'];               
	$CROCS_LAN_IP = $row1['CROCS_LAN_IP'];
	$CROCS_LOOPBACK_IP = $row1['CROCS_LOOPBACK_IP'];
	$CROCS_TUNNEL_IP = $row1['CROCS_TUNNEL_IP'];
	$CROCS_UPE_LOOPBACK_IP = $row1['CROCS_UPE_LOOPBACK_IP'];
	$CROCS_CE_SERIAL_NO = $row1['CROCS_CE_SERIAL_NO'];            
	$CROCS_ROUTER_TYPE = $row1['CROCS_ROUTER_TYPE'];
	$CROCS_ROUTER_MODEL = $row1['CROCS_ROUTER_MODEL'];        
	$CROCS_ROUTER_PACKAGE = $row1['CROCS_ROUTER_PACKAGE'];        
    $CROCS_CPE_ID = $row1['CROCS_CPE_ID'];
	$CROCS_WAN_CE_INTERFACE = $row1['CROCS_WAN_CE_INTERFACE'];
	$CROCS_ROUTER_STATUS = $row1['CROCS_ROUTER_STATUS'];
	$CROCS_WARRANTY_DATE = $row1['CROCS_WARRANTY_DATE'];    
    $CROCS_CE_PARTNER_MGMT = $row1['CROCS_CE_PARTNER_MGMT'];        
	$CROCS_CE_LEASE_CONTRACT_NO = $row1['CROCS_CE_LEASE_CONTRACT_NO'];
	$CROCS_CE_EXPIRY_DATE = $row1['CROCS_CE_EXPIRY_DATE'];
	$CROCS_CE_PO_NO = $row1['CROCS_CE_PO_NO'];
	$CROCS_CE_INVOCE_NO = $row1['CROCS_CE_INVOCE_NO']; 
	$CROCS_CDF_SIGN_OFF_DATE = $row1['CROCS_CDF_SIGN_OFF_DATE'];
	$CROCS_CDF_PERSONNEL = $row1['CROCS_CDF_PERSONNEL'];    
	$CROCS_HO_ORDER_TYPE = $row1['CROCS_HO_ORDER_TYPE'];    
	$CROCS_HO_STATUS = $row1['CROCS_HO_STATUS'];
	$CROCS_HO_REMARKS = $row1['CROCS_HO_REMARKS'];                           
	$CROCS_HO_ACTIVITY_COMMENT = $row1['CROCS_HO_ACTIVITY_COMMENT'];	
    $CROCS_CR_ORDER_NO = $row1['CROCS_CR_ORDER_NO'];
	$CROCS_CR_DESC = $row1['CROCS_CR_DESC'];
    $CROCS_CR_CREATED_DATE = $row1['CROCS_CR_CREATED_DATE'];
	$CROCS_CR_ORDER_TYPE = $row1['CROCS_CR_ORDER_TYPE'];
	$CROCS_CR_STATUS = $row1['CROCS_CR_STATUS'];
	$CROCS_CTT_NO = $row1['CROCS_CTT_NO'];
	$CROCS_CTT_CREATED_DATE = $row1['CROCS_CTT_CREATED_DATE'];
	$CROCS_CTT_CLOSED_DATE = $row1['CROCS_CTT_CLOSED_DATE'];
    $CROCS_CTT_PRIORITY = $row1['CROCS_CTT_PRIORITY'];
    $CROCS_CTT_SVC_LEG = $row1['CROCS_CTT_SVC_LEG'];
	$CROCS_CTT_DESC = $row1['CROCS_CTT_DESC'];    
    $CROCS_CTT_CAUSE_CAT = $row1['CROCS_CTT_CAUSE_CAT'];
   	$CROCS_CTT_CAUSE_CODE = $row1['CROCS_CTT_CAUSE_CODE'];
    $CROCS_CTT_CLOSED_NAME = $row1['CROCS_CTT_CLOSED_NAME'];
	$CROCS_CTT_CLOSED_TEAM = $row1['CROCS_CTT_CLOSED_TEAM'];
    $CROCS_LATEST_PM_DATE = $row1['CROCS_LATEST_PM_DATE']; 
   	$CROCS_PM_DESC = $row1['CROCS_PM_DESC'];     
   	$CROCS_UPDATED_DATE = $row1['CROCS_UPDATED_DATE'];
	$CROCS_UPDATED_BY = $row1['CROCS_UPDATED_BY'];  
    
$attachment = '';
$attachment1 = '';
//Get latest Attachment
 $sqlAttach = "SELECT CA1.CROCS_FILE_NAME ";
 $sqlAttach = $sqlAttach."FROM DATA_MAPPING_CROCS_ATTACHMENT CA1 WHERE CROCS_ATTACHMENT_TYPE = 'CA' ";
 $sqlAttach = $sqlAttach."AND CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."' ";
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
 $sqlAttach1 = $sqlAttach1."AND CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."' ";
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
    echo $rowcount."\t";
    echo $CROCS_ORDER_SVC_ID."\t";
    echo $CROCS_CUST_NAME."\t";
    echo $CROCS_CUST_SITE_NAME."\t";
    echo $CROCS_CUST_ID."\t";
    echo $CROCS_REGION."\t";
    echo $CROCS_STATE."\t";
    echo $CROCS_RESELLER."\t";
    echo $CROCS_NODE_PE."\t";
    echo $CROCS_BR_CODE."\t";
    echo $CROCS_BR_ADD_1."\t";
    echo $CROCS_BR_ADD_2."\t";
    echo $CROCS_BR_ADD_3."\t";
    echo $CROCS_BR_ADD_4."\t"; 
    echo $CROCS_CUST_CONTACT_1."\t";
    echo $CROCS_CUST_CONTACT_2."\t";
    echo $CROCS_CUST_CONTACT_3."\t";
    echo $CROCS_SVC_INSTALL_DATE."\t";
    echo $CROCS_PRODUCT_NAME."\t";
    echo $CROCS_LOB."\t"; 
    echo $CROCS_COB."\t";
    echo $CROCS_TACACS."\t";
    echo $CROCS_KIWI."\t";
    echo $CROCS_CE_MGMT."\t";
    echo $CROCS_ASSET_STATUS."\t";
    echo $CROCS_PS_ID."\t";
    echo $CROCS_PS_LEVEL."\t"; 
    echo $CROCS_PS_BANDWIDTH."\t";
    echo $CROCS_PS_ACCESS_TYPE."\t";
    echo $CROCS_PS_ROUTING_PROTOCOL."\t";
    echo $CROCS_PS_CE_WAN_IP."\t";
    echo $CROCS_PS_FRAMED_IP."\t";
    echo $CROCS_BS_ID."\t"; 
    echo $CROCS_BS_LEVEL."\t";
    echo $CROCS_BS_BANDWIDTH."\t"; 
    echo $CROCS_BS_ACCESS_TYPE."\t";
    echo $CROCS_BS_ROUTING_PROTOCOL."\t";
    echo $CROCS_BS_CE_WAN_IP."\t";
    echo $CROCS_BS_FRAMED_IP."\t";   
    echo $CROCS_QOS."\t";
    echo $CROCS_PROFILE."\t";
    echo $CROCS_USERNAME."\t";
    echo $CROCS_PASSWORD."\t";
    echo $CROCS_FRAMED_PROTOCOL."\t";
    echo $CROCS_INPUT_POLICY."\t";
    echo $CROCS_OUTPUT_POLICY."\t";
    echo $CROCS_HQ_IP."\t";
    echo $CROCS_LAN_IP."\t";
    echo $CROCS_LOOPBACK_IP."\t";
    echo $CROCS_TUNNEL_IP."\t";
    echo $CROCS_UPE_LOOPBACK_IP."\t"; 
    echo $CROCS_CE_SERIAL_NO."\t"; 
    echo $CROCS_ROUTER_TYPE."\t";
    echo $CROCS_ROUTER_MODEL."\t";
    echo $CROCS_ROUTER_PACKAGE."\t";
    echo $CROCS_CPE_ID."\t";
    echo $CROCS_WAN_CE_INTERFACE."\t";
    echo $CROCS_ROUTER_STATUS."\t";
    echo $CROCS_WARRANTY_DATE."\t";
    echo $CROCS_CE_PARTNER_MGMT."\t";
    echo $CROCS_CE_LEASE_CONTRACT_NO."\t";
    echo $CROCS_CE_EXPIRY_DATE."\t";
    echo $CROCS_CE_PO_NO."\t";
    echo $CROCS_CE_INVOCE_NO."\t"; 
    echo $CROCS_CDF_SIGN_OFF_DATE."\t";
    echo $CROCS_CDF_PERSONNEL."\t";
    echo $CROCS_HO_ORDER_TYPE."\t";
    echo $CROCS_HO_STATUS."\t";
    echo $CROCS_HO_REMARKS."\t";
    echo $CROCS_HO_ACTIVITY_COMMENT."\t";   
    echo $CROCS_CR_ORDER_NO."\t";
    echo $CROCS_CR_DESC."\t";        
    echo $CROCS_CR_CREATED_DATE."\t"; 
    echo $CROCS_CR_ORDER_TYPE."\t";
    echo $CROCS_CR_STATUS."\t";
    echo $CROCS_CTT_NO."\t"; 
    echo $CROCS_CTT_CREATED_DATE."\t";
    echo $CROCS_CTT_CLOSED_DATE."\t";
    echo $CROCS_CTT_PRIORITY."\t"; 
    echo $CROCS_CTT_SVC_LEG."\t";
    echo $CROCS_CTT_DESC."\t";
    echo $CROCS_CTT_CAUSE_CAT."\t";
    echo $CROCS_CTT_CAUSE_CODE."\t";
    echo $CROCS_CTT_RES_CODE."\t";
    echo $CROCS_CTT_CLOSED_NAME."\t";
    echo $CROCS_CTT_CLOSED_TEAM."\t"; 
    echo $CROCS_LATEST_PM_DATE."\t";
    echo $CROCS_PM_DESC."\t";
    echo $CROCS_UPDATED_DATE."\t"; 
    echo $CROCS_UPDATED_BY."\t";     
    echo $attachment."\t";
    echo $attachment1."\r\n ";
    }
$data = ob_get_contents();
file_put_contents('download/'.$filename, $data);
//flush();
 //readfile($filename);
 
 ?>