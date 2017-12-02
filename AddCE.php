<?php include '../../inc/CROCSLogin.php';  ?>

<html> 
 <head><title>Add Unmanaged Device</title> 
   <script type="text/javascript">

   function upd_TACACS(x)
   {
   document.getElementById("CROCS_TACACS").setAttribute("value",x);
   }

   function upd_KIWI(x)
   {
   document.getElementById("CROCS_KIWI").setAttribute("value",x);
   }

   function upd_RouterType(x)
   {
   document.getElementById("CROCS_ROUTER_TYPE").setAttribute("value",x);
   }

   function upd_RouterModel(x)
   {
   document.getElementById("CROCS_ROUTER_MODEL").setAttribute("value",x);
   }

   function upd_CEManagement(x)
   {
   document.getElementById("CROCS_CE_MANAGEMENT").setAttribute("value",x);
   }
 
   function upd_HandoverStatus(x)
   {
   document.getElementById("HANDOVER_STATUS").setAttribute("value",x);
   }
 
   </script>
  
   <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

 </head> 

 <body> 

 <h2>Add Unmanaged Device</h2><p> 

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
include '/../../inc/CROCSLogin.php'; 
 //Get CE_Hostname  
 //$CE_Hostname=$_GET['CE_Hostname']; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 
 //$Role=$_GET['R']; 
 /*if ($Role == 'U') {
    $disable = '';
    $readonly = '';}
 else {
    $disable = ' disabled ';
    $readonly = ' style="background-color:#FFF8C6;" readonly="true" ';}*/

 $disable = ' disabled ';
 $readonly = ' style="background-color:#FFF8C6;" readonly="true" ';

//Get Router Type
 $sql4 = "SELECT DISTINCT ROUTER_TYPE FROM DATA_MAPPING_ROUTER_TYPE_MODEL ORDER BY ROUTER_TYPE ASC";
 $stid4 = oci_parse($cemdb, $sql4);
 oci_execute($stid4);
 if (!$stid4) {
   echo "DB Error, could not query the database<br>";
   exit;
    }
 $list1 = '';
 while (($row4 = oci_fetch_array($stid4)) != false) {
          $list1 = $list1.'<option value="'.$row4["ROUTER_TYPE"].'">'.$row4["ROUTER_TYPE"].'</option>';
          };

 $sql5 = "SELECT DISTINCT ROUTER_MODEL FROM DATA_MAPPING_ROUTER_TYPE_MODEL ORDER BY ROUTER_MODEL ASC";
 $stid5 = oci_parse($cemdb, $sql5);
  oci_execute($stid5);
 if (!$stid5) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 $list2 = '';
 while (($row5 = oci_fetch_array($stid5)) != false) {
          $list2 = $list2.'<option value="'.$row5["ROUTER_MODEL"].'">'.$row5["ROUTER_MODEL"].'</option>';
          };

 //Create Form
 echo '
 <form action="processAdd.php?U='.$U.'" method="post"> 
 <table border="1"> 
<tr><td style="background-color:#FFF8C6;">CE Equipment/Hostname :</td><td><input size="60" type="text" id="CE_HOSTNAME" name="CE_HOSTNAME" value=""></td><td></td></tr>

 <!--Protect input field and create drop down list-->
 <tr><td style="background-color:#FFF8C6;">TACACS :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CROCS_TACACS" name="CROCS_TACACS" value=""></td>
     <td><select onchange="upd_TACACS(value)">
       <option value="">Please select TACACS indicator</option>
       <option value="Y">Y</option>
       <option value="N">N</option>
       </select></td> 
</tr>

 <!--Protect input field and create drop down list-->
 <tr><td style="background-color:#FFF8C6;">KIWI :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CROCS_KIWI" name="CROCS_KIWI" value=""></td>
     <td><select onchange="upd_KIWI(value)">
       <option value="">Please select KIWI indicator</option>
       <option value="Y">Y</option>
       <option value="N">N</option>
       </select></td> 
 </tr>
 ';  ?> 

 <tr><td style="background-color:#FFF8C6;">CDF Sign Off Date :</td><td><input name="CROCS_CDF_SIGN_OFF_DATE" id="CROCS_CDF_SIGN_OFF_DATE" type="text" size="25" value=""><a href="javascript:NewCal('CROCS_CDF_SIGN_OFF_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td><td>Format: 'dd-mm-yyyy'</td></tr>

 <?php echo '
 <tr><td style="background-color:#FFF8C6;">CDF Personnel :</td><td><input size="60" type="text" id="CROCS_CDF_PERSONNEL" name="CROCS_CDF_PERSONNEL" value=""></td><td></td></tr>
<tr><td style="background-color:#FFF8C6;">Handover Status:</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="HANDOVER_STATUS" name="HANDOVER_STATUS" value=""></td>
 <td><select onchange="upd_HandoverStatus(value)">
       <option value="">Please select Handover Status</option>
       <option value="Complete">Complete</option>
       <option value="Incomplete-No Test Result Attachment">Incomplete-No Test Result Attachment</option>
       <option value="Incomplete-Not Follow HO Checklist">Incomplete-Not Follow HO Checklist</option>
       <option value="Incomplete-Connectivity Issue">Incomplete-Connectivity Issue</option>
       <option value="Incomplete-Stability Issue">Incomplete-Stability Issue</option>
       <option value="Incomplete-Others">Incomplete-Others</option>
       </select></td></tr>
 <tr><td style="background-color:#FFF8C6;">Tunnel IP :</td><td><input size="60" type="text" id="CROCS_TUNNEL_IP" name="CROCS_TUNNEL_IP" value=""></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
 <tr><td style="background-color:#FFF8C6;">Loopback IP :</td><td><input size="60" type="text" id="CROCS_LOOPBACKIP_ADDR" name="CROCS_LOOPBACKIP_ADDR" value=""></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
 <tr><td style="background-color:#FFF8C6;">LAN IP :</td><td><input size="60" type="text" id="LAN_IP" name="LAN_IP" value=""></td><td>Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</td></tr>
 <tr><td style="background-color:#FFF8C6;">CR / CTT  Description :</td><td><input size="60" type="text" id="CROCS_CR_NOTES" name="CROCS_CR_NOTES" value=""></td></tr>
 <tr><td style="background-color:#FFF8C6;">CR Order / CTT No. :</td><td><input size="60" type="text" id="CROCS_CR_ORDER_NUMBER" name="CROCS_CR_ORDER_NUMBER" value=""></td></tr>
 <tr><td style="background-color:#FFF8C6;">CE Management:</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CROCS_CE_MANAGEMENT" name="CROCS_CE_MANAGEMENT" value=""></td>
 <td><select onchange="upd_CEManagement(value)">
       <option value="">Please select CE Management</option>
       <option value="Customer">Customer</option>
       <option value="Reseller">Reseller</option>
       <option value="TM">TM</option>
       </select></td></tr>
 <tr><td style="background-color:#FFF8C6;">CE Serial Number :</td><td><input size="60" type="text" id="CROCS_CE_SERIAL_NUMBER" name="CROCS_CE_SERIAL_NUMBER" value=""></td></tr>
 <tr><td style="background-color:#FFF8C6;">Router Type :</td><td><input size="60" style="background-color:#FFF8C6;" readonly="true" type="text" id="CROCS_ROUTER_TYPE" name="CROCS_ROUTER_TYPE" value=""></td>
 <td><form name="routerType_form" method="post" action="">
     <select name="routerType" onchange="upd_RouterType(value)">
       <option value="">Please select Router Type</option>'.$list1.'
       </select></form></td> </tr>
<tr><td style="background-color:#FFF8C6;">Router Model :</td><td><input size="60" type="text" id="CROCS_ROUTER_MODEL" name="CROCS_ROUTER_MODEL" value=""></td>
  </tr>
 ';  ?> 

 <tr><td style="background-color:#FFF8C6;">Latest Preventive Maintenance Date :</td><td><input size="25" type="text" id="CROCS_LATEST_PM_DATE" name="CROCS_LATEST_PM_DATE" value=""><a href="javascript:NewCal('CROCS_LATEST_PM_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td><td>Format: 'dd-mm-yyyy'</td></tr>

 <?php echo '
 <tr><td colspan="2" align="center"><input type="submit" name="Upd_Button" value="Add" /></td></tr> 
 </table> 
 </form><br>

 ';

 ?> 


 </body> 
 </html> 
