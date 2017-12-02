<?php 
 //MySQL Database Connect
 include 'datalogin.php'; 

 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);

 //Set variables 
 $Upd_Button=$_POST['Upd_Button']; 
 $CE_Hostname=trim($_POST['CE_Hostname']); 
 $TACACS=$_POST['TACACS']; 
 $KIWI=$_POST['KIWI']; 
 $CDF_SIGN_OFF_DATE=$_POST['CDF_SIGN_OFF_DATE'];
 $CDF_PERSONNEL=$_POST['CDF_PERSONNEL'];
 $HANDOVER_STATUS=$_POST['HANDOVER_STATUS'];
 $TUNNEL_IP=trim($_POST['TUNNEL_IP']);
 $LOOPBACK_IP=trim($_POST['LOOPBACK_IP']);
 $LAN_IP=trim($_POST['LAN_IP']);
 $CR_NOTES=trim($_POST['CR_NOTES']);
 $CR_ORDER_NUMBER=$_POST['CR_ORDER_NUMBER'];
 $CE_MANAGEMENT=$_POST['CE_MANAGEMENT'];
 $CE_SERIAL_NUMBER=$_POST['CE_SERIAL_NUMBER'];
 $ROUTER_TYPE=$_POST['ROUTER_TYPE'];
 $ROUTER_MODEL=$_POST['ROUTER_MODEL'];
 $LATEST_PM_DATE=$_POST['LATEST_PM_DATE'];

 //Check whether record exist. If exist update else insert
 $sql = 'SELECT CE_Hostname FROM data_mapping_ext1 where CE_Hostname = "'.$CE_Hostname.'"';
 $result = mysql_query($sql, $cemdb);
 if (!$result) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 if ($row = mysql_fetch_assoc($result)) {
    $RecordExist = 'Y';}
 else {
    $RecordExist = 'N';}


 if ($RecordExist == 'Y') {
    $sql = "UPDATE data_mapping_ext1 SET TACACS='$TACACS', KIWI='$KIWI', CDF_SIGN_OFF_DATE=STR_TO_DATE('".$CDF_SIGN_OFF_DATE."', '%e-%c-%Y %T'), CDF_PERSONNEL='$CDF_PERSONNEL', HANDOVER_STATUS='$HANDOVER_STATUS', TUNNEL_IP='$TUNNEL_IP', LOOPBACK_IP='$LOOPBACK_IP', LAN_IP='$LAN_IP', CR_NOTES='$CR_NOTES', CR_ORDER_NUMBER='$CR_ORDER_NUMBER', CE_MANAGEMENT='$CE_MANAGEMENT', CE_SERIAL_NUMBER='$CE_SERIAL_NUMBER', ROUTER_TYPE='$ROUTER_TYPE', ROUTER_MODEL='$ROUTER_MODEL', LATEST_PM_DATE=STR_TO_DATE('".$LATEST_PM_DATE."', '%e-%c-%Y %T'), TransactionDate= NOW(), UserID='$userID'   where CE_Hostname = '$CE_Hostname'";
    $result = mysql_query($sql, $cemdb);
    if (!$result) {
       echo "DB Error, could not update CE to database<br>";
       echo 'MySQL Error: ' . mysql_error();
       exit;
       }
    }
 else {  
    $sql = "INSERT INTO data_mapping_ext1 VALUES ('$CE_Hostname', '$TACACS', '$KIWI', STR_TO_DATE('$CDF_SIGN_OFF_DATE', '%e-%c-%Y %T'), '$CDF_PERSONNEL', '$HANDOVER_STATUS' '$TUNNEL_IP', '$LOOPBACK_IP', '$LAN_IP','$CR_NOTES', '$CR_ORDER_NUMBER', '$CE_MANAGEMENT', '$CE_SERIAL_NUMBER', '$ROUTER_TYPE', '$ROUTER_MODEL', STR_TO_DATE('$LATEST_PM_DATE', '%e-%c-%Y %T'), NOW(), '$userID')";
    $result = mysql_query($sql, $cemdb);
    if (!$result) {
       echo "DB Error, could not update CE to database<br>";
       echo 'MySQL Error: ' . mysql_error();
       exit;
       }
    }


 Print "Your information has been successfully updated."; 

 echo '<br><br>You may refresh the equipment list.</big></p>';
 include 'ListCE.php'; 

 ?> 
