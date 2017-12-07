<?php 
 include '../../inc/CROCSLogin.php';

 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);

 //Set variables 
 $UPD_BUTTON = $_POST['UPD_BUTTON']; 
 $CROCS_ORDER_SVC_ID = trim($_POST['CROCS_ORDER_SVC_ID']);
 $CROCS_SVC_INSTALL_DATE = $_POST['CROCS_SVC_INSTALL_DATE'];
 //$CROCS_TACACS = $_POST['CROCS_TACACS'];
 //$CROCS_KIWI = $_POST['CROCS_KIWI'];
 $CROCS_CE_MGMT = $_POST['CROCS_CE_MGMT'];
 $CROCS_TUNNEL_IP = $_POST['CROCS_TUNNEL_IP'];
 $CROCS_LOOPBACK_IP = $_POST['CROCS_LOOPBACK_IP'];
 $CROCS_LAN_IP = $_POST['CROCS_LAN_IP'];
 $CROCS_UPE_LOOPBACK_IP = $_POST['CROCS_UPE_LOOPBACK_IP']; 
 //$CROCS_CE_PARTNER_MGMT = $_POST['CROCS_CE_PARTNER_MGMT'];
 $CROCS_CE_SERIAL_NO = $_POST['CROCS_CE_SERIAL_NO'];
 $CROCS_ROUTER_TYPE = $_POST['CROCS_ROUTER_TYPE'];
 $CROCS_ROUTER_MODEL = $_POST['CROCS_ROUTER_MODEL'];
 $CROCS_ROUTER_PACKAGE = $_POST['CROCS_ROUTER_PACKAGE'];
 //$CROCS_CE_LEASE_CONTRACT_NO = $_POST['CROCS_CE_LEASE_CONTRACT_NO'];
 //$CROCS_CE_EXPIRY_DATE = $_POST['CROCS_CE_EXPIRY_DATE'];
 //$CROCS_CE_PO_NO = $_POST['CROCS_CE_PO_NO'];
 //$CROCS_CE_INVOCE_NO = $_POST['CROCS_CE_INVOCE_NO']; 
 $CROCS_CDF_SIGN_OFF_DATE = $_POST['CROCS_CDF_SIGN_OFF_DATE'];
 //$CROCS_CR_ORDER_NO = $_POST['CROCS_CR_ORDER_NO'];
 //$CROCS_CR_DESC = $_POST['CROCS_CR_DESC'];
 //$CROCS_CR_CREATED_DATE = $_POST['CROCS_CR_CREATED_DATE'];
 //$CROCS_CR_ORDER_TYPE = $_POST['CROCS_CR_ORDER_TYPE'];
 //$CROCS_CR_STATUS = $_POST['CROCS_CR_STATUS'];
 //$CROCS_LATEST_PM_DATE = $_POST['CROCS_LATEST_PM_DATE']; 
 //$CROCS_PM_DESC = $_POST['CROCS_PM_DESC'];
 //$CROCS_WAN_CPE_INTERFACE = $_POST['CROCS_WAN_CPE_INTERFACE'];
 $CROCS_ROUTER_STATUS = $_POST['CROCS_ROUTER_STATUS'];
 //$CROCS_WARRANTY_DATE = $_POST['CROCS_WARRANTY_DATE'];
 $CROCS_HO_ORDER_TYPE = $_POST['CROCS_HO_ORDER_TYPE'];
 $CROCS_HO_STATUS = $_POST['CROCS_HO_STATUS']; 
 $CROCS_HO_REMARKS = $_POST['CROCS_HO_REMARKS'];
 $CROCS_HO_ACTIVITY_COMMENT = $_POST['CROCS_HO_ACTIVITY_COMMENT'];
 $CROCS_HQ_IP = $_POST['CROCS_HQ_IP'];
 $CROCS_HO_ALERT_REMARKS = $_POST['CROCS_HO_ALERT_REMARKS'];
  
 $DATE = date('d/m/Y');

 //Check whether record exist. If exist update else insert
 $sql = "SELECT CROCS_ORDER_SVC_ID FROM DATA_MAPPING_CROCS WHERE CROCS_ORDER_SVC_ID = '".$CROCS_ORDER_SVC_ID."'";
 $stid = oci_parse($cemdb, $sql);
 $result = oci_execute($stid);
 if (!$result) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
     if ($row = oci_fetch_assoc($stid)) {
            $sql1 = "UPDATE DATA_MAPPING_CROCS SET CROCS_SVC_INSTALL_DATE = TO_DATE('".$CROCS_SVC_INSTALL_DATE."','DD/MM/YYYY'), ";
            $sql1 = $sql1."CROCS_TUNNEL_IP = '".$CROCS_TUNNEL_IP."', ";            
            //$sql1 = $sql1."CROCS_TACACS = '".$CROCS_TACACS."', ";
            //$sql1 = $sql1."CROCS_KIWI = '".$CROCS_KIWI."', ";
            $sql1 = $sql1."CROCS_CE_MGMT = '".$CROCS_CE_MGMT."', ";
            $sql1 = $sql1."CROCS_LOOPBACK_IP = '".$CROCS_LOOPBACK_IP."', ";
            $sql1 = $sql1."CROCS_UPE_LOOPBACK_IP = '".$CROCS_UPE_LOOPBACK_IP."', ";
            $sql1 = $sql1."CROCS_LAN_IP = '".$CROCS_LAN_IP."', ";            
            //$sql1 = $sql1."CROCS_CE_PARTNER_MGMT = '".$CROCS_CE_PARTNER_MGMT."', ";
            $sql1 = $sql1."CROCS_CE_SERIAL_NO = '".$CROCS_CE_SERIAL_NO."', ";
            $sql1 = $sql1."CROCS_ROUTER_TYPE = '".$CROCS_ROUTER_TYPE."', ";
            $sql1 = $sql1."CROCS_ROUTER_MODEL = '".$CROCS_ROUTER_MODEL."', ";
            $sql1 = $sql1."CROCS_ROUTER_PACKAGE = '".$CROCS_ROUTER_PACKAGE."', ";
            //$sql1 = $sql1."CROCS_CE_LEASE_CONTRACT_NO = '".$CROCS_CE_LEASE_CONTRACT_NO."', ";
            //$sql1 = $sql1."CROCS_CE_EXPIRY_DATE = TO_DATE('".$CROCS_CE_EXPIRY_DATE."','DD/MM/YYYY'), ";
            //$sql1 = $sql1."CROCS_CE_PO_NO = '".$CROCS_CE_PO_NO."', ";
            //$sql1 = $sql1."CROCS_CE_INVOCE_NO = '".$CROCS_CE_INVOCE_NO."', ";
            $sql1 = $sql1."CROCS_CDF_SIGN_OFF_DATE = TO_DATE('".$CROCS_CDF_SIGN_OFF_DATE."','DD/MM/YYYY'), "; 
            //$sql1 = $sql1."CROCS_CR_ORDER_NO = '".$CROCS_CR_ORDER_NO."', ";
            //$sql1 = $sql1."CROCS_CR_DESC = '".$CROCS_CR_DESC."', ";
            //$sql1 = $sql1."CROCS_CR_CREATED_DATE = TO_DATE('".$CROCS_CR_CREATED_DATE."','DD/MM/YYYY'), "; 
            //$sql1 = $sql1."CROCS_CR_ORDER_TYPE = '".$CROCS_CR_ORDER_TYPE."', ";
            //$sql1 = $sql1."CROCS_CR_STATUS = '".$CROCS_CR_STATUS."', ";          
            //$sql1 = $sql1."CROCS_LATEST_PM_DATE = TO_DATE('".$CROCS_LATEST_PM_DATE."','DD/MM/YYYY'), ";
            //$sql1 = $sql1."CROCS_PM_DESC = '".$CROCS_PM_DESC."', ";
            //$sql1 = $sql1."CROCS_WAN_CPE_INTERFACE = '".$CROCS_WAN_CPE_INTERFACE."', ";
            $sql1 = $sql1."CROCS_ROUTER_STATUS = '".$CROCS_ROUTER_STATUS."', ";
            //$sql1 = $sql1."CROCS_WARRANTY_DATE = TO_DATE('".$CROCS_WARRANTY_DATE."','DD/MM/YYYY'), ";         
			$sql1 = $sql1."CROCS_HO_ORDER_TYPE = '".$CROCS_HO_ORDER_TYPE."', ";	
			$sql1 = $sql1."CROCS_HO_STATUS = '".$CROCS_HO_STATUS."', ";
			$sql1 = $sql1."CROCS_HO_REMARKS = '".$CROCS_HO_REMARKS."', ";
            $sql1 = $sql1."CROCS_HO_ACTIVITY_COMMENT = '".$CROCS_HO_ACTIVITY_COMMENT."', ";
			$sql1 = $sql1."CROCS_HO_ALERT_REMARKS = '".$CROCS_HO_ALERT_REMARKS."', ";
            $sql1 = $sql1."CROCS_HQ_IP = '".$CROCS_HQ_IP."', ";
            $sql1 = $sql1."CROCS_UPDATED_DATE = TO_DATE('".$DATE."','DD/MM/YYYY'), ";            
            $sql1 = $sql1."CROCS_UPDATED_BY = '".$userID."' ";
            $sql1 = $sql1."WHERE CROCS_ORDER_SVC_ID = '".$CROCS_ORDER_SVC_ID."'";
            $stid1 = oci_parse($cemdb, $sql1);
			
			//echo $sql1;
            $result1 = oci_execute($stid1);
            if (!$result1) {
               echo "DB Error, could not update CE to database<br>";
               }
            else
			{
				echo "<script type='text/javascript'>alert('Information successfully updated!')
				window.location.href='UpdCE.php?CE_Hostname=".$CROCS_ORDER_SVC_ID."&R=U&U=".$U." ';
				</script>";          
            }
     }
    else {
        $RecordExist = 'N';
        }

 }
 
 //include 'ListCE.php'; 

 ?> 
