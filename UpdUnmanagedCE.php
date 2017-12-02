<html> 
 <head><title>Update Unmanaged Device</title> 
   <script type="text/javascript">

   function upd_TACACS(x)
   {
   document.getElementById("TACACS").setAttribute("value",x);
   }

   function upd_KIWI(x)
   {
   document.getElementById("KIWI").setAttribute("value",x);
   }

   function upd_RouterType(x)
   {
   document.getElementById("ROUTER_TYPE").setAttribute("value",x);
   }

   function upd_RouterModel(x)
   {
   document.getElementById("ROUTER_MODEL").setAttribute("value",x);
   }

   function upd_CEManagement(x)
   {
   document.getElementById("CE_MANAGEMENT").setAttribute("value",x);
   }
 
   function upd_HandoverStatus(x)
   {
   document.getElementById("HANDOVER_STATUS").setAttribute("value",x);
   }
 
   </script>
  
   <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

 </head> 

 <body> 

 <h2>Update Unmanaged Device Info</h2><p> 

 <SCRIPT LANGUAGE="Javascript">

 //Function to get passing parameters
 function GetParam(name)
 {
 var start=location.search.indexOf("?"+name+"=");
 if (start<0) start=location.search.indexOf("&"+name+"=");
 if (start<0) return '';
 start += name.length+2;
 var end=location.search.indexOf("&",start)-1;
 if (end<0) end=location.search.length;
 var result=location.search.substring(start,end);
 var result='';
 for(var i=start;i<=end;i++) {
 var c=location.search.charAt(i);
 result=result+(c=='+'?' ':c);
 }
 return unescape(result);
 }

 CE_Hostname = GetParam('CE_Hostname');
 ROLE =  GetParam('R');

 </SCRIPT>

 <!--Query database and fill in values into html form-->
 <?php 
 //MySQL Database Connect
 include 'datalogin.php'; 
 //Get CE_Hostname  
 $CE_Hostname=$_GET['CE_Hostname']; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 
 $Role=$_GET['R']; 
 if ($Role == 'U') {
    $disable = '';
    $readonly = '';}
 else {
    $disable = ' disabled ';
    $readonly = ' style="background-color:#FFF8C6;" readonly="true" ';}

 //Set unused columns for unmanaged device to nbsp
 $Cust_Segment = '&nbsp'; 
 $Region = '&nbsp'; 
 $State = '&nbsp';
 $Cust_Site_Name = '&nbsp';
 $Service_ID = '&nbsp';
 $CE_WAN_IP_Addr = '&nbsp';
 $CE_Bkp_IP_Addr ='&nbsp';
 $Reseller = '&nbsp';
 $Node_PE = '&nbsp';
 $Cust_Name = '&nbsp';
 $Cust_ID = '&nbsp';
 $Svc_Type = '&nbsp';
 $Br_Code = '&nbsp';
 $Br_Name = '&nbsp';
 $Br_Add1 = '&nbsp';
 $Br_Add2 = '&nbsp';
 $Br_Add3 = '&nbsp';
 $Br_Add4 ='&nbsp'; 
 $First_Cust_Contact = '&nbsp';
 $Second_Cust_Contact = '&nbsp';
 $Third_Cust_Contact = '&nbsp';
 $Root_Service_ID = '&nbsp';
 $Speed = '&nbsp';
 $SLG = '&nbsp';
 $Misc = '&nbsp';
 $Bkp_Type = '&nbsp';
 $Bkp_No = '&nbsp';
 $ISDN_Login_ID = '&nbsp';
 $ISDN_PE_PRI ='&nbsp';
 $ISDN_PE_SEC = '&nbsp';
 $ISDN_Login_ID = '&nbsp';
 $LAN_IP_Addr = '&nbsp';
 $HQ_IP_Addr = '&nbsp';
 $UPE_Loopback_IP_Addr = '&nbsp';


 //Get data_mapping_ext1 data
 $sql1 = "SELECT CE_Hostname, TACACS, KIWI, CDF_SIGN_OFF_DATE, CDF_PERSONNEL, HANDOVER_STATUS, TUNNEL_IP, LOOPBACK_IP, LAN_IP, CR_NOTES, CR_ORDER_NUMBER, CE_MANAGEMENT, CE_SERIAL_NUMBER, ROUTER_TYPE, ROUTER_MODEL, LATEST_PM_DATE, TransactionDate, UserID FROM data_mapping_ext1 where CE_Hostname = '".$CE_Hostname."'";
 $result1 = mysql_query($sql1, $cemdb);
 if (!$result1) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 if ($row1 = mysql_fetch_assoc($result1)) {
    $TACACS = $row1["TACACS"];
    $KIWI = $row1["KIWI"];
    $CDF_SIGN_OFF_DATE = date("d-m-Y", strtotime($row1["CDF_SIGN_OFF_DATE"]));
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
    $LATEST_PM_DATE = date("d-m-Y", strtotime($row1["LATEST_PM_DATE"]));
    $TransactionDate = date("d-M-Y", strtotime($row1["TransactionDate"]));
    $UserID = $row1["UserID"];
    }
 else {
    $TACACS = '&nbsp';
    $KIWI = '&nbsp';
    $CDF_SIGN_OFF_DATE = '&nbsp';
    $CDF_PERSONNEL = '&nbsp';
    $HANDOVER_STATUS = '&nbsp';
    $TUNNEL_IP = '&nbsp';
    $LOOPBACK_IP = '&nbsp';
    $LAN_IP = '&nbsp';
    $CR_NOTES = '&nbsp';
    $CR_ORDER_NUMBER = '&nbsp';
    $CE_MANAGEMENT = '&nbsp';
    $CE_SERIAL_NUMBER = '&nbsp';
    $ROUTER_TYPE = '&nbsp';
    $ROUTER_MODEL = '&nbsp';
    $LATEST_PM_DATE = '&nbsp';
    $TransactionDate = '&nbsp';
    $UserID = '&nbsp';
    }

 //Get data_mapping_ext2 data
 $sql2 = "SELECT CE_Hostname, version, filename, TransactionDate, UserID, CHAR_LENGTH(attachment) as length FROM data_mapping_ext2 where CE_Hostname = '".$CE_Hostname."'";
 $result2 = mysql_query($sql2, $cemdb);
 if (!$result2) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 //$attachment = '<table border="1">';
 $attachment = '';
 $attachmentcnt = 0;
 while ($row2 = mysql_fetch_assoc($result2)) {
    $attachmentcnt = $attachmentcnt + 1;
    $attachment = $attachment.'<tr><td><a href="getattachment.php?CE_Hostname='.$CE_Hostname.'&F='.$row2["filename"].'&V='.$row2["version"].'&U='.$U.'">'.$row2["filename"].'</a></td>';
    $attachment = $attachment.'<td>'.date("d-M-Y H:i:s", strtotime($row2["TransactionDate"])).'&nbsp</td><td>&nbsp'.$row2["length"].'B&nbsp</td>';
    $attachment = $attachment.'<td>'.$row2["UserID"].'&nbsp</td>';
    $attachment = $attachment.'<td><a href="removeattachment.php?CE_Hostname='.$CE_Hostname.'&F='.$row2["filename"].'&V='.$row2["version"].'&U='.$U.'">Remove</a></td></tr>';
    }
 //$attachment = $attachment.'</table>';
 if ($attachmentcnt > 4)
    $uploadattachment = 'Maximum of 5 attachments reached. Please remove some of the attachments before uploading a new one.';
 else
    $uploadattachment = '<a href="UploadAttachment.php?CE_Hostname='.$CE_Hostname.'&R=G&U='.$U.'">Upload attachments</a><br>Note : Supports file size up to 256kB each and maximum 5 attachments. ';

//Get data_mapping_ext3 data
 $sql3 = "SELECT CE_Hostname, version, filename, TransactionDate, UserID, CHAR_LENGTH(attachment) as length FROM data_mapping_ext3 where CE_Hostname = '".$CE_Hostname."'";
 $result3 = mysql_query($sql3, $cemdb);
 if (!$result3) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 //$attachment1 = '<table border="1">';
 $attachment1 = '';
 $attachment1cnt = 0;
 while ($row3 = mysql_fetch_assoc($result3)) {
    $attachment1cnt = $attachment1cnt + 1;
    $attachment1 = $attachment1.'<tr><td><a href="getattachment1.php?CE_Hostname='.$CE_Hostname.'&F='.$row3["filename"].'&V='.$row3["version"].'&U='.$U.'">'.$row3["filename"].'</a></td>';
    $attachment1 = $attachment1.'<td>'.date("d-M-Y H:i:s", strtotime($row3["TransactionDate"])).'&nbsp</td><td>&nbsp'.$row3["length"].'B&nbsp</td>';
    $attachment1 = $attachment1.'<td>'.$row3["UserID"].'&nbsp</td>';
    $attachment1 = $attachment1.'<td><a href="removeattachment1.php?CE_Hostname='.$CE_Hostname.'&F='.$row3["filename"].'&V='.$row3["version"].'&U='.$U.'">Remove</a></td></tr>';
    }
// $attachment1 = $attachment1.'</table>';
 if ($attachment1cnt > 4)
    $uploadattachment1 = 'Maximum of 5 attachment reached. Please remove the current attachment before uploading a new one.';
 else
    $uploadattachment1 = '<a href="UploadAttachment1.php?CE_Hostname='.$CE_Hostname.'&R=G&U='.$U.'">Upload attachments</a><br>Note : Supports file size up to 256kB each and maximum 1 attachment. ';

//Get Router Type
 $sql4 = "SELECT DISTINCT Router_Type FROM data_mapping_router_type_model ORDER BY Router_Type asc";
 $result4 = mysql_query($sql4, $cemdb);
 if (!$result4) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();

    exit;
    }
 $list1 = '';
 while ($row4 = mysql_fetch_assoc($result4)) {
          $list1 = $list1.'<option value="'.$row4["Router_Type"].'">'.$row4["Router_Type"].'</option>';
          };


$sql5 = "SELECT DISTINCT Router_Model FROM data_mapping_router_type_model ORDER BY Router_Model asc";
 $result5 = mysql_query($sql5, $cemdb);
 if (!$result5) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 $list2 = '';
 while ($row5 = mysql_fetch_assoc($result5)) {
          $list2 = $list2.'<option value="'.$row5["Router_Model"].'">'.$row5["Router_Model"].'</option>';
          };

 //Create Form
 echo '
 <form action="processUpd.php?U='.$U.'" method="post"> 
 <table border="1"> 
 <tr><td style="background-color:#FFF8C6;">CE Equipment/Hostname :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CE_Hostname" name="CE_Hostname" value="'.$CE_Hostname.'"></td></tr> 

 <!--Protect input field and create drop down list-->
 <tr><td style="background-color:#FFF8C6;">TACACS :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="TACACS" name="TACACS" value="'.$TACACS.'"></td>
     <td><select onchange="upd_TACACS(value)">
       <option value="">Please select TACACS indicator</option>
       <option value="Y">Y</option>
       <option value="N">N</option>
       </select></td> 
</tr>

 <!--Protect input field and create drop down list-->
 <tr><td style="background-color:#FFF8C6;">KIWI :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="KIWI" name="KIWI" value="'.$KIWI.'"></td>
     <td><select onchange="upd_KIWI(value)">
       <option value="">Please select KIWI indicator</option>
       <option value="Y">Y</option>
       <option value="N">N</option>
       </select></td> 
 </tr>
 ';  ?> 

 <tr><td style="background-color:#FFF8C6;">CDF Sign Off Date :</td><td><input name="CDF_SIGN_OFF_DATE" id="CDF_SIGN_OFF_DATE" type="text" size="25" value="<?php echo $CDF_SIGN_OFF_DATE; ?>"><a href="javascript:NewCal('CDF_SIGN_OFF_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td><td>Format: 'dd-mm-yyyy'</td></tr>

 <?php echo '
 <tr><td style="background-color:#FFF8C6;">CDF Personnel :</td><td><input size="60" type="text" id="CDF_PERSONNEL" name="CDF_PERSONNEL" value="'.$CDF_PERSONNEL.'"></td></tr>
<tr><td style="background-color:#FFF8C6;">Handover Status:</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="HANDOVER_STATUS" name="HANDOVER_STATUS" value="'.$HANDOVER_STATUS.'"></td>
 <td><select onchange="upd_HandoverStatus(value)">
       <option value="">Please select Handover Status</option>
       <option value="LOV">LOV</option>
       <option value="Complete">Complete</option>
       <option value="Incomplete-No Test Result Attachment">Incomplete-No Test Result Attachment</option>
       <option value="Incomplete-Not Follow HO Checklist">Incomplete-Not Follow HO Checklist</option>
       <option value="Incomplete-Connectivity Issue">Incomplete-Connectivity Issue</option>
       <option value="Incomplete-Stability Issue">Incomplete-Stability Issue</option>
       <option value="Incomplete-Others">Incomplete-Others</option>
       </select></td></tr>
 <tr><td style="background-color:#FFF8C6;">Tunnel IP :</td><td><input size="60" type="text" id="TUNNEL_IP" name="TUNNEL_IP" value="'.$TUNNEL_IP.'"></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
 <tr><td style="background-color:#FFF8C6;">Loopback IP :</td><td><input size="60" type="text" id="LOOPBACK_IP" name="LOOPBACK_IP" value="'.$LOOPBACK_IP.'"></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
<tr><td style="background-color:#FFF8C6;">LAN IP :</td><td><input size="60" type="text" id="LAN_IP" name="LAN_IP" value="'.$LAN_IP.'"></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
 <tr><td style="background-color:#FFF8C6;">CR / CTT  Description :</td><td><input size="60" type="text" id="CR_NOTES" name="CR_NOTES" value="'.$CR_NOTES.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">CR Order / CTT No. :</td><td><input size="60" type="text" id="CR_ORDER_NUMBER" name="CR_ORDER_NUMBER" value="'.$CR_ORDER_NUMBER.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">CE Management:</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CE_MANAGEMENT" name="CE_MANAGEMENT" value="'.$CE_MANAGEMENT.'"></td>
 <td><select onchange="upd_CEManagement(value)">
       <option value="">Please select CE Management</option>
       <option value="Customer">Customer</option>
       <option value="Reseller">Reseller</option>
       <option value="TM">TM</option>
       </select></td></tr>
 <tr><td style="background-color:#FFF8C6;">CE Serial Number :</td><td><input size="60" type="text" id="CE_SERIAL_NUMBER" name="CE_SERIAL_NUMBER" value="'.$CE_SERIAL_NUMBER.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">Router Type :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="ROUTER_TYPE" name="ROUTER_TYPE" value="'.$ROUTER_TYPE.'"></td>
 <td><form name="routerType_form" method="post" action="">
     <select name="routerType" onchange="upd_RouterType(value)">
       <option value="">Please select Router Type</option>'.$list1.'
       </select></form></td> </tr>
<tr><td style="background-color:#FFF8C6;">Router Model :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="ROUTER_MODEL" name="ROUTER_MODEL" value="'.$ROUTER_MODEL.'"></td>
 <td><select onchange="upd_RouterModel(value)">
       <option value="">Please select Router Model</option>'.$list2.'
       </select></td> </tr>
 ';  ?> 

 <tr><td style="background-color:#FFF8C6;">Latest Preventive Maintenance Date :</td><td><input size="25" type="text" id="LATEST_PM_DATE" name="LATEST_PM_DATE" value="<?php echo $LATEST_PM_DATE; ?>"><a href="javascript:NewCal('LATEST_PM_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td><td>Format: 'dd-mm-yyyy'</td></tr>

 <?php echo '
 <tr><td style="background-color:#FFF8C6;">Last Updated Date :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="TransactionDate" name="TransactionDate" value="'.$TransactionDate.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Updated By :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="UserID" name="UserID" value="'.$UserID.'"></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" name="Upd_Button" value="Update" /></td></tr> 

 <tr><td style="background-color:#FFF8C6;">Configuration Attachments :</td><td><table border="1"><tr><td align="center">Attachment Name</td><td align="center">Timestamp</td><td>Size</td><td align="center">By</td><td></td></tr>'.$attachment.'</table></td><td>'.$uploadattachment.'</td></tr>

 <tr><td style="background-color:#FFF8C6;">Handover Attachment :</td><td><table border="1"><tr><td align="center">Attachment Name</td><td align="center">Timestamp</td><td>Size</td><td align="center">By</td><td></td></tr>'.$attachment1.'</table></td><td>'.$uploadattachment1.'</td></tr>


 <tr><td style="background-color:#FFF8C6;">Customer Segment :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="Cust_Segment" name="Cust_Segment" value="'.$Cust_Segment.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">Reseller :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="Reseller" name="Reseller" value="'.$Reseller.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Region :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="Region" name="Region" value="'.$Region.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">State :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="State" name="State" value="'.$State.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">Customer Site Name :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Cust_Site_Name" value="'.$Cust_Site_Name.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Service ID :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Service_ID" value="'.$Service_ID.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">CE WAN IP Address :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="CE_WAN_IP_Addr" value="'.$CE_WAN_IP_Addr.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">CE Backup IP Address :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="CE_Bkp_IP_Addr" value="'.$CE_Bkp_IP_Addr.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Node / PE :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Node_PE" value="'.$Node_PE.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Customer Name :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Cust_Name" value="'.$Cust_Name.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Customer ID :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Cust_ID" value="'.$Cust_ID.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Service Type :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="Svc_Type" name="Svc_Type" value="'.$Svc_Type.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">Branch Code :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Code" value="'.$Br_Code.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Branch Name :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Name" value="'.$Br_Name.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Branch Address1 :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Add1" value="'.$Br_Add1.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Branch Address2 :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Add2" value="'.$Br_Add2.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Branch Address3 :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Add3" value="'.$Br_Add3.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Branch Address4 :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Br_Add4" value="'.$Br_Add4.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">First Customer Contact Person :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="First_Cust_Contact" value="'.$First_Cust_Contact.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Second Customer Contact Person :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Second_Cust_Contact" value="'.$Second_Cust_Contact.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Third Customer Contact Person :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Third_Cust_Contact" value="'.$Third_Cust_Contact.'"></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Root Service ID :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Root_Service_ID" value="'.$Root_Service_ID.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">PS Number :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Speed" value="'.$Speed.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">BS Number :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="SLG" value="'.$SLG.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Miscellaneous :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Misc" value="'.$Misc.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">Backup Type :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" style="background-color:#FFF8C6;" readonly="true" type="text" id="Bkp_Type" name="Bkp_Type" value="'.$Bkp_Type.'"></td></tr>
 <tr><td style="background-color:#FFF8C6;">Backup Number :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="Bkp_No" value="'.$Bkp_No.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">ISDN Login ID :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="ISDN_Login_ID" value="'.$ISDN_Login_ID.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">ISDN PE (PRI) :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="ISDN_PE_PRI" value="'.$ISDN_PE_PRI.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">ISDN PE (SEC) :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="ISDN_PE_SEC" value="'.$ISDN_PE_SEC.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">LAN IP Address :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true"  style="background-color:#FFF8C6;" readonly="true" type="text" name="LAN_IP_Addr" value="'.$LAN_IP_Addr.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">HQ IP Address :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="HQ_IP_Addr" value="'.$HQ_IP_Addr.'"'.$readonly.'></td></tr> 
 <tr><td style="background-color:#FFF8C6;">UPE Loopback IP :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" name="UPE_Loopback_IP_Addr" value="'.$UPE_Loopback_IP_Addr.'"'.$readonly.'></td></tr> 
 </table> 
 </form><br>

 ';
 ?> 

 </body> 
 </html> 
