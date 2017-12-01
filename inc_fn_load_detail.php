<?php
ini_set('memory_limit', '-1');
 set_time_limit(0); 
 include '../../inc/CROCSLogin.php'; 
 
 //Show progress bar
 //Calculate the percentation
 $sql = "SELECT COUNT(CE_HOSTNAME) AS COUNT FROM DATA_MAPPING";
 $stid = oci_parse($cemdb, $sql);
 $result = oci_execute($stid);
 $row = oci_fetch_assoc($stid);
 $rcdcount = $row ['COUNT'];
 $percent = "0%";
 $prevpercent = $percent;
// $percent = intval($ctr/$namelist["ctr"] * 100)."%";
 // Javascript for updating the progress bar and information
 echo '<script language="javascript">
 document.getElementById("information").innerHTML="Please wait. Performing data extraction... '.$percent.' completed.";
 </script>';
 // This is for the buffer achieve the minimum size in order to flush data
 echo str_repeat(' ',1024*64);
 // Send output to browser immediately
 flush();

 $sql1 = "SELECT ROOT_SERVICE_ID, CROCS_SVC_INSTALL_DATE, CROCS_CDF_SIGN_OFF_DATE, CROCS_CDF_PERSONNEL, HANDOVER_STATUS, ";
 $sql1 = $sql1."CROCS_TACACS, CROCS_KIWI, CROCS_CE_MANAGEMENT, CROCS_CE_SERIAL_NUMBER, CROCS_ROUTER_TYPE, CROCS_ROUTER_MODEL, ";
 $sql1 = $sql1."CROCS_ORDER_TYPE, CROCS_ASSET_STATUS, CROCS_ROUTER_PACKAGE, CROCS_BANDWIDTH_SVC, CROCS_ROUTING_PROTOCOL, "; 
 $sql1 = $sql1."CROCS_SERVICE_LEVEL, CROCS_QOS_SVC, CROCS_CPE_ID, CROCS_WAN_CPE_INTERFACE, CROCS_CE_PARTNER_MGMT, ";
 $sql1 = $sql1."CROCS_CE_LEASING_CONTRACT_NO, CROCS_CE_LEASING_EXPIRY_DATE, CROCS_CE_PURCHACE_ORDER_NO, CROCS_CE_INVOICE_NO, ";
 $sql1 = $sql1."CROCS_CR_ORDER_NUMBER, CROCS_CR_CREATED_DATE, CROCS_CR_TYPE, CROCS_CR_STATUS, CROCS_CTT_NUMBER, ";
 $sql1 = $sql1."CROCS_CTT_CREATED_DATE, CROCS_CTT_CLOSED_DATE, CROCS_CTT_PRIORITY, CROCS_CTT_SVC_LEG, CROCS_CTT_DESCRIPTION, ";
 $sql1 = $sql1."CROCS_CTT_CAUSE_CATEGORY, CROCS_CTT_CAUSE_CODE, CROCS_CTT_RESOLUTION_CODE, CROCS_CTT_CLOSED_BY_NAME, ";
 $sql1 = $sql1."CROCS_CTT_CLOSED_BY_TEAM, CROCS_LATEST_PM_DATE, CROCS_PM_DESCRIPTION, CROCS_TUNNEL_IP, CROCS_LOOPBACK_IP, ";
 $sql1 = $sql1."LAN_IP_ADDR, CROCS_UPDATE_DATE, CROCS_UPDATE_USER_ID, CE_HOSTNAME, CUST_SEGMENT, REGION, STATE, ";
 $sql1 = $sql1."CUST_SITE_NAME, SERVICE_ID, CE_WAN_IP_ADDR, CE_BKP_IP_ADDR, RESELLER, NODE_PE, CUST_NAME, CUST_ID, ";
 $sql1 = $sql1."SVC_TYPE, BR_CODE, BR_NAME, BR_ADD1, BR_ADD2, BR_ADD3, BR_ADD4, FIRST_CUST_CONTACT, SECOND_CUST_CONTACT, ";
 $sql1 = $sql1."THIRD_CUST_CONTACT, ROOT_SERVICE_ID, PS_NUMBER, BS_NUMBER, HANDOVER_STATUS, BKP_TYPE, BKP_NO, ISDN_LOGIN_ID, ";
 $sql1 = $sql1."ISDN_PE_PRIMARY, ISDN_PE_SECONDARY, LAN_IP_ADDR, HQ_IP_ADDR, CROCS_CR_NOTES ";
 $sql1 = $sql1."FROM DATA_MAPPING";
 $stid1 = oci_parse($cemdb, $sql1);
 $result1 = oci_execute($stid1);
 $row1 = oci_fetch_assoc($stid1);
 
 if (!$result1) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
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

 $rowcount = 1;
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
    /*//Get data_mapping_ext1 data
    $sql1 = "SELECT CE_Hostname, TACACS, KIWI, CDF_SIGN_OFF_DATE, CDF_PERSONNEL, HANDOVER_STATUS, TUNNEL_IP, LOOPBACK_IP, LAN_IP, CR_NOTES, CR_ORDER_NUMBER, CE_MANAGEMENT, CE_SERIAL_NUMBER, ROUTER_TYPE, ROUTER_MODEL, LATEST_PM_DATE, TransactionDate, UserID FROM data_mapping_ext1 where CE_Hostname = '".$row["CE_Hostname"]."'";
    $result1 = mysql_query($sql1, $cemdb);
    if (!$result1) {
       echo "DB Error, could not query the database<br>";
       echo 'MySQL Error: ' . mysql_error();
       exit;
       }
    if ($row1 = mysql_fetch_assoc($result1)) {
       $TACACS = $row1["TACACS"];
       $KIWI = $row1["KIWI"];
       $CDF_SIGN_OFF_DATE = $row1["CDF_SIGN_OFF_DATE"];
       $CDF_PERSONNEL = $row1["CDF_PERSONNEL"];
       $HANDOVER_STATUS = $row1["HANDOVER_STATUS"];
       $TUNNEL_IP = $row1["TUNNEL_IP"];
       $LOOPBACK_IP = $row1["LOOPBACK_IP"];
       $LAN_IP = $row1["LAN_IP"];
       $CR_NOTES = $row1["CR_NOTES"];
       $CR_ORDER_NUMBER = $row1["CR_ORDER_NUMBER"];
       $CE_MANAGEMENT = $row1["CE_MANAGEMENT"];
       $CE_SERIAL_NUMBER = $row1["CE_SERIAL_NUMBER"];
       $ROUTER_TYPE = $row1["ROUTER_TYPE"];
       $ROUTER_MODEL = $row1["ROUTER_MODEL"];
       $LATEST_PM_DATE = $row1["LATEST_PM_DATE"];
       $TRANSACTIONDATE = $row1["TransactionDate"];
       $USERID = $row1["UserID"];
       }
    else {
       $TACACS = '';
       $KIWI = '';
       $CDF_SIGN_OFF_DATE = '';
       $CDF_PERSONNEL = '';
       $HANDOVER_STATUS = '';
       $TUNNEL_IP = '';
       $LOOPBACK_IP = '';
       $LAN_IP = '';
       $CR_NOTES = '';
       $CR_ORDER_NUMBER = '';
       $CE_MANAGEMENT = '';
       $CE_SERIAL_NUMBER = '';
       $ROUTER_TYPE = '';
       $ROUTER_MODEL = '';
       $LATEST_PM_DATE = '';
       $TRANSACTIONDATE = '';
       $USERID = '';
       }
   
   
   //Get data_mapping_ext2 data
    $sql2 = "SELECT CE_Hostname, version, filename FROM data_mapping_ext2 where CE_Hostname = '".$row["CE_Hostname"]."' ORDER BY version DESC";
    $result2 = mysql_query($sql2, $cemdb);
    if (!$result2) {
       echo "DB Error, could not query the database<br>";
       echo 'MySQL Error: ' . mysql_error();
       exit;
       }
    if ($row2 = mysql_fetch_assoc($result2)) {
       $version = $row2["version"];
       $attachment = '=HYPERLINK("http://10.41.21.81/crocs/getattachment.php?CE_Hostname='.$row["CE_Hostname"]."&F=".$row2["filename"]."&V=".$row2["version"].'","'.$row2["filename"].'")';
       }
    else {
       $version = '';
       $attachment = '';
       }*/

     //Get Configuration Attachment
     $sqlAttach = "SELECT CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE, dbms_lob.getlength(CROCS_FILE_UPLOADED) AS COLUMNSIZE ";
     $sqlAttach = $sqlAttach."FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'CA' AND CROCS_LV_NUMBER = '".$CE_HOSTNAME."'";
     $stidAttach = oci_parse($cemdb, $sqlAttach);
     $resultAttach = oci_execute($stidAttach);
     
     if (!$stidAttach) {
        echo "DB Error, could not query the database<br>";
        exit;
        }
     else {
    	oci_define_by_name($stidAttach, 'CROCS_LV_NUMBER', $CROCS_LV_NUMBER);
    	oci_define_by_name($stidAttach, 'CROCS_FILE_VERSION', $CROCS_FILE_VERSION);
    	oci_define_by_name($stidAttach, 'CROCS_FILE_NAME', $CROCS_FILE_NAME);
    	oci_define_by_name($stidAttach, 'CROCS_UPLOAD_DATE', $CROCS_UPLOAD_DATE);
    	oci_define_by_name($stidAttach, 'CROCS_UPLOADER_ID', $CROCS_UPLOADER_ID);
    	oci_define_by_name($stidAttach, 'CROCS_FILE_UPLOADED', $CROCS_FILE_UPLOADED);
    	oci_define_by_name($stidAttach, 'CROCS_ATTACHMENT_TYPE', $CROCS_ATTACHMENT_TYPE);
        oci_define_by_name($stidAttach, 'COLUMNSIZE', $COLUMNSIZE);
     }
     
     $version = '';
     $attachment = '';
     
    while (($rowAttach = oci_fetch_array($stidAttach)) != false) {
        $version = $rowAttach["CROCS_FILE_VERSION"];
        $attachment = $attachment."=HYPERLINK('http://10.41.21.90/crocs/getattachment.php?CE_Hostname='".$row['ROOT_SERVICE_ID']."'&F='".$rowAttach['CROCS_FILE_NAME']."'&V='".$rowAttach['CROCS_FILE_VERSION']."','".$rowAttach['CROCS_FILE_NAME']."'),";    }
    
    //Get Handover Attachment
     $sqlAttach1 = "SELECT CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE, dbms_lob.getlength(CROCS_FILE_UPLOADED) AS COLUMNSIZE ";
     $sqlAttach1 = $sqlAttach1."FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'HA' AND CROCS_LV_NUMBER = '".$CE_HOSTNAME."'";
     $stidAttach1 = oci_parse($cemdb, $sqlAttach1);
     $resultAttach1 = oci_execute($stidAttach1);
     
     if (!$stidAttach1) {
        echo "DB Error, could not query the database<br>";
        exit;
        }
     else {
    	oci_define_by_name($stidAttach1, 'CROCS_LV_NUMBER', $CROCS_LV_NUMBER);
    	oci_define_by_name($stidAttach1, 'CROCS_FILE_VERSION', $CROCS_FILE_VERSION);
    	oci_define_by_name($stidAttach1, 'CROCS_FILE_NAME', $CROCS_FILE_NAME);
    	oci_define_by_name($stidAttach1, 'CROCS_UPLOAD_DATE', $CROCS_UPLOAD_DATE);
    	oci_define_by_name($stidAttach1, 'CROCS_UPLOADER_ID', $CROCS_UPLOADER_ID);
    	oci_define_by_name($stidAttach1, 'CROCS_FILE_UPLOADED', $CROCS_FILE_UPLOADED);
    	oci_define_by_name($stidAttach1, 'CROCS_ATTACHMENT_TYPE', $CROCS_ATTACHMENT_TYPE);
        oci_define_by_name($stidAttach1, 'COLUMNSIZE', $COLUMNSIZE);
     }
     
     $version1 = '';
     $attachment1 = '';
     
    while (($rowAttach1 = oci_fetch_array($stidAttach1)) != false) {
        $version1 = $rowAttach1["CROCS_FILE_VERSION"];
        $attachment1 = $attachment1."=HYPERLINK('http://10.41.21.90/crocs/getattachment.php?CE_Hostname='".$row['ROOT_SERVICE_ID']."'&F='".$rowAttach1['CROCS_FILE_NAME']."'&V='".$rowAttach1['CROCS_FILE_VERSION']."','".$rowAttach1['CROCS_FILE_NAME']."'),";
    }
    
    $rowcount = $rowcount + 1;

    //Show progress bar
    //Calculate the percentation
    $percent = intval($rowcount/$rcdcount * 100)."%";
    if ($prevpercent != $percent) {
        $prevpercent = $percent;
        // Javascript for updating the progress bar and information
        echo '<script language="javascript">
        document.getElementById("information").innerHTML="Please wait. Performing data extraction... '.$percent.' completed.";
        </script>';
        // This is for the buffer achieve the minimum size in order to flush data
        echo str_repeat(' ',1024*64);
        // Send output to browser immediately
        flush();
        }

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowcount, $CE_HOSTNAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowcount, $CROCS_SVC_INSTALL_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowcount, $CROCS_CDF_SIGN_OFF_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowcount, $CROCS_CDF_PERSONNEL);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowcount, $HANDOVER_STATUS);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowcount, $CROCS_TACACS);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowcount, $CROCS_KIWI);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowcount, $CROCS_CE_MANAGEMENT);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowcount, $CROCS_CE_SERIAL_NUMBER);
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowcount, $CROCS_ROUTER_TYPE);
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowcount, $CROCS_ROUTER_MODEL);
    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowcount, $CROCS_ORDER_TYPE);
    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowcount, $CROCS_ASSET_STATUS);
    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowcount, $CROCS_ROUTER_PACKAGE);
    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowcount, $CROCS_BANDWIDTH_SVC);
    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowcount, $CROCS_ROUTING_PROTOCOL);
    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowcount, $CROCS_SERVICE_LEVEL);
    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowcount, $CROCS_QOS_SVC);
    $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowcount, $CROCS_CPE_ID);
    $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowcount, $CROCS_WAN_CPE_INTERFACE);
    $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowcount, $CROCS_CE_PARTNER_MGMT);
    $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowcount, $CROCS_CE_LEASING_CONTRACT_NO);
    $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowcount, $CROCS_CE_LEASING_EXPIRY_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowcount, $CROCS_CE_PURCHACE_ORDER_NO);
    $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowcount, $CROCS_CE_INVOICE_NO);
    $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowcount, $CROCS_CR_NOTES);
    $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowcount, $CROCS_CR_ORDER_NUMBER);
    $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowcount, $CROCS_CR_CREATED_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowcount, $CROCS_CR_TYPE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowcount, $CROCS_CR_STATUS);
    $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowcount, $CROCS_CTT_NUMBER);
    $objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowcount, $CROCS_CTT_CREATED_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowcount, $CROCS_CTT_CLOSED_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowcount, $CROCS_CTT_PRIORITY);
    $objPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowcount, $CROCS_CTT_SVC_LEG);
    $objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowcount, $CROCS_CTT_DESCRIPTION);
    $objPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowcount, $CROCS_CTT_CAUSE_CATEGORY);
    $objPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowcount, $CROCS_CTT_CAUSE_CODE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AM'.$rowcount, $CROCS_CTT_RESOLUTION_CODE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AN'.$rowcount, $CROCS_CTT_CLOSED_BY_NAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('AO'.$rowcount, $CROCS_CTT_CLOSED_BY_TEAM);
    $objPHPExcel->getActiveSheet()->SetCellValue('AP'.$rowcount, $CROCS_LATEST_PM_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AQ'.$rowcount, $CROCS_PM_DESCRIPTION);
    $objPHPExcel->getActiveSheet()->SetCellValue('AR'.$rowcount, $CROCS_TUNNEL_IP);
    $objPHPExcel->getActiveSheet()->SetCellValue('AS'.$rowcount, $CROCS_LOOPBACK_IP);
    $objPHPExcel->getActiveSheet()->SetCellValue('AT'.$rowcount, $LAN_IP_ADDR);
    $objPHPExcel->getActiveSheet()->SetCellValue('AU'.$rowcount, $CROCS_UPDATE_DATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('AV'.$rowcount, $CROCS_UPDATE_USER_ID);
    $objPHPExcel->getActiveSheet()->SetCellValue('AW'.$rowcount, $attachment);
    $objPHPExcel->getActiveSheet()->SetCellValue('AX'.$rowcount, $attachment1);
    $objPHPExcel->getActiveSheet()->SetCellValue('AY'.$rowcount, $CE_HOSTNAME_REAL);
    $objPHPExcel->getActiveSheet()->SetCellValue('AZ'.$rowcount, $CUST_SEGMENT);
    $objPHPExcel->getActiveSheet()->SetCellValue('BA'.$rowcount, $REGION);
    $objPHPExcel->getActiveSheet()->SetCellValue('BB'.$rowcount, $STATE);
    $objPHPExcel->getActiveSheet()->SetCellValue('BC'.$rowcount, $CUST_SITE_NAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('BD'.$rowcount, $SERVICE_ID);
    $objPHPExcel->getActiveSheet()->SetCellValue('BE'.$rowcount, $CE_WAN_IP_ADDR);
    $objPHPExcel->getActiveSheet()->SetCellValue('BF'.$rowcount, $CE_BKP_IP_ADDR);
    $objPHPExcel->getActiveSheet()->SetCellValue('BG'.$rowcount, $RESELLER);
    $objPHPExcel->getActiveSheet()->SetCellValue('BH'.$rowcount, $NODE_PE);
    $objPHPExcel->getActiveSheet()->SetCellValue('BI'.$rowcount, $CUST_NAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('BJ'.$rowcount, $CUST_ID);
    $objPHPExcel->getActiveSheet()->SetCellValue('BK'.$rowcount, $SVC_TYPE);
    $objPHPExcel->getActiveSheet()->SetCellValue('BL'.$rowcount, $BR_CODE);
    $objPHPExcel->getActiveSheet()->SetCellValue('BM'.$rowcount, $BR_NAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('BN'.$rowcount, $BR_ADD1);
    $objPHPExcel->getActiveSheet()->SetCellValue('BO'.$rowcount, $BR_ADD2);
    $objPHPExcel->getActiveSheet()->SetCellValue('BP'.$rowcount, $BR_ADD3);
    $objPHPExcel->getActiveSheet()->SetCellValue('BQ'.$rowcount, $BR_ADD4);
    $objPHPExcel->getActiveSheet()->SetCellValue('BR'.$rowcount, $FIRST_CUST_CONTACT);
    $objPHPExcel->getActiveSheet()->SetCellValue('BS'.$rowcount, $SECOND_CUST_CONTACT);
    $objPHPExcel->getActiveSheet()->SetCellValue('BT'.$rowcount, $THIRD_CUST_CONTACT);
    $objPHPExcel->getActiveSheet()->SetCellValue('BU'.$rowcount, $CE_HOSTNAME);
    $objPHPExcel->getActiveSheet()->SetCellValue('BV'.$rowcount, $PS_NUMBER);
    $objPHPExcel->getActiveSheet()->SetCellValue('BW'.$rowcount, $BS_NUMBER);
    $objPHPExcel->getActiveSheet()->SetCellValue('BX'.$rowcount, $HANDOVER_STATUS);
    $objPHPExcel->getActiveSheet()->SetCellValue('BY'.$rowcount, $BKP_TYPE);
    $objPHPExcel->getActiveSheet()->SetCellValue('BZ'.$rowcount, $BKP_NO);
    $objPHPExcel->getActiveSheet()->SetCellValue('CA'.$rowcount, $ISDN_LOGIN_ID);
    $objPHPExcel->getActiveSheet()->SetCellValue('CB'.$rowcount, $ISDN_PE_PRIMARY);
    $objPHPExcel->getActiveSheet()->SetCellValue('CC'.$rowcount, $ISDN_PE_SECONDARY);
    $objPHPExcel->getActiveSheet()->SetCellValue('CD'.$rowcount, $LAN_IP_ADDR);
    $objPHPExcel->getActiveSheet()->SetCellValue('CE'.$rowcount, $HQ_IP_ADDR);
//    $objPHPExcel->getActiveSheet()->SetCellValue('CF'.$rowcount, $CROCS_LOOPBACK_IP);
    }
/*
//Get unmanaged device info
    $sql2 = "SELECT CE_Hostname, TACACS, KIWI, CDF_SIGN_OFF_DATE, CDF_PERSONNEL, HANDOVER_STATUS, TUNNEL_IP, LOOPBACK_IP, LAN_IP, CR_NOTES, CR_ORDER_NUMBER, CE_MANAGEMENT, CE_SERIAL_NUMBER, ROUTER_TYPE, ROUTER_MODEL, LATEST_PM_DATE, TransactionDate, UserID FROM data_mapping_ext1 where MANAGED_CE = 'N'";
    $result2 = mysql_query($sql2, $cemdb);
    if (!$result2) {
       echo "DB Error, could not query the database<br>";
       echo 'MySQL Error: ' . mysql_error();
       exit;
       }
 while ($row2 = mysql_fetch_assoc($result2)) {
       $CE_Hostname1 = $row2["CE_Hostname"];
       $TACACS1 = $row2["TACACS"];
       $KIWI1 = $row2["KIWI"];
       $CDF_SIGN_OFF_DATE1 = $row2["CDF_SIGN_OFF_DATE"];
       $CDF_PERSONNEL1 = $row2["CDF_PERSONNEL"];
       $HANDOVER_STATUS1 = $row2["HANDOVER_STATUS"];
       $TUNNEL_IP1 = $row2["TUNNEL_IP"];
       $LOOPBACK_IP1 = $row2["LOOPBACK_IP"];
       $LAN_IP1 = $row2["LAN_IP"];
       $CR_NOTES1 = $row2["CR_NOTES"];
       $CR_ORDER_NUMBER1 = $row2["CR_ORDER_NUMBER"];
       $CE_MANAGEMENT1 = $row2["CE_MANAGEMENT"];
       $CE_SERIAL_NUMBER1 = $row2["CE_SERIAL_NUMBER"];
       $ROUTER_TYPE1 = $row2["ROUTER_TYPE"];
       $ROUTER_MODEL1 = $row2["ROUTER_MODEL"];
       $LATEST_PM_DATE1 = $row2["LATEST_PM_DATE"];
       $TRANSACTIONDATE1 = $row2["TransactionDate"];
       $USERID1 = $row2["UserID"];

    $rowcount =$rowcount + 1;

    //Show progress bar
    //Calculate the percentation
    $percent = intval($rowcount/$rcdcount * 100)."%";
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("information").innerHTML="Please wait. Performing data extraction... '.$percent.' completed.";
    </script>';
    // This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    // Send output to browser immediately
    flush();

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowcount, $CE_Hostname1);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowcount, $TACACS1);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowcount, $KIWI1);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowcount, $CDF_SIGN_OFF_DATE1);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowcount, $CDF_PERSONNEL1);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowcount, $HANDOVER_STATUS1);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowcount, $TUNNEL_IP1);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowcount, $LOOPBACK_IP1);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowcount, $LAN_IP1);
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowcount, $CR_NOTES1);
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowcount, $CR_ORDER_NUMBER1);
    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowcount, $CE_MANAGEMENT1);
    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowcount, $CE_SERIAL_NUMBER1);
    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowcount, $ROUTER_TYPE1);
    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowcount, $ROUTER_MODEL1);
    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowcount, $LATEST_PM_DATE1);
    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowcount, $TRANSACTIONDATE1);
    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowcount, $USERID1);
    }
*/
 //Show progress bar.
 // Javascript for updating the progress bar and information
 echo '<script language="javascript">    document.getElementById("information").innerHTML="Please wait for another 15-25 minutes as the system is currently generating the excel file.";
    </script>';
 // This is for the buffer achieve the minimum size in order to flush data
 echo str_repeat(' ',1024*64);
 // Send output to browser immediately
 flush();

 $styleArray = array(
   'borders' => array(
     'allborders' => array(
       'style' => PHPExcel_Style_Border::BORDER_THIN
     )
   )
 );

 $objPHPExcel->getActiveSheet()->getStyle('A1:CE1'.$rowcount)->applyFromArray($styleArray);
 unset($styleArray);

?>
