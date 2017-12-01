<?php
 // Inialize session
 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    }

// Process cookie to get previous search parameters

if (isset($_COOKIE["optionA"])) {
  if ($_COOKIE["optionA"]=="Download") {
     $filterA_View_Val = "";
     $filterB_Download_Val = "checked";
    }
  else if ($_COOKIE["optionA"]=="View") {
     $filterB_Download_Val = "";
     $filterA_View_Val = "checked";
    }
  }
else {
     $filterB_Download_Val = "";
     $filterA_View_Val = "checked";
  }
  
if (isset($_COOKIE["option1"])) {
  if ($_COOKIE["option1"]=="All") {
     $filter1_All_Val = "checked";
     $filter1_FilterBy_Val = "";
     $filter1_SvcInstallDate_Val = "";
     }
  else if ($_COOKIE["option1"]=="Filter by") {
     $filter1_All_Val = "";
     $filter1_FilterBy_Val = "checked";
     $filter1_SvcInstallDate_Val = "";
     }
  else if ($_COOKIE["option1"]=="SvcInstallDate") {
     $filter1_All_Val = "";
     $filter1_FilterBy_Val = "";
     $filter1_SvcInstallDate_Val = "checked";
     }
  }
else {
     $filter1_All_Val = "";
     $filter1_FilterBy_Val = "checked";
     $filter1_SvcInstallDate_Val = "";
  }


if (isset($_COOKIE["option2"])) {
  if ($_COOKIE["option2"]=="Nullvalue") {
     $filter2_blank_Val = "checked";
     $filter2_contains_Val = "";}
  else if ($_COOKIE["option2"]=="InputValue") {
     $filter2_blank_Val = "";
     $filter2_contains_Val = "checked";}
  }
else {
     $filter2_blank_Val = "checked";
     $filter2_contains_Val = "";
  }
  
if (isset($_COOKIE["Select_Field"])) {
   $Select_Field = $_COOKIE["Select_Field"];}
else {
   $Select_Field = "";}
 
if (isset($_COOKIE["Sel_Field_Value"])) {
   $Sel_Field_Value = "value=".$_COOKIE["Sel_Field_Value"];}
else {
   $Sel_Field_Value = "";}
   
if (isset($_COOKIE["SvcStart"])) {
   $SvcStart = $_COOKIE["SvcStart"];}
else {
   $SvcStart = date('d-m-Y', time() - 60 * 60 * 24);}

if (isset($_COOKIE["SvcEnd"])) {
   $SvcEnd = $_COOKIE["SvcEnd"];}
else {
   $SvcEnd = date('d-m-Y', time());}

?>

<html> 
 <head><title>List CE</title>   
   <script type="text/javascript">
   function upd_selection()
   {
   document.filter.contains.checked=true;
   }
   </script>
   <script language="javascript" type="text/javascript" src="datetimepicker.js">
   </script>
   
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
	
	
	table
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:11px;
	}
	
	
	/*
	table
	{
		/*font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;*/
		font-size:13px;

		
		text-align:center;
		border: thin
		
		overflow: hidden;
		
		box-shadow: 0 0px 2px rgba(0,0,0,0.2);
		display:block;

	}*/

	
  
   </style>
       
 </head> 

 <body> 
 <h2>Search Customer Equipment</h2><p> 


<div class="wrapper">
 <form name="filter" action="processList.php?U=<?php echo $U; ?>" method="post"> 
 <table border="1" align="center"> 
 <tr><td rowspan="3"><table><tr><td><input type="radio" name ="filterA" value="View" <?php echo $filterA_View_Val; ?>> View </td></tr>
 <tr><td><input type="radio" name ="filterA" value="Download" <?php echo $filterB_Download_Val; ?>> Download </td></tr></table></td></tr>
 <tr><td rowspan="2"><table><tr><td><input type="radio" name ="filter1" value="All" <?php echo $filter1_All_Val; ?>> All </td><td></td><td></td><td></td></tr> 
 <tr><td colspan="5"><input type="radio" name ="filter1" value="Filter by" <?php echo $filter1_FilterBy_Val; ?>> Filter by 
 <select name="Select_Field">
       <option <?php if ($Select_Field == "CROCS_ORDER_SVC_ID") echo " selected ";?> value="CROCS_ORDER_SVC_ID">Order Service No</option>
       <option <?php if ($Select_Field == "CROCS_CUST_NAME") echo " selected ";?>value="CROCS_CUST_NAME">Customer Name</option>
       <option <?php if ($Select_Field == "CROCS_CUST_SITE_NAME") echo " selected ";?>value="CROCS_CUST_SITE_NAME">Customer Site Name</option>
       <option <?php if ($Select_Field == "CROCS_CUST_ID") echo " selected ";?>value="CROCS_CUST_ID">Customer ID</option>
       <option <?php if ($Select_Field == "CROCS_REGION") echo " selected ";?>value="CROCS_REGION">Region</option>
       <option <?php if ($Select_Field == "CROCS_STATE") echo " selected ";?>value="CROCS_STATE">State</option>
       <option <?php if ($Select_Field == "CROCS_RESELLER") echo " selected ";?>value="CROCS_RESELLER">Reseller</option>
       <option <?php if ($Select_Field == "CROCS_NODE_PE") echo " selected ";?> value="CROCS_NODE_PE">Node/PE</option>
       <option <?php if ($Select_Field == "CROCS_BR_CODE") echo " selected ";?>value="CROCS_BR_CODE">Branch Code</option>
       <option <?php if ($Select_Field == "CROCS_CUST_CONTACT_1") echo " selected ";?>value="CROCS_CUST_CONTACT_1">First Customer Contact</option>
       <option <?php if ($Select_Field == "CROCS_CUST_CONTACT_2") echo " selected ";?>value="CROCS_CUST_CONTACT_2">Second Customer Contact</option>
       <option <?php if ($Select_Field == "CROCS_CUST_CONTACT_3") echo " selected ";?>value="CROCS_CUST_CONTACT_3">Third Customer Contact</option>
       <option <?php if ($Select_Field == "CROCS_PRODUCT_NAME") echo " selected ";?>value="CROCS_PRODUCT_NAME">Product Name</option>
       <option <?php if ($Select_Field == "CROCS_LOB") echo " selected ";?>value="CROCS_LOB">Line of Business</option>
       <option <?php if ($Select_Field == "CROCS_COB") echo " selected ";?>value="CROCS_COB">Code of Business</option>
       <option <?php if ($Select_Field == "CROCS_TACACS") echo " selected ";?>value="CROCS_TACACS">TACACS</option>  
       <option <?php if ($Select_Field == "CROCS_KIWI") echo " selected ";?>value="CROCS_KIWI">KIWI</option>
       <option <?php if ($Select_Field == "CROCS_CE_MGMT") echo " selected ";?>value="CROCS_CE_MGMT">CE Management</option>
       <option <?php if ($Select_Field == "CROCS_ASSET_STATUS") echo " selected ";?>value="CROCS_ASSET_STATUS">Asset Status</option>
       <option <?php if ($Select_Field == "CROCS_PS_ID") echo " selected ";?>value="CROCS_PS_ID">Primary Service ID</option>
       <option <?php if ($Select_Field == "CROCS_PS_LEVEL") echo " selected ";?> value="CROCS_PS_LEVEL">Primary Service Level</option>
       <option <?php if ($Select_Field == "CROCS_PS_BANDWIDTH") echo " selected ";?>value="CROCS_PS_BANDWIDTH">Primary Service Bandwidth</option>     
       <option <?php if ($Select_Field == "CROCS_PS_ACCESS_TYPE") echo " selected ";?>value="CROCS_PS_ACCESS_TYPE">Primary Service ID Access Type</option>
       <option <?php if ($Select_Field == "CROCS_PS_ROUTING_PROTOCOL") echo " selected ";?>value="CROCS_PS_ROUTING_PROTOCOL">PS_Routing Protocol</option>
       <option <?php if ($Select_Field == "CROCS_PS_CE_WAN_IP") echo " selected ";?>value="CROCS_PS_CE_WAN_IP">PS_CE WAN IP Address</option>
       <option <?php if ($Select_Field == "CROCS_PS_FRAMED_IP") echo " selected ";?>value="CROCS_PS_FRAMED_IP">PS_Framed IP Address</option>
       <option <?php if ($Select_Field == "CROCS_BS_ID") echo " selected ";?>value="CROCS_BS_ID">Secondary Service ID</option>
       <option <?php if ($Select_Field == "CROCS_BS_LEVEL") echo " selected ";?> value="CROCS_BS_LEVEL">Secondary Service Level</option>
       <option <?php if ($Select_Field == "CROCS_BS_BANDWIDTH") echo " selected ";?>value="CROCS_BS_BANDWIDTH">Secondary Service Bandwidth</option>     
       <option <?php if ($Select_Field == "CROCS_BS_ACCESS_TYPE") echo " selected ";?>value="CROCS_BS_ACCESS_TYPE">Secondary Service ID Access Type</option>
       <option <?php if ($Select_Field == "CROCS_BS_ROUTING_PROTOCOL") echo " selected ";?>value="CROCS_BS_ROUTING_PROTOCOL">BS_Routing Protocol</option>
       <option <?php if ($Select_Field == "CROCS_BS_CE_WAN_IP") echo " selected ";?>value="CROCS_BS_CE_WAN_IP">BS_CE WAN IP Address</option>
       <option <?php if ($Select_Field == "CROCS_BS_FRAMED_IP") echo " selected ";?>value="CROCS_BS_FRAMED_IP">BS_Framed IP Address</option>       
       <option <?php if ($Select_Field == "CROCS_QOS") echo " selected ";?>value="CROCS_QOS">QOS</option>
       <option <?php if ($Select_Field == "CROCS_PROFILE") echo " selected ";?>value="CROCS_PROFILE">Profile</option>
       <option <?php if ($Select_Field == "CROCS_FRAMED_PROTOCOL") echo " selected ";?>value="CROCS_FRAMED_PROTOCOL">Framed Protocol</option>
       <option <?php if ($Select_Field == "CROCS_INPUT_POLICY") echo " selected ";?>value="CROCS_INPUT_POLICY">Input Policy</option>
       <option <?php if ($Select_Field == "CROCS_OUTPUT_POLICY") echo " selected ";?>value="CROCS_OUTPUT_POLICY">Output Policy</option>
       <option <?php if ($Select_Field == "CROCS_HQ_IP") echo " selected ";?> value="CROCS_HQ_IP">HQ IP Address</option>
       <option <?php if ($Select_Field == "CROCS_LAN_IP") echo " selected ";?>value="CROCS_LAN_IP">LAN IP Address</option>        
       <option <?php if ($Select_Field == "CROCS_LOOPBACK_IP") echo " selected ";?>value="CROCS_LOOPBACK_IP">Loopback IP</option>  
       <option <?php if ($Select_Field == "CROCS_TUNNEL_IP") echo " selected ";?>value="CROCS_TUNNEL_IP">Tunnel IP</option>
       <option <?php if ($Select_Field == "CROCS_UPE_LOOPBACK_IP") echo " selected ";?>value="CROCS_UPE_LOOPBACK_IP">UPE Loopback IP</option>
       <option <?php if ($Select_Field == "CROCS_CE_SERIAL_NO") echo " selected ";?>value="CROCS_CE_SERIAL_NO">CE Serial Number</option>
       <option <?php if ($Select_Field == "CROCS_ROUTER_TYPE") echo " selected ";?>value="CROCS_ROUTER_TYPE">Router Type</option>
       <option <?php if ($Select_Field == "CROCS_ROUTER_MODEL") echo " selected ";?>value="CROCS_ROUTER_MODEL">Router Model</option>
       <option <?php if ($Select_Field == "CROCS_ROUTER_PACKAGE") echo " selected ";?> value="CROCS_ROUTER_PACKAGE">Router Package</option>
       <option <?php if ($Select_Field == "CROCS_CPE_ID") echo " selected ";?>value="CROCS_CPE_ID">CPE ID</option> 
       <option <?php if ($Select_Field == "CROCS_WAN_CE_INTERFACE") echo " selected ";?> value="CROCS_WAN_CE_INTERFACE">WAN CPE Interface</option>
       <option <?php if ($Select_Field == "CROCS_ROUTER_STATUS") echo " selected ";?>value="CROCS_ROUTER_STATUS">Router Status</option>        
       <option <?php if ($Select_Field == "CROCS_CE_PARTNER_MGMT") echo " selected ";?>value="CROCS_CE_PARTNER_MGMT">CE Partner Management</option>  
       <option <?php if ($Select_Field == "CROCS_CE_LEASE_CONTRACT_NO") echo " selected ";?>value="CROCS_CE_LEASE_CONTRACT_NO">CE Contract Leasing No.</option>
       <option <?php if ($Select_Field == "CROCS_CE_PO_NO") echo " selected ";?>value="CROCS_CE_PO_NO">CE Contract Purchase No.</option>
       <option <?php if ($Select_Field == "CROCS_CE_INVOCE_NO") echo " selected ";?>value="CROCS_CE_INVOCE_NO">CE Invoice No</option>
       <option <?php if ($Select_Field == "CROCS_CDF_PERSONNEL") echo " selected ";?>value="CROCS_CDF_PERSONNEL">CDF Personnel</option>
       <option <?php if ($Select_Field == "CROCS_HO_ORDER_TYPE") echo " selected ";?> value="CROCS_HO_ORDER_TYPE">Handover Order Type</option>
       <option <?php if ($Select_Field == "CROCS_HO_STATUS") echo " selected ";?>value="CROCS_HO_STATUS">Handover Status</option>        
       <option <?php if ($Select_Field == "CROCS_HO_REMARKS") echo " selected ";?>value="CROCS_HO_REMARKS">Handover Remarks/Notes</option> 
       <option <?php if ($Select_Field == "CROCS_HO_ACTIVITY_COMMENT") echo " selected ";?> value="CROCS_HO_ACTIVITY_COMMENT">Handover Activity Remarks</option>      
       <option <?php if ($Select_Field == "CROCS_CE_SERIAL_NUMBER") echo " selected ";?>value="CROCS_CE_SERIAL_NUMBER">CE Serial No.</option>
       <option <?php if ($Select_Field == "CROCS_CR_ORDER_NO") echo " selected ";?>value="CROCS_CR_ORDER_NO">CR Order No.</option> 
       <option <?php if ($Select_Field == "CROCS_CR_DESC") echo " selected ";?>value="CROCS_CR_DESC">CR Description</option>     
       <option <?php if ($Select_Field == "CROCS_CR_ORDER_TYPE") echo " selected ";?>value="CROCS_CR_ORDER_TYPE">CR Order Type</option>
       <option <?php if ($Select_Field == "CROCS_CR_STATUS") echo " selected ";?>value="CROCS_CR_STATUS">CR Status</option>   
       <option <?php if ($Select_Field == "CROCS_CTT_NO") echo " selected ";?> value="CROCS_CTT_NO">CTT No.</option>
       <option <?php if ($Select_Field == "CROCS_CTT_PRIORITY") echo " selected ";?>value="CROCS_CTT_PRIORITY">CTT Priority</option>        
       <option <?php if ($Select_Field == "CROCS_CTT_SVC_LEG") echo " selected ";?>value="CROCS_CTT_SVC_LEG">CTT Service/Leg For Which Ticket is Raised</option>  
       <option <?php if ($Select_Field == "CROCS_CTT_DESC") echo " selected ";?> value="CROCS_CTT_DESC">CTT Description</option>
       <option <?php if ($Select_Field == "CROCS_CTT_CAUSE_CAT") echo " selected ";?>value="CROCS_CTT_CAUSE_CAT">CTT Cause Category</option>               
       <option <?php if ($Select_Field == "CROCS_CTT_CAUSE_CODE") echo " selected ";?>value="CROCS_CTT_CAUSE_CODE">CTT Cause Code</option>     
       <option <?php if ($Select_Field == "CROCS_CTT_RES_CODE") echo " selected ";?>value="CROCS_CTT_RES_CODE">CTT Resolution Code</option>
       <option <?php if ($Select_Field == "CROCS_CTT_CLOSED_NAME") echo " selected ";?> value="CROCS_CTT_CLOSED_NAME">CTT Closed By Name</option>
       <option <?php if ($Select_Field == "CROCS_CTT_CLOSED_TEAM") echo " selected ";?>value="CROCS_CTT_CLOSED_TEAM">CTT Closed By Team</option>        
       <option <?php if ($Select_Field == "CROCS_PM_DESC") echo " selected ";?>value="CROCS_PM_DESC">Preventive Management Remarks</option> 
       <option <?php if ($Select_Field == "CROCS_UPDATED_BY") echo " selected ";?>value="CROCS_UPDATED_BY">Update By</option>
       <option <?php if ($Select_Field == "CROCS_HOSTNAME") echo " selected ";?>value="CROCS_HOSTNAME">Hostname</option>
     </select></td></tr>
      <tr><td><input type="radio" name ="filter1" id="SvcInstallDate" value="SvcInstallDate" <?php echo $filter1_SvcInstallDate_Val; ?>> Service Installation Date: </td>
      <td> From </td>
      <td><input name="SvcStart" id="SvcStart" type="text" size="10" value="<?php echo $SvcStart; ?>"> <a href="javascript:NewCal('SvcStart','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
      </td><tr><td></td><td> To </td>
      <td><input name="SvcEnd" id="SvcEnd" type="text" size="10" value ="<?php echo $SvcEnd; ?>"> <a href="javascript:NewCal('SvcEnd','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
     </td></tr></tr>
     </table></td></tr>

     <td><table><tr><td><input type="radio" name = "filter2" id="blank" value="Nullvalue" <?php echo $filter2_blank_Val; ?>> Blank</td><td></td></tr><tr><td><input type="radio" name = "filter2" id="contains" value="InputValue" <?php echo $filter2_contains_Val; ?>> Contains </td>
     <td><input type="text" name="Sel_Field_Value" <?php echo $Sel_Field_Value; ?> onFocus="upd_selection()" /></td></tr></table>

 <tr><td colspan="5" align="center"><input type="submit" value="Submit" /></td></tr> 
 </table>
 </form> 
</div>

 </body> 
 </html> 
