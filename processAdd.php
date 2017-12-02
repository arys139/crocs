<?php 
include '../../inc/CROCSLogin.php'; 

 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);

 //Set variables 
 $Upd_Button=$_POST['Upd_Button']; 
 $CE_HOSTNAME=trim($_POST['CE_HOSTNAME']); 
 $CROCS_TACACS=$_POST['CROCS_TACACS']; 
 $CROCS_KIWI=$_POST['CROCS_KIWI']; 
 $CROCS_CDF_SIGN_OFF_DATE=$_POST['CROCS_CDF_SIGN_OFF_DATE'];
 $CROCS_CDF_PERSONNEL=$_POST['CROCS_CDF_PERSONNEL'];
 $HANDOVER_STATUS=$_POST['HANDOVER_STATUS'];
 $CROCS_TUNNEL_IP=trim($_POST['CROCS_TUNNEL_IP']);
 $CROCS_LOOPBACKIP_ADDR=trim($_POST['CROCS_LOOPBACKIP_ADDR']);
 $LAN_IP=trim($_POST['LAN_IP']);
 $CROCS_CR_NOTES=trim($_POST['CROCS_CR_NOTES']);
 $CROCS_CR_ORDER_NUMBER=$_POST['CROCS_CR_ORDER_NUMBER'];
 $CROCS_CE_MANAGEMENT=$_POST['CROCS_CE_MANAGEMENT'];
 $CROCS_CE_SERIAL_NUMBER=$_POST['CROCS_CE_SERIAL_NUMBER'];
 $CROCS_ROUTER_TYPE=$_POST['CROCS_ROUTER_TYPE'];
 $CROCS_ROUTER_MODEL=$_POST['CROCS_ROUTER_MODEL'];
 $CROCS_LATEST_PM_DATE=$_POST['CROCS_LATEST_PM_DATE'];
 

 //Check whether record exist. If exist update else insert
 $sql = "SELECT CE_HOSTNAME FROM DATA_MAPPING WHERE CE_HOSTNAME = '".$CE_HOSTNAME."'";
 $stid = oci_parse($cemdb, $sql);
   	oci_execute($stid);
    if (!$stid) {
       echo "DB Error, could not query the database<br>";
       exit;
    }
    else {
         if ($row = oci_fetch($stid)) {
            $RecordExist = 'Y';}
         else {
            $RecordExist = 'N';}
    }

 if ($RecordExist == 'Y') {
     echo "Error, Hostname already existed!<br>";
       exit;
    }
 else {  
    /*$sql1 = "INSERT INTO DATA_MAPPING VALUES ('".$CE_HOSTNAME."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ";
    $sql1 = "'".$HANDOVER_STATUS."', '', '', '', '', '', '".$LAN_IP."', '', '', '', '', '', '', '', '', '', '', '', 'N', 'Y', '', '' , '', '', '', '', '', ";
    $sql1 = "'', '', '', '', '', '', '', '', '', '', '".$CROCS_TACACS."', '".$CROCS_KIWI."', STR_TO_DATE('".$CROCS_CDF_SIGN_OFF_DATE."', '%e-%c-%Y %T'), ";
    $sql1 = "'".$CROCS_CDF_PERSONNEL."', '".$CROCS_TUNNEL_IP."', '".$CROCS_LOOPBACKIP_ADDR."', '".$CROCS_CR_NOTES."', '".$CROCS_CR_ORDER_NUMBER."', ";
    $sql1 = "'".$CROCS_CE_MANAGEMENT."', '".$CROCS_CE_SERIAL_NUMBER."', '".$CROCS_ROUTER_TYPE."', '".$CROCS_ROUTER_MODEL."', ";
    $sql1 = "STR_TO_DATE('".$CROCS_LATEST_PM_DATE."', '%e-%c-%Y %T'), NOW(), '".$userID."')";*/
    
    $sql1 = "INSERT INTO DATA_MAPPING VALUES ('".$CE_HOSTNAME."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ";
    $sql1 = "'".$HANDOVER_STATUS."', '', '', '', '', '', '".$LAN_IP."', '', '', '', '', '', '', '', '', '', '', '', 'N', 'Y', '', '', '' , '', '', '', '', '', ";
    $sql1 = "'', '', '', '', '', '', '', '', '', 'Y', 'Y', '', ";
    $sql1 = "'".$CROCS_CDF_PERSONNEL."', '".$CROCS_TUNNEL_IP."', '".$CROCS_LOOPBACKIP_ADDR."', '".$CROCS_CR_NOTES."', '".$CROCS_CR_ORDER_NUMBER."', ";
    $sql1 = "'".$CROCS_CE_MANAGEMENT."', '".$CROCS_CE_SERIAL_NUMBER."', '".$CROCS_ROUTER_TYPE."', '".$CROCS_ROUTER_MODEL."', ";
    $sql1 = "'', '', '".$userID."')";
    $stid1 = oci_parse($cemdb, $sql1);
   	oci_execute($stid1);
    if (!$stid1) {
       echo "DB Error, could not add CE to database<br>";
       exit;
       }
    else{
    }
    Print "The CE information has been successfully added."; 
 }
 
 echo '<br><br>You may refresh the CE list.</big></p>';
 include 'ListCE.php'; 

 ?> 
