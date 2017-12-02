<html>
<?php
error_reporting(E_ERROR);
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Cache-Control: max-age=0");
header("Pragma: no-cache"); 



?>

<head><title>Update CE</title> 

    <style type="text/css">
      body { font-size: 80%; font-family: 'Lucida Grande', Verdana, Arial, Sans-Serif; }
      ul#tabs { list-style-type: none; margin: 30px 0 0 0; padding: 0 0 0.3em 0; }
      ul#tabs li { display: inline; }
      ul#tabs li a { color: #42454a; background-color: #dedbde; border: 1px solid #c9c3ba; border-bottom: none; padding: 0.3em; text-decoration: none; }
      ul#tabs li a:hover { background-color:  #82e0aa; }
      ul#tabs li a.selected { color: #000; background-color:  #aed6f1; font-weight: bold; padding: 0.7em 0.3em 0.38em 0.3em; }
      div.tabContent { border: 1px solid #c9c3ba; padding: 0.5em; background-color: #f1f0ee; }
      div.tabContent.hide { display: none; }
	  
	  h1
	  {
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:15px;
		text-align:center;
		
		width:100%;
		height:20px;
		background: #FFFFFF;
		margin:20px auto;
		box-shadow: 0 10px 6px -6px #777;
	  }
	  
	  ul
	  {
		  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		  Verdana, serif, Arial;
		  font-size:12px;
	  }
	  
	  table
	  {
		  font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		  Verdana, serif, Arial;
		  font-size:12px;
	  }
	  
    </style>

    <script type="text/javascript">
    //<![CDATA[

    var tabLinks = new Array();
    var contentDivs = new Array();

    function init() {

      // Grab the tab links and content divs from the page
      var tabListItems = document.getElementById('tabs').childNodes;
      for ( var i = 0; i < tabListItems.length; i++ ) {
        if ( tabListItems[i].nodeName == "LI" ) {
          var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
          var id = getHash( tabLink.getAttribute('href') );
          tabLinks[id] = tabLink;
          contentDivs[id] = document.getElementById( id );
        }
      }

      // Assign onclick events to the tab links, and
      // highlight the first tab
      var i = 0;

      for ( var id in tabLinks ) {
        tabLinks[id].onclick = showTab;
        tabLinks[id].onfocus = function() { this.blur() };
        if ( i == 0 ) tabLinks[id].className = 'selected';
        i++;
      }

      // Hide all content divs except the first
      var i = 0;

      for ( var id in contentDivs ) {
        if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
        i++;
      }
    }

    function showTab() {
      var selectedId = getHash( this.getAttribute('href') );

      // Highlight the selected tab, and dim all others.
      // Also show the selected content div, and hide all others.
      for ( var id in contentDivs ) {
        if ( id == selectedId ) {
          tabLinks[id].className = 'selected';
          contentDivs[id].className = 'tabContent';
        } else {
          tabLinks[id].className = '';
          contentDivs[id].className = 'tabContent hide';
        }
      }

      // Stop the browser following the link
      return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
      for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
      }
    }

    function getHash( url ) {
      var hashPos = url.lastIndexOf ( '#' );
      return url.substring( hashPos + 1 );
    }

    //]]>
    </script>
<!--mula script sini-->
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
   document.getElementById("CROCS_CE_MGMT").setAttribute("value",x);
   }
   
   function upd_HandoverOrderType(x) 
   {
   document.getElementById("CROCS_HO_ORDER_TYPE").setAttribute("value",x);
   }
 
   function upd_HandoverStatus(x)
   {
   document.getElementById("CROCS_HO_STATUS").setAttribute("value",x);
   }
   
   function upd_HandoverActivityStatus(x)
   {
   document.getElementById("CROCS_HO_REMARKS").setAttribute("value",x);
   }
 
   </script>
  
   <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

<!--habis script sini-->

  </head>
  <body onload="init()">
  <!--mula script selepas body sini-->
 
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

  <!--habis script selepas body sini -->
  
  <!--mula php extract data -->
   <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php';  
 //include 'CROCSLogin.php'; //temp used this one  
 $CROCS_ORDER_SVC_ID=$_GET['CE_Hostname']; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 
 $Role=$_GET['R']; 
 if ($Role == 'U') {
    $disable = '';
    $readonly = '';}
 else {
    $disable = ' disabled ';
    $readonly = ' style="background-color:#FFA500;" readonly="true" ';}

 //Search database
    $where = " WHERE CROCS_ORDER_SVC_ID LIKE '%".$CROCS_ORDER_SVC_ID."%'"; 
    $sql = "SELECT CROCS_ORDER_SVC_ID, CROCS_CUST_NAME, CROCS_CUST_SITE_NAME, CROCS_CUST_ID, CROCS_REGION, CROCS_STATE,CROCS_RESELLER,";
    $sql = $sql."CROCS_NODE_PE,CROCS_BR_CODE,CROCS_BR_ADD_1,CROCS_BR_ADD_2,CROCS_BR_ADD_3,CROCS_BR_ADD_4,CROCS_CUST_CONTACT_1,";
    $sql = $sql."CROCS_CUST_CONTACT_2,CROCS_CUST_CONTACT_3,CROCS_SVC_INSTALL_DATE,CROCS_PRODUCT_NAME,CROCS_LOB,CROCS_COB,CROCS_TACACS,";
    $sql = $sql."CROCS_KIWI,CROCS_CE_MGMT,CROCS_ASSET_STATUS,CROCS_PS_ID,CROCS_PS_LEVEL,CROCS_PS_BANDWIDTH,CROCS_PS_ACCESS_TYPE,";
    $sql = $sql."CROCS_PS_ROUTING_PROTOCOL,CROCS_PS_CE_WAN_IP,CROCS_PS_FRAMED_IP,CROCS_BS_ID,CROCS_BS_LEVEL,CROCS_BS_BANDWIDTH,";
    $sql = $sql."CROCS_BS_ACCESS_TYPE,CROCS_BS_ROUTING_PROTOCOL,CROCS_BS_CE_WAN_IP,CROCS_BS_FRAMED_IP,CROCS_QOS,CROCS_PROFILE,";
    $sql = $sql."CROCS_USERNAME,CROCS_PASSWORD,CROCS_FRAMED_PROTOCOL,CROCS_INPUT_POLICY,CROCS_OUTPUT_POLICY,CROCS_HQ_IP,CROCS_LAN_IP,";
    $sql = $sql."CROCS_LOOPBACK_IP,CROCS_UPE_LOOPBACK_IP,CROCS_TUNNEL_IP,CROCS_CE_SERIAL_NO,CROCS_ROUTER_TYPE,CROCS_ROUTER_MODEL,";
    $sql = $sql."CROCS_ROUTER_PACKAGE,CROCS_WAN_CE_INTERFACE,CROCS_ROUTER_STATUS,CROCS_WARRANTY_DATE,CROCS_CE_PARTNER_MGMT,";
    $sql = $sql."CROCS_CE_LEASE_CONTRACT_NO,CROCS_CE_EXPIRY_DATE,CROCS_CE_PO_NO,CROCS_CE_INVOCE_NO,CROCS_CDF_SIGN_OFF_DATE,";
    $sql = $sql."CROCS_CDF_PERSONNEL,CROCS_ORDER_NUMBER,CROCS_HO_ORDER_TYPE,CROCS_HO_STATUS,CROCS_HO_REMARKS,CROCS_HO_ACTIVITY_COMMENT,CROCS_CR_ORDER_NO,";
    $sql = $sql."CROCS_CR_DESC,CROCS_CR_CREATED_DATE,CROCS_CR_ORDER_TYPE,CROCS_CR_STATUS,CROCS_CTT_NO,CROCS_CTT_CREATED_DATE,";
    $sql = $sql."CROCS_CTT_CLOSED_DATE,CROCS_CTT_PRIORITY,CROCS_CTT_SVC_LEG,CROCS_CTT_DESC,CROCS_CTT_CAUSE_CAT,CROCS_CTT_CAUSE_CODE,";
    $sql = $sql."CROCS_CTT_RES_CODE,CROCS_CTT_CLOSED_NAME,CROCS_CTT_CLOSED_TEAM,CROCS_LATEST_PM_DATE,CROCS_PM_DESC,CROCS_UPDATED_DATE,";
    $sql = $sql."CROCS_UPDATED_BY,CROCS_MANAGED_IND,CROCS_MONITOR_IND,CROCS_UPE_HOSTNAME,CROCS_UPE_ACCESS_PORT,CROCS_UPE_TRUNK_PORT,";
    $sql = $sql."CROCS_EPE_NAME,CROCS_EPE_PORT,CROCS_CPE_ID,CROCS_WAN_CPE_INTERFACE,CROCS_CPE_RESELLER, CROCS_BAU_SERVICE_ID,CROCS_BS_NODE_PE,CROCS_BS_LAN_IP,";
    $sql = $sql."CROCS_BS_UPE_LOOPBACK_IP,CROCS_BS_UPE_HOSTNAME,CROCS_BS_UPE_ACCESS_PORT,CROCS_BS_UPE_TRUNK_PORT,CROCS_BS_EPE_NAME,CROCS_BS_EPE_PORT, ";
	$sql = $sql."CROCS_HO_ALERT_REMARKS, CROCS_BS_PROFILE, CROCS_BS_USERNAME, CROCS_BS_PASSWORD, CROCS_BS_QOS, CROCS_PE_INTERFACE_NAME, CROCS_BS_PE_INTERFACE_NAME ";
    $sql = $sql."FROM DATA_MAPPING_CROCS".$where;
    
     $stid1 = oci_parse($cemdb, $sql);
	 
     $result = oci_execute($stid1);
     if (!$stid1) {
        echo 'DB Error, could not query the database<br>';
        exit;
        }
     else {
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
	oci_define_by_name($stid1, 'CROCS_ORDER_NUMBER', $CROCS_ORDER_NUMBER);	
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
    oci_define_by_name($stid1, 'CROCS_UPE_HOSTNAME', $CROCS_UPE_HOSTNAME);
    oci_define_by_name($stid1, 'CROCS_UPE_ACCESS_PORT', $CROCS_UPE_ACCESS_PORT);
    oci_define_by_name($stid1, 'CROCS_UPE_TRUNK_PORT', $CROCS_UPE_TRUNK_PORT);
    oci_define_by_name($stid1, 'CROCS_EPE_NAME', $CROCS_EPE_NAME);
    oci_define_by_name($stid1, 'CROCS_EPE_PORT', $CROCS_EPE_PORT);
    oci_define_by_name($stid1, 'CROCS_WAN_CPE_INTERFACE', $CROCS_WAN_CPE_INTERFACE);
	oci_define_by_name($stid1, 'CROCS_CPE_RESELLER', $CROCS_CPE_RESELLER);
    oci_define_by_name($stid1, 'CROCS_BAU_SERVICE_ID', $CROCS_BAU_SERVICE_ID);
    oci_define_by_name($stid1, 'CROCS_BS_NODE_PE', $CROCS_BS_NODE_PE);
    oci_define_by_name($stid1, 'CROCS_BS_LAN_IP', $CROCS_BS_LAN_IP);
    oci_define_by_name($stid1, 'CROCS_BS_UPE_LOOPBACK_IP', $CROCS_BS_UPE_LOOPBACK_IP);
    oci_define_by_name($stid1, 'CROCS_BS_UPE_HOSTNAME', $CROCS_BS_UPE_HOSTNAME);
    oci_define_by_name($stid1, 'CROCS_BS_UPE_ACCESS_PORT', $CROCS_BS_UPE_ACCESS_PORT);
    oci_define_by_name($stid1, 'CROCS_BS_UPE_TRUNK_PORT', $CROCS_BS_UPE_TRUNK_PORT);
    oci_define_by_name($stid1, 'CROCS_BS_EPE_NAME', $CROCS_BS_EPE_NAME);
    oci_define_by_name($stid1, 'CROCS_BS_EPE_PORT', $CROCS_BS_EPE_PORT);
	oci_define_by_name($stid1, 'CROCS_HO_ALERT_REMARKS', $CROCS_HO_ALERT_REMARKS);
	oci_define_by_name($stid1, 'CROCS_BS_PROFILE', $CROCS_BS_PROFILE);
	oci_define_by_name($stid1, 'CROCS_BS_USERNAME', $CROCS_BS_USERNAME);
	oci_define_by_name($stid1, 'CROCS_BS_PASSWORD', $CROCS_BS_PASSWORD);
	oci_define_by_name($stid1, 'CROCS_BS_QOS', $CROCS_BS_QOS);
	oci_define_by_name($stid1, 'CROCS_PE_INTERFACE_NAME', $CROCS_PE_INTERFACE_NAME);
	oci_define_by_name($stid1, 'CROCS_BS_PE_INTERFACE_NAME', $CROCS_BS_PE_INTERFACE_NAME);
    }
 if ($row1 = oci_fetch_array($stid1, OCI_ASSOC+OCI_RETURN_LOBS)) {
	$CROCS_ORDER_SVC_ID = $row1['CROCS_ORDER_SVC_ID'];

	if(empty($row1['CROCS_CUST_NAME']))
    {
        $CROCS_CUST_NAME = '';
    }
    else
    {
        $CROCS_CUST_NAME = $row1['CROCS_CUST_NAME'];
    }
	
	if(empty($row1['CROCS_CUST_SITE_NAME']))
    {
        $CROCS_CUST_SITE_NAME = '';
    }
    else
    {
        $CROCS_CUST_SITE_NAME = $row1['CROCS_CUST_SITE_NAME'];
    }

	if(empty($row1['CROCS_CUST_ID']))
    {
        $CROCS_CUST_ID = '';
    }
    else
    {
        $CROCS_CUST_ID = $row1['CROCS_CUST_ID'];
    }

	if(empty($row1['CROCS_REGION']))
    {
        $CROCS_REGION = '';
    }
    else
    {
        $CROCS_REGION = $row1['CROCS_REGION'];
    } 
	
	if(empty($row1['CROCS_STATE']))
    {
        $CROCS_STATE = '';
    }
    else
    {
        $CROCS_STATE = $row1['CROCS_STATE'];
    }
	
	if(empty($row1['CROCS_RESELLER']))
    {
        $CROCS_RESELLER = '';
    }
    else
    {
        $CROCS_RESELLER = $row1['CROCS_RESELLER'];
    }
    
	if(empty($row1['CROCS_NODE_PE']))
    {
        $CROCS_NODE_PE = '';
    }
    else
    {
        $CROCS_NODE_PE = $row1['CROCS_NODE_PE'];
    }
	
	if(empty($row1['CROCS_BR_CODE']))
    {
        $CROCS_BR_CODE = '';
    }
    else
    {
        $CROCS_BR_CODE = $row1['CROCS_BR_CODE'];
    }
	
	if(empty($row1['CROCS_BR_ADD_1']))
    {
        $CROCS_BR_ADD_1 = '';
    }
    else
    {
        $CROCS_BR_ADD_1 = $row1['CROCS_BR_ADD_1'];
    }
	    
	if(empty($row1['CROCS_BR_ADD_2']))
    {
        $CROCS_BR_ADD_2 = '';
    }
    else
    {
        $CROCS_BR_ADD_2 = $row1['CROCS_BR_ADD_2'];
    }
	
	if(empty($row1['CROCS_BR_ADD_3']))
    {
        $CROCS_BR_ADD_3 = '';
    }
    else
    {
        $CROCS_BR_ADD_3 = $row1['CROCS_BR_ADD_3'];
    }
	
	if(empty($row1['CROCS_BR_ADD_4']))
    {
        $CROCS_BR_ADD_4 = '';
    }
    else
    {
        $CROCS_BR_ADD_4 = $row1['CROCS_BR_ADD_4'];
    }
	
	if(empty($row1['CROCS_CUST_CONTACT_1']))
    {
        $CROCS_CUST_CONTACT_1 = '';
    }
    else
    {
        $CROCS_CUST_CONTACT_1 = $row1['CROCS_CUST_CONTACT_1'];
    }
	
	if(empty($row1['CROCS_CUST_CONTACT_2']))
    {
        $CROCS_CUST_CONTACT_2 = '';
    }
    else
    {
        $CROCS_CUST_CONTACT_2 = $row1['CROCS_CUST_CONTACT_2'];
    }
	
	if(empty($row1['CROCS_CUST_CONTACT_3']))
    {
        $CROCS_CUST_CONTACT_3 = '';
    }
    else
    {
        $CROCS_CUST_CONTACT_3 = $row1['CROCS_CUST_CONTACT_3'];
    }
	
	if(empty($row1['CROCS_SVC_INSTALL_DATE']))
    {
        $CROCS_SVC_INSTALL_DATE = '';
    }
    else
    {
        $CROCS_SVC_INSTALL_DATE = $row1['CROCS_SVC_INSTALL_DATE'];
    }
	
	if(empty($row1['CROCS_PRODUCT_NAME']))
    {
        $CROCS_PRODUCT_NAME = '';
    }
    else
    {
        $CROCS_PRODUCT_NAME = $row1['CROCS_PRODUCT_NAME'];
    }
	
	if(empty($row1['CROCS_LOB']))
    {
        $CROCS_LOB = '';
    }
    else
    {
        $CROCS_LOB = $row1['CROCS_LOB'];
    }
	
	if(empty($row1['CROCS_COB']))
    {
        $CROCS_COB = '';
    }
    else
    {
        $CROCS_COB = $row1['CROCS_COB'];
    }
	
	if(empty($row1['CROCS_TACACS']))
    {
        $CROCS_TACACS = '';
    }
    else
    {
        $CROCS_TACACS = $row1['CROCS_TACACS'];
    }
	
	if(empty($row1['CROCS_KIWI']))
    {
        $CROCS_KIWI = '';
    }
    else
    {
        $CROCS_KIWI = $row1['CROCS_KIWI'];
    }
	
	if(empty($row1['CROCS_CE_MGMT']))
    {
        $CROCS_CE_MGMT = '';
    }
    else
    {
        $CROCS_CE_MGMT = $row1['CROCS_CE_MGMT'];
    }
	
	if(empty($row1['CROCS_ASSET_STATUS']))
    {
        $CROCS_ASSET_STATUS = '';
    }
    else
    {
        $CROCS_ASSET_STATUS = $row1['CROCS_ASSET_STATUS'];
    }
	
	if(empty($row1['CROCS_PS_ID']))
    {
        $CROCS_PS_ID = '';
    }
    else
    {
        $CROCS_PS_ID = $row1['CROCS_PS_ID'];
    }
	
	if(empty($row1['CROCS_PS_LEVEL']))
    {
        $CROCS_PS_LEVEL = '';
    }
    else
    {
        $CROCS_PS_LEVEL = $row1['CROCS_PS_LEVEL'];
    }
	
	if(empty($row1['CROCS_PS_BANDWIDTH']))
    {
        $CROCS_PS_BANDWIDTH = '';
    }
    else
    {
        $CROCS_PS_BANDWIDTH = $row1['CROCS_PS_BANDWIDTH'];
    }
	
	if(empty($row1['CROCS_PS_ACCESS_TYPE']))
    {
        $CROCS_PS_ACCESS_TYPE = '';
    }
    else
    {
        $CROCS_PS_ACCESS_TYPE = $row1['CROCS_PS_ACCESS_TYPE'];
    }
	
	if(empty($row1['CROCS_PS_ROUTING_PROTOCOL']))
    {
        $CROCS_PS_ROUTING_PROTOCOL = '';
    }
    else
    {
        $CROCS_PS_ROUTING_PROTOCOL = $row1['CROCS_PS_ROUTING_PROTOCOL'];
    }
	
	if(empty($row1['CROCS_PS_CE_WAN_IP']))
    {
        $CROCS_PS_CE_WAN_IP = '';
    }
    else
    {
        $CROCS_PS_CE_WAN_IP = $row1['CROCS_PS_CE_WAN_IP'];
    }
	
	if(empty($row1['CROCS_PS_FRAMED_IP']))
    {
        $CROCS_PS_FRAMED_IP = '';
    }
    else
    {
        $CROCS_PS_FRAMED_IP = $row1['CROCS_PS_FRAMED_IP'];
    }
	
	if(empty($row1['CROCS_BS_ID']))
    {
        $CROCS_BS_ID = '';
    }
    else
    {
        $CROCS_BS_ID = $row1['CROCS_BS_ID'];
    }
	    
    if(empty($row1['CROCS_BS_LEVEL']))
    {
        $CROCS_BS_LEVEL = '';
    }
    else
    {
        $CROCS_BS_LEVEL = $row1['CROCS_BS_LEVEL'];
    }
	
	if(empty($row1['CROCS_BS_BANDWIDTH']))
    {
        $CROCS_BS_BANDWIDTH = '';
    }
    else
    {
        $CROCS_BS_BANDWIDTH = $row1['CROCS_BS_BANDWIDTH'];
    }
	
	if(empty($row1['CROCS_BS_ACCESS_TYPE']))
    {
        $CROCS_BS_ACCESS_TYPE = '';
    }
    else
    {
        $CROCS_BS_ACCESS_TYPE = $row1['CROCS_BS_ACCESS_TYPE'];
    }
	
	if(empty($row1['CROCS_BS_ROUTING_PROTOCOL']))
    {
        $CROCS_BS_ROUTING_PROTOCOL = '';
    }
    else
    {
        $CROCS_BS_ROUTING_PROTOCOL = $row1['CROCS_BS_ROUTING_PROTOCOL'];
    }
 
	if(empty($row1['CROCS_BS_CE_WAN_IP']))
    {
        $CROCS_BS_CE_WAN_IP = '';
    }
    else
    {
        $CROCS_BS_CE_WAN_IP = $row1['CROCS_BS_CE_WAN_IP'];
    }
	
	if(empty($row1['CROCS_BS_FRAMED_IP']))
    {
        $CROCS_BS_FRAMED_IP = '';
    }
    else
    {
        $CROCS_BS_FRAMED_IP = $row1['CROCS_BS_FRAMED_IP'];
    }
	
    if(empty($row1['CROCS_QOS']))
    {
        $CROCS_QOS = '';
    }
    else
    {
        $CROCS_QOS = $row1['CROCS_QOS'];
    }
	
	if(empty($row1['CROCS_PROFILE']))
    {
        $CROCS_PROFILE = '';
    }
    else
    {
        $CROCS_PROFILE = $row1['CROCS_PROFILE'];
    }
   
	if(empty($row1['CROCS_USERNAME']))
    {
        $CROCS_USERNAME = '';
    }
    else
    {
        $CROCS_USERNAME = $row1['CROCS_USERNAME'];
    }
	
	if(empty($row1['CROCS_PASSWORD']))
    {
        $CROCS_PASSWORD = '';
    }
    else
    {
        $CROCS_PASSWORD = $row1['CROCS_PASSWORD'];
    }

	if(empty($row1['CROCS_FRAMED_PROTOCOL']))
    {
        $CROCS_FRAMED_PROTOCOL = '';
    }
    else
    {
        $CROCS_FRAMED_PROTOCOL = $row1['CROCS_FRAMED_PROTOCOL'];
    }
	
	if(empty($row1['CROCS_INPUT_POLICY']))
    {
        $CROCS_INPUT_POLICY = '';
    }
    else
    {
        $CROCS_INPUT_POLICY = $row1['CROCS_INPUT_POLICY'];
    }
		
    if(empty($row1['CROCS_OUTPUT_POLICY']))
    {
        $CROCS_OUTPUT_POLICY = '';
    }
    else
    {
        $CROCS_OUTPUT_POLICY = $row1['CROCS_OUTPUT_POLICY'];
    }
	
	if(empty($row1['CROCS_HQ_IP']))
    {
        $CROCS_HQ_IP = '';
    }
    else
    {
        $CROCS_HQ_IP = $row1['CROCS_HQ_IP'];
    }
	
	if(empty($row1['CROCS_LAN_IP']))
    {
        $CROCS_LAN_IP = '';
    }
    else
    {
        $CROCS_LAN_IP = $row1['CROCS_LAN_IP'];
    }
	
	if(empty($row1['CROCS_LOOPBACK_IP']))
    {
        $CROCS_LOOPBACK_IP = '';
    }
    else
    {
        $CROCS_LOOPBACK_IP = $row1['CROCS_LOOPBACK_IP'];
    }
	
	if(empty($row1['CROCS_TUNNEL_IP']))
    {
        $CROCS_TUNNEL_IP = '';
    }
    else
    {
        $CROCS_TUNNEL_IP = $row1['CROCS_TUNNEL_IP'];
    }
	
	if(empty($row1['CROCS_UPE_LOOPBACK_IP']))
    {
        $CROCS_UPE_LOOPBACK_IP = '';
    }
    else
    {
        $CROCS_UPE_LOOPBACK_IP = $row1['CROCS_UPE_LOOPBACK_IP'];
    }

	if(empty($row1['CROCS_CE_SERIAL_NO']))
    {
        $CROCS_CE_SERIAL_NO = '';
    }
    else
    {
        $CROCS_CE_SERIAL_NO = $row1['CROCS_CE_SERIAL_NO'];
    }
	
	if(empty($row1['CROCS_ROUTER_TYPE']))
    {
        $CROCS_ROUTER_TYPE = '';
    }
    else
    {
        $CROCS_ROUTER_TYPE = $row1['CROCS_ROUTER_TYPE'];
    }
	
	if(empty($row1['CROCS_ROUTER_MODEL']))
    {
        $CROCS_ROUTER_MODEL = '';
    }
    else
    {
        $CROCS_ROUTER_MODEL = $row1['CROCS_ROUTER_MODEL'];
    }
	
	if(empty($row1['CROCS_ROUTER_PACKAGE']))
    {
        $CROCS_ROUTER_PACKAGE = '';
    }
    else
    {
        $CROCS_ROUTER_PACKAGE = $row1['CROCS_ROUTER_PACKAGE'];
    }
	
	if(empty($row1['CROCS_CPE_ID']))
    {
        $CROCS_CPE_ID = '';
    }
    else
    {
        $CROCS_CPE_ID = $row1['CROCS_CPE_ID'];
    }
	
	if(empty($row1['CROCS_WAN_CE_INTERFACE']))
    {
        $CROCS_WAN_CE_INTERFACE = '';
    }
    else
    {
        $CROCS_WAN_CE_INTERFACE = $row1['CROCS_WAN_CE_INTERFACE'];
    }
	
	if(empty($row1['CROCS_ROUTER_STATUS']))
    {
        $CROCS_ROUTER_STATUS = '';
    }
    else
    {
        $CROCS_ROUTER_STATUS = $row1['CROCS_ROUTER_STATUS'];
    }
		
	if(empty($row1['CROCS_WARRANTY_DATE']))
    {
        $CROCS_WARRANTY_DATE = '';
    }
    else
    {
        $CROCS_WARRANTY_DATE = $row1['CROCS_WARRANTY_DATE'];
    }
	
	if(empty($row1['CROCS_CE_PARTNER_MGMT']))
    {
        $CROCS_CE_PARTNER_MGMT = '';
    }
    else
    {
        $CROCS_CE_PARTNER_MGMT = $row1['CROCS_CE_PARTNER_MGMT'];
    }
	
	if(empty($row1['CROCS_CE_LEASE_CONTRACT_NO']))
    {
        $CROCS_CE_LEASE_CONTRACT_NO = '';
    }
    else
    {
        $CROCS_CE_LEASE_CONTRACT_NO = $row1['CROCS_CE_LEASE_CONTRACT_NO'];
    }
	
	if(empty($row1['CROCS_CE_EXPIRY_DATE']))
    {
        $CROCS_CE_EXPIRY_DATE = '';
    }
    else
    {
        $CROCS_CE_EXPIRY_DATE = $row1['CROCS_CE_EXPIRY_DATE'];
    }
	
	if(empty($row1['CROCS_CE_PO_NO']))
    {
        $CROCS_CE_PO_NO = '';
    }
    else
    {
        $CROCS_CE_PO_NO = $row1['CROCS_CE_PO_NO'];
    }
	
	if(empty($row1['CROCS_CE_INVOCE_NO']))
    {
        $CROCS_CE_INVOCE_NO = '';
    }
    else
    {
        $CROCS_CE_INVOCE_NO = $row1['CROCS_CE_INVOCE_NO'];
    }

	if(empty($row1['CROCS_CDF_SIGN_OFF_DATE']))
    {
        $CROCS_CDF_SIGN_OFF_DATE = '';
    }
    else
    {
        $CROCS_CDF_SIGN_OFF_DATE = $row1['CROCS_CDF_SIGN_OFF_DATE'];
    }
	
	if(empty($row1['CROCS_CDF_PERSONNEL']))
    {
        $CROCS_CDF_PERSONNEL = '';
    }
    else
    {
        $CROCS_CDF_PERSONNEL = $row1['CROCS_CDF_PERSONNEL'];
    }
	
	if(empty($row1['CROCS_ORDER_NUMBER']))
    {
        $CROCS_ORDER_NUMBER = '';
    }
    else
    {
        $CROCS_ORDER_NUMBER = $row1['CROCS_ORDER_NUMBER'];
    }
	
	if(empty($row1['CROCS_HO_ORDER_TYPE']))
    {
        $CROCS_HO_ORDER_TYPE = '';
    }
    else
    {
        $CROCS_HO_ORDER_TYPE = $row1['CROCS_HO_ORDER_TYPE'];
    }

	if(empty($row1['CROCS_HO_STATUS']))
    {
        $CROCS_HO_STATUS = '';
    }
    else
    {
        $CROCS_HO_STATUS = $row1['CROCS_HO_STATUS'];
    }
		
	if(empty($row1['CROCS_HO_REMARKS']))
    {
        $CROCS_HO_REMARKS = '';
    }
    else
    {
        $CROCS_HO_REMARKS = $row1['CROCS_HO_REMARKS'];
    }
	
	if(empty($row1['CROCS_HO_ACTIVITY_COMMENT']))
    {
        $CROCS_HO_ACTIVITY_COMMENT = '';
    }
    else
    {
        $CROCS_HO_ACTIVITY_COMMENT = $row1['CROCS_HO_ACTIVITY_COMMENT'];
    }
	 
	if(empty($row1['CROCS_CR_ORDER_NO']))
    {
        $CROCS_CR_ORDER_NO = '';
    }
    else
    {
        $CROCS_CR_ORDER_NO = $row1['CROCS_CR_ORDER_NO'];
    }
	
	if(empty($row1['CROCS_CR_DESC']))
    {
        $CROCS_CR_DESC = '';
    }
    else
    {
        $CROCS_CR_DESC = $row1['CROCS_CR_DESC'];
    }
	    
	if(empty($row1['CROCS_CR_CREATED_DATE']))
    {
        $CROCS_CR_CREATED_DATE = '';
    }
    else
    {
        $CROCS_CR_CREATED_DATE = $row1['CROCS_CR_CREATED_DATE'];
    }

	if(empty($row1['CROCS_CR_ORDER_TYPE']))
    {
        $CROCS_CR_ORDER_TYPE = '';
    }
    else
    {
        $CROCS_CR_ORDER_TYPE = $row1['CROCS_CR_ORDER_TYPE'];
    }
	
	if(empty($row1['CROCS_CR_STATUS']))
    {
        $CROCS_CR_STATUS = '';
    }
    else
    {
        $CROCS_CR_STATUS = $row1['CROCS_CR_STATUS'];
    }
	
	if(empty($row1['CROCS_CTT_NO']))
    {
        $CROCS_CTT_NO = '';
    }
    else
    {
        $CROCS_CTT_NO = $row1['CROCS_CTT_NO'];
    }
	
	if(empty($row1['CROCS_CTT_CREATED_DATE']))
    {
        $CROCS_CTT_CREATED_DATE = '';
    }
    else
    {
        $CROCS_CTT_CREATED_DATE = $row1['CROCS_CTT_CREATED_DATE'];
    }
	
	if(empty($row1['CROCS_CTT_CLOSED_DATE']))
    {
        $CROCS_CTT_CLOSED_DATE = '';
    }
    else
    {
        $CROCS_CTT_CLOSED_DATE = $row1['CROCS_CTT_CLOSED_DATE'];
    }
	
	if(empty($row1['CROCS_CTT_PRIORITY']))
    {
        $CROCS_CTT_PRIORITY = '';
    }
    else
    {
        $CROCS_CTT_PRIORITY = $row1['CROCS_CTT_PRIORITY'];
    }

	if(empty($row1['CROCS_CTT_SVC_LEG']))
    {
        $CROCS_CTT_SVC_LEG = '';
    }
    else
    {
        $CROCS_CTT_SVC_LEG = $row1['CROCS_CTT_SVC_LEG'];
    }
	
	if(empty($row1['CROCS_CTT_DESC']))
    {
        $CROCS_CTT_DESC = '';
    }
    else
    {
        $CROCS_CTT_DESC = $row1['CROCS_CTT_DESC'];
    }

	if(empty($row1['CROCS_CTT_CAUSE_CAT']))
    {
        $CROCS_CTT_CAUSE_CAT = '';
    }
    else
    {
        $CROCS_CTT_CAUSE_CAT = $row1['CROCS_CTT_CAUSE_CAT'];
    }
		
	if(empty($row1['CROCS_CTT_CAUSE_CODE']))
    {
        $CROCS_CTT_CAUSE_CODE = '';
    }
    else
    {
        $CROCS_CTT_CAUSE_CODE = $row1['CROCS_CTT_CAUSE_CODE'];
    }
	
	if(empty($row1['CROCS_CTT_RES_CODE']))
    {
        $CROCS_CTT_RES_CODE = '';
    }
    else
    {
        $CROCS_CTT_RES_CODE = $row1['CROCS_CTT_RES_CODE'];
    }

	if(empty($row1['CROCS_CTT_CLOSED_NAME']))
    {
        $CROCS_CTT_CLOSED_NAME = '';
    }
    else
    {
        $CROCS_CTT_CLOSED_NAME = $row1['CROCS_CTT_CLOSED_NAME'];
    }

    if(empty($row1['CROCS_CTT_CLOSED_TEAM']))
    {
        $CROCS_CTT_CLOSED_TEAM = '';
    }
    else
    {
        $CROCS_CTT_CLOSED_TEAM = $row1['CROCS_CTT_CLOSED_TEAM'];
    }

	if(empty($row1['CROCS_LATEST_PM_DATE']))
    {
        $CROCS_LATEST_PM_DATE = '';
    }
    else
    {
        $CROCS_LATEST_PM_DATE = $row1['CROCS_LATEST_PM_DATE'];
    }
	
	if(empty($row1['CROCS_PM_DESC']))
    {
        $CROCS_PM_DESC = '';
    }
    else
    {
        $CROCS_PM_DESC = $row1['CROCS_PM_DESC'];
    }
	
    if(empty($row1['CROCS_UPDATED_DATE']))
    {
        $CROCS_UPDATED_DATE = '';
    }
    else
    {
        $CROCS_UPDATED_DATE = $row1['CROCS_UPDATED_DATE'];
    }

    if(empty($row1['CROCS_UPDATED_BY']))
    {
        $CROCS_UPDATED_BY = '';
    }
    else
    {
        $CROCS_UPDATED_BY = $row1['CROCS_UPDATED_BY'];
    }
   
    if(empty($row1['CROCS_UPE_HOSTNAME']))
    {
        $CROCS_UPE_HOSTNAME = '';
    }
    else
    {
        $CROCS_UPE_HOSTNAME = $row1['CROCS_UPE_HOSTNAME'];
    }
	
	if(empty($row1['CROCS_UPE_ACCESS_PORT']))
    {
        $CROCS_UPE_ACCESS_PORT = '';
    }
    else
    {
        $CROCS_UPE_ACCESS_PORT = $row1['CROCS_UPE_ACCESS_PORT'];
    }
	
	if(empty($row1['CROCS_UPE_TRUNK_PORT']))
    {
        $CROCS_UPE_TRUNK_PORT = '';
    }
    else
    {
        $CROCS_UPE_TRUNK_PORT = $row1['CROCS_UPE_TRUNK_PORT'];
    }
    
   	if(empty($row1['CROCS_EPE_NAME']))
    {
        $CROCS_EPE_NAME = '';
    }
    else
    {
        $CROCS_EPE_NAME = $row1['CROCS_EPE_NAME'];
    }

	if(empty($row1['CROCS_EPE_PORT']))
    {
        $CROCS_EPE_PORT = '';
    }
    else
    {
        $CROCS_EPE_PORT = $row1['CROCS_EPE_PORT'];
    }
	
	if(empty($row1['CROCS_WAN_CPE_INTERFACE']))
    {
        $CROCS_WAN_CPE_INTERFACE = '';
    }
    else
    {
        $CROCS_WAN_CPE_INTERFACE = $row1['CROCS_WAN_CPE_INTERFACE'];
    }
	
	if(empty($row1['CROCS_CPE_RESELLER']))
    {
        $CROCS_CPE_RESELLER = '';
    }
    else
    {
        $CROCS_CPE_RESELLER = $row1['CROCS_CPE_RESELLER'];
    }

	if(empty($row1['CROCS_BAU_SERVICE_ID']))
    {
        $CROCS_BAU_SERVICE_ID = '';
    }
    else
    {
        $CROCS_BAU_SERVICE_ID = $row1['CROCS_BAU_SERVICE_ID'];
    }
	
	if(empty($row1['CROCS_BS_NODE_PE']))
    {
        $CROCS_BS_NODE_PE = '';
    }
    else
    {
        $CROCS_BS_NODE_PE = $row1['CROCS_BS_NODE_PE'];
    }
	
	if(empty($row1['CROCS_BS_LAN_IP']))
    {
        $CROCS_BS_LAN_IP = '';
    }
    else
    {
        $CROCS_BS_LAN_IP = $row1['CROCS_BS_LAN_IP'];
    }
	
	if(empty($row1['CROCS_BS_UPE_LOOPBACK_IP']))
    {
        $CROCS_BS_UPE_LOOPBACK_IP = '';
    }
    else
    {
        $CROCS_BS_UPE_LOOPBACK_IP = $row1['CROCS_BS_UPE_LOOPBACK_IP'];
    }
	 
    if(empty($row1['CROCS_BS_UPE_HOSTNAME']))
    {
        $CROCS_BS_UPE_HOSTNAME = '';
    }
    else
    {
        $CROCS_BS_UPE_HOSTNAME = $row1['CROCS_BS_UPE_HOSTNAME'];
    }
	

    if(empty($row1['CROCS_BS_UPE_ACCESS_PORT']))
    {
        $CROCS_BS_UPE_ACCESS_PORT = '';
    }
    else
    {
        $CROCS_BS_UPE_ACCESS_PORT = $row1['CROCS_BS_UPE_ACCESS_PORT'];
    }
    
    if(empty($row1['CROCS_BS_UPE_TRUNK_PORT']))
    {
        $CROCS_BS_UPE_TRUNK_PORT = '';
    }
    else
    {
        $CROCS_BS_UPE_TRUNK_PORT = $row1['CROCS_BS_UPE_TRUNK_PORT'];
    }

    if(empty($row1['CROCS_BS_EPE_NAME']))
    {
        $CROCS_BS_EPE_NAME = '';
    }
    else
    {
        $CROCS_BS_EPE_NAME = $row1['CROCS_BS_EPE_NAME'];
    }
	
	if(empty($row1['CROCS_BS_EPE_PORT']))
    {
        $CROCS_BS_EPE_PORT = '';
    }
    else
    {
        $CROCS_BS_EPE_PORT = $row1['CROCS_BS_EPE_PORT'];
    }
	
	if(empty($row1['CROCS_HO_ALERT_REMARKS']))
    {
        $CROCS_HO_ALERT_REMARKS = '';
    }
    else
    {
        $CROCS_HO_ALERT_REMARKS = $row1['CROCS_HO_ALERT_REMARKS'];
    }
	
	if(empty($row1['CROCS_BS_PROFILE']))
    {
        $CROCS_BS_PROFILE = '';
    }
    else
    {
        $CROCS_BS_PROFILE = $row1['CROCS_BS_PROFILE'];
    }
	
	if(empty($row1['CROCS_BS_USERNAME']))
    {
        $CROCS_BS_USERNAME = '';
    }
    else
    {
        $CROCS_BS_USERNAME = $row1['CROCS_BS_USERNAME'];
    }
	
	if(empty($row1['CROCS_BS_PASSWORD']))
    {
        $CROCS_BS_PASSWORD = '';
    }
    else
    {
        $CROCS_BS_PASSWORD = $row1['CROCS_BS_PASSWORD'];
    }
	
	if(empty($row1['CROCS_BS_QOS']))
    {
        $CROCS_BS_QOS = '';
    }
    else
    {
        $CROCS_BS_QOS = $row1['CROCS_BS_QOS'];
    }
	
	if(empty($row1['CROCS_PE_INTERFACE_NAME']))
    {
        $CROCS_PE_INTERFACE_NAME = '';
    }
    else
    {
        $CROCS_PE_INTERFACE_NAME = $row1['CROCS_PE_INTERFACE_NAME'];
    }
	
	if(empty($row1['CROCS_BS_PE_INTERFACE_NAME']))
    {
        $CROCS_BS_PE_INTERFACE_NAME = '';
    }
    else
    {
        $CROCS_BS_PE_INTERFACE_NAME = $row1['CROCS_BS_PE_INTERFACE_NAME'];
    }
}

 //Get Configuration Attachment
 $sqlAttach = "SELECT CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE, dbms_lob.getlength(CROCS_FILE_UPLOADED) AS COLUMNSIZE ";
 $sqlAttach = $sqlAttach."FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'CA' AND CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."'";
 $stidAttach = oci_parse($cemdb, $sqlAttach);
 oci_execute($stidAttach);
 if (!$stidAttach) {
    echo 'DB Error, could not query the database<br>';
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
 //$attachment = '<table border="1">';
 $attachment = '';
 $attachmentcnt = 0;
 $testAttachment = 'N';
while (($rowAttach = oci_fetch_array($stidAttach)) != false) {
    $attachmentcnt = $attachmentcnt + 1;
    $testAttachment = 'Y';
    $oracle_timestamp = (string) $rowAttach["CROCS_UPLOAD_DATE"];
    $formatDate = DateTime::createFromFormat('d-M-y h.i.s.u A', $oracle_timestamp);
    $formatDate = $formatDate->format('d/m/Y H:i:s A');
    $attachment = $attachment.'<tr style="font-size:9px"><td><a href="getattachment.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&F='.$rowAttach["CROCS_FILE_NAME"].'&V='.$rowAttach["CROCS_FILE_VERSION"].'&U='.$U.'">'.$rowAttach["CROCS_FILE_NAME"].'</a></td>';
//    $attachment = $attachment.'<td>'.date("d-M-Y H:i:s", strtotime($rowAttach["CROCS_UPLOAD_DATE"])).'&nbsp</td><td>&nbsp'.$rowAttach["COLUMNSIZE"].'B&nbsp</td>';
    $attachment = $attachment.'<td>'.$formatDate.'&nbsp</td><td>&nbsp'.$rowAttach["COLUMNSIZE"].'B&nbsp</td>';
    $attachment = $attachment.'<td>'.$rowAttach["CROCS_UPLOADER_ID"].'&nbsp</td>';
    if ($Role <> 'GUEST'){
        $attachment = $attachment.'<td><a href="removeattachment.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&F='.$rowAttach["CROCS_FILE_NAME"].'&V='.$rowAttach["CROCS_FILE_VERSION"].'&U='.$U.'">Remove</a></td></tr>';
    }
    else{
        $attachment = $attachment.'</tr>';
    }
    }
 //$attachment = $attachment.'</table>';
 if ($attachmentcnt > 4){
    $uploadattachment = 'Maximum of 5 attachments reached. Please remove some of the attachments before uploading a new one.';}
 else{
    $uploadattachment = '<a href="UploadAttachment.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&R=G&U='.$U.'"><font size="1">Upload attachments</a><br>Note : Supports file size up to 256kB each and maximum 5 attachments.</font> ';}

 //Get Handover Attachment
 $sqlAttach1 = "SELECT CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE, dbms_lob.getlength(CROCS_FILE_UPLOADED) AS COLUMNSIZE ";
 $sqlAttach1 = $sqlAttach1."FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'HA' AND CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."'";
 $stidAttach1 = oci_parse($cemdb, $sqlAttach1);
 oci_execute($stidAttach1);
 if (!$stidAttach1) {
    echo 'DB Error, could not query the database<br>';
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
 //$attachment = '<table border="1">';
 $attachment1 = '';
 $attachmentcnt1 = 0;
 $testAttachment1 = 'N';
while (($rowAttach1 = oci_fetch_array($stidAttach1)) != false) {
    $attachmentcnt1 = $attachmentcnt1 + 1;
    $testAttachment1 = 'Y';
    $oracle_timestamp1 = (string) $rowAttach1["CROCS_UPLOAD_DATE"];
    $formatDate1 = DateTime::createFromFormat('d-M-y h.i.s.u A', $oracle_timestamp1);
    $formatDate1 = $formatDate1->format('d/m/Y H:i:s A');
    $attachment1 = $attachment1.'<tr style="font-size:9px"><td><a href="getattachment1.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&F='.$rowAttach1["CROCS_FILE_NAME"].'&V='.$rowAttach1["CROCS_FILE_VERSION"].'&U='.$U.'">'.$rowAttach1["CROCS_FILE_NAME"].'</a></td>';
//    $attachment1 = $attachment1.'<td>'.date("d-M-Y H:i:s", strtotime($rowAttach1["CROCS_UPLOAD_DATE"])).'&nbsp</td><td>&nbsp'.$rowAttach1["COLUMNSIZE"].'B&nbsp</td>';
    $attachment1 = $attachment1.'<td>'.$formatDate1.'&nbsp</td><td>&nbsp'.$rowAttach1["COLUMNSIZE"].'B&nbsp</td>';
    $attachment1 = $attachment1.'<td>'.$rowAttach1["CROCS_UPLOADER_ID"].'&nbsp</td>';
    if ($Role <> 'GUEST'){
        $attachment1 = $attachment1.'<td><a href="removeattachment1.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&F='.$rowAttach1["CROCS_FILE_NAME"].'&V='.$rowAttach1["CROCS_FILE_VERSION"].'&U='.$U.'">Remove</a></td></tr>';
    }
    else{
        $attachment1 = $attachment1.'</tr>';
    }
    }
    
 //$attachment = $attachment.'</table>';
 if ($attachmentcnt1 > 2){
    $uploadattachment1 = 'Maximum of 3 attachments reached. Please remove some of the attachments before uploading a new one.';}
 else{
    $uploadattachment1 = '<a href="UploadAttachment1.php?CE_Hostname='.$CROCS_ORDER_SVC_ID.'&R=G&U='.$U.'">Upload attachments</a><br>Note : Supports file size up to 3MB each and maximum 3 attachments. ';}

//Get Router Type
    $sql1 = "SELECT DISTINCT ROUTER_TYPE FROM DATA_MAPPING_ROUTER_TYPE_MODEL ORDER BY ROUTER_TYPE ASC";
    $stid2 = oci_parse($cemdb, $sql1);
   	oci_execute($stid2);
    $list1 = '';
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            $list1 = $list1.'<option value="'.$row1["ROUTER_TYPE"].'">'.$row1["ROUTER_TYPE"].'</option>';
        }
    }

//Find Router Type 
if (isset($HTTP_GET_VARS["router"])) 
{ 
$router=$HTTP_GET_VARS["router"]; 
} 
else 
{ 
$router=''; 
} 

//Get Router Model
    $sql2 = "SELECT DISTINCT ROUTER_MODEL FROM DATA_MAPPING_ROUTER_TYPE_MODEL ORDER BY ROUTER_MODEL ASC";
    $stid3 = oci_parse($cemdb, $sql2);
   	oci_execute($stid3);
    $list2 = '';
    if (!$stid3) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while ($row2 = oci_fetch($stid3)) {
            $list2 = $list2.'<option value="'.$row1["ROUTER_MODEL"].'">'.$row1["ROUTER_MODEL"].'</option>';
        }
    }
?>
  <!--habis php extract data -->
  
  <!-- create form kat sini-->
 <?php
  //Create Form
 echo'<font size="2">';
 echo '<form action="processUpd.php?U='.$U.'" method="post">'; 
 ?>
  <!-- habis create form kat sini-->
 <h1>View/Update Customer Equipment Information</h1> 
    <ul id="tabs">
      <li><a href="#PROFILE">CUSTOMER PROFILE</a></li>
      <li><a href="#CPE">CPE INFO</a></li>
      <li><a href="#LINE">LINE INFO</a></li>
      <li><a href="#HANDOVER">HANDOVER INFO</a></li>
      <li><a href="#CTT">CTT INFO</a></li>
      <!--<li><a href="#CR">CR AND MAINTENANCE INFO</a></li>-->
    </ul>

    <div class="tabContent" id="PROFILE">
      <!--<h2>CUSTOMER PROFILE</h2>-->
      <div>
        <!--
        <p>JavaScript tabs partition your Web page content into tabbed sections. Only one section at a time is visible.</p>
        <p>The code is written in such a way that the page degrades gracefully in browsers that don't support JavaScript or CSS.</p>
        -->
<!--mula utk profile-->
<?php
 echo '<table border="0">
 <tr><td style="background-color:#BDBDBD;" colspan="5" align="center">CUSTOMER PROFILE</td></tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Order Service ID:</font></td><td><input style="font-size:12px;" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_ORDER_SVC_ID" name="CROCS_ORDER_SVC_ID" value="'.$CROCS_ORDER_SVC_ID.'"></td>';

if ($Role <> 'GUEST'){ ?> 
  <td style="background-color:#ADD8E6;"><font size="1">Order Creation Date:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="45" name="CROCS_SVC_INSTALL_DATE" id="CROCS_SVC_INSTALL_DATE" type="text" size="25" value="<?php echo $CROCS_SVC_INSTALL_DATE; ?>"><a href="javascript:NewCal('CROCS_SVC_INSTALL_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td><td style="background-color:#ADD8E6;" border ="0"><font size="1">Format:DD/MM/YYYY</font></td>
  <?php } else { ?> 
  <td style="background-color:#FFA500;">Order Creation Date:</td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" name="CROCS_SVC_INSTALL_DATE" id="CROCS_SVC_INSTALL_DATE" type="text" size="25" value="<?php echo $CROCS_SVC_INSTALL_DATE; ?>"></td><td></td>
 <?php }
echo '
 <tr><td style="background-color:#FFA500;"><font size="1">Customer Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_NAME" name="CROCS_CUST_NAME" value="'.$CROCS_CUST_NAME.'"></td><td style="background-color:#FFA500;"><font size="1">Product Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PRODUCT_NAME" name="CROCS_PRODUCT_NAME" value="'.$CROCS_PRODUCT_NAME.'"></td></tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Customer Site:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_SITE_NAME" name="CROCS_CUST_SITE_NAME" value="'.$CROCS_CUST_SITE_NAME.'"'.$readonly.'></td><td style="background-color:#FFA500;"><font size="1">LOB:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_LOB" name="CROCS_LOB" value="'.$CROCS_LOB.'"></td><td colspan="2"></td></tr>      
 <tr><td style="background-color:#FFA500;"><font size="1">Customer ID:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_ID" name="CROCS_CUST_ID" value="'.$CROCS_CUST_ID.'"'.$readonly.'></td><td style="background-color:#FFA500;"><font size="1">Business Code:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_COB" name="CROCS_COB" value="'.$CROCS_COB.'"></td></tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Region:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_REGION" name="CROCS_REGION" value="'.$CROCS_REGION.'"></td>';

 if ($Role <> 'GUEST'){
    echo '<td style="background-color:#ADD8E6;"><font size="1">CE Mgmt:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CE_MGMT" name="CROCS_CE_MGMT" value="'.$CROCS_CE_MGMT.'"></td>
        <td style="background-color:#ADD8E6;"><select onchange="upd_CEManagement(value)">
        <option value="">Please select CE Management</option>
        <option value="Customer">Customer</option>
        <option value="Reseller">Reseller</option>
        <option value="TM">TM</option>
        </select></td></tr>
    ';
     }
    else {
        echo '<td style="background-color:#FFA500;"><font size="1">CE Mgmt:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CE_MGMT" name="CROCS_CE_MGMT" value="'.$CROCS_CE_MGMT.'"></td><td></td></tr>
    ';
    }

echo ' 
 <tr><td style="background-color:#FFA500;"><font size="1">State:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_STATE" name="CROCS_STATE" value="'.$CROCS_STATE.'"></td>';
 if ($Role <> 'GUEST')
 {
 echo '<td style="background-color:#FFA500;"><font size="1">Contact #1:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_1" name="CROCS_CUST_CONTACT_1" value="'.$CROCS_CUST_CONTACT_1.'"></td></tr>';
} 
else 
{
 echo '<td style="background-color:#FFA500;"><font size="1">Contact #1:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_1" name="CROCS_CUST_CONTACT_1" value="'.$CROCS_CUST_CONTACT_1.'"></td></tr>';
}
echo '
 <tr><td style="background-color:#FFA500;"><font size="1">Platinum Partner:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_RESELLER" name="CROCS_RESELLER" value="'.$CROCS_RESELLER.'"></td>';
if ($Role <> 'GUEST')
{
	echo '<td style="background-color:#FFA500;"><font size="1">Contact #2:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_2" name="CROCS_CUST_CONTACT_2" value="'.$CROCS_CUST_CONTACT_2.'"></td></tr>';
} 
else 
{
 echo '<td style="background-color:#FFA500;"><font size="1">Contact #2:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_2" name="CROCS_CUST_CONTACT_2" value="'.$CROCS_CUST_CONTACT_2.'"></td></tr>';
}

/*
echo '
 <tr>
 <td style="background-color:#FFA500;"><font size="1">BAU Service ID:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_NODE_PE" name="CROCS_NODE_PE" value="'.$CROCS_NODE_PE.'"'.$readonly.'></td>';
*/

/*
if ($Role <> 'GUEST')
{
	echo '<td style="background-color:#FFA500;"><font size="1">Contact #3:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_2" name="CROCS_CUST_CONTACT_3" value="'.$CROCS_CUST_CONTACT_3.'"></td></tr>';
} 
else 
{
 echo '<td style="background-color:#FFA500;"><font size="1">Contact #3:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_1" name="CROCS_CUST_CONTACT_3" value="'.$CROCS_CUST_CONTACT_3.'">
 </td>
 </tr>';
}
*/

 if ($Role <> 'GUEST'){
 echo '
 <tr>
 <td style="background-color:#FFA500;"><font size="1">Branch Code:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_CODE" name="CROCS_BR_CODE" value="'.$CROCS_BR_CODE.'"'.$readonly.'>
 </td>
 <td style="background-color:#FFA500;"><font size="1">Contact #3:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_3" name="CROCS_CUST_CONTACT_3" value="'.$CROCS_CUST_CONTACT_3.'">
 </td>
 </tr>
 
 <tr>
 <td style="background-color:#FFA500;"><font size="1">Branch Address1:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_1" name="CROCS_BR_ADD_1" value="'.$CROCS_BR_ADD_1.'"'.$readonly.'>
 </td>
 <td style="background-color:#FFA500;"><font size="1">Branch Address2:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_2" name="CROCS_BR_ADD_2" value="'.$CROCS_BR_ADD_2.'"'.$readonly.'>
 </td>
 </tr>
 
 <tr>
 <td style="background-color:#FFA500;"><font size="1">Branch Address3:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_3" name="CROCS_BR_ADD_3" value="'.$CROCS_BR_ADD_3.'"'.$readonly.'>
 </td>
 <td style="background-color:#FFA500;"><font size="1">Branch Address4:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_4" name="CROCS_BR_ADD_4" value="'.$CROCS_BR_ADD_4.'"'.$readonly.'>
 </td>
 </tr>
 ';}
else {
  echo '
 <tr>
 <td style="background-color:#FFA500;"><font size="1">Branch Code:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_CODE" name="CROCS_BR_CODE" value="'.$CROCS_BR_CODE.'"'.$readonly.'>
 </td>
 <td style="background-color:#FFA500;"><font size="1">Contact #3:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CUST_CONTACT_1" name="CROCS_CUST_CONTACT_3" value="'.$CROCS_CUST_CONTACT_3.'">
 </td>
 </tr>
 
 
 <tr><td style="background-color:#FFA500;"><font size="1">Branch Address1:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_1" name="CROCS_BR_ADD_1" value="'.$CROCS_BR_ADD_1.'"'.$readonly.'></td><td style="background-color:#FFA500;"><font size="1">Branch Address2:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_2" name="CROCS_BR_ADD_2" value="'.$CROCS_BR_ADD_2.'"'.$readonly.'></td></tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Branch Address3:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_3" name="CROCS_BR_ADD_3" value="'.$CROCS_BR_ADD_3.'"'.$readonly.'></td><td style="background-color:#FFA500;"><font size="1">Branch Address4:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BR_ADD_4" name="CROCS_BR_ADD_4" value="'.$CROCS_BR_ADD_4.'"'.$readonly.'></td></tr>
 ';}

 echo '</table>'; 
?>
<!--habis utk profile -->
      </div>
    </div>

    <div class="tabContent" id="CPE">
      <!--<h2>CPE INFO</h2>-->
      <div>
        <!--<p>JavaScript tabs are great if your Web page contains a large amount of content.</p>
        <p>They're also good for things like multi-step Web forms.</p>-->
        
        <!--mula utk CPE INFO-->
		<?php
 			echo '<table border="0"><tr><td style="background-color:#BDBDBD;" colspan="5" align="center">CPE INFO</td></tr>';
 						 if ($Role <> 'GUEST'){
 									echo '<tr><td style="background-color:#FFA500;"><font size="1">CPE ID :</font></td>
 									         <td><input style="font-size:12px" size="53" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CPE_ID" name="CROCS_CPE_ID" value="'.$CROCS_CPE_ID.'"></td></tr>
 												<tr><td style="background-color:#ADD8E6;"><font size="1">CPE Reseller:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                                           id="CROCS_CPE_RESELLER" name="CROCS_CPE_RESELLER" value="'.$CROCS_CPE_RESELLER.'"></td></tr>
 												<tr><td style="background-color:#ADD8E6;"><font size="1">Router Status:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                                           id="CROCS_ROUTER_STATUS" name="CROCS_ROUTER_STATUS" value="'.$CROCS_ROUTER_STATUS.'"></td></tr>
 												<tr><td style="background-color:#ADD8E6;"><font size="1">Router Serial Number:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text"  
                                           id="CROCS_CE_SERIAL_NO"   name="CROCS_CE_SERIAL_NO" value="'.$CROCS_CE_SERIAL_NO.'"></td></tr>
                                     <tr><td style="background-color:#ADD8E6;"><font size="1">Router Type:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text"  
                                           id="CROCS_ROUTER_TYPE"  name="CROCS_ROUTER_TYPE" value="'.$CROCS_ROUTER_TYPE.'"></td>
                                          <!--  <td><form name="routerType_form" method="post" action="">
                                          <select name="routerType" onchange="upd_RouterType(value)">
                                          <option value="">Please select Router Type</option>'.$list1.'
                                          </select></form></td> </tr> !-->
                                          </tr>
                                     <tr><td style="background-color:#ADD8E6;"><font size="1">Router Model:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                                            id="CROCS_ROUTER_MODEL" name="CROCS_ROUTER_MODEL" value="'.$CROCS_ROUTER_MODEL.'"></td></tr>
                                     <tr><td style="background-color:#ADD8E6;"><font size="1">Router Package:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                                            id="CROCS_ROUTER_PACKAGE" name="CROCS_ROUTER_PACKAGE" value="'.$CROCS_ROUTER_PACKAGE.'"></td></tr> 
							 '; 
							 } else {
 									echo '<tr>
									<td style="background-color:#FFA500;"><font size="1">CPE ID :</font></td>
 									         <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CPE_ID" name="CROCS_CPE_ID" value="'.$CROCS_CPE_ID.'"></td>
											 </tr>
                                    <tr>
									<td style="background-color:#FFA500;"><font size="1">CPE Reseller:</font></td>
									<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CPE_RESELLER" name="CROCS_CPE_RESELLER" value="'.$CROCS_CPE_RESELLER.'">
									</td>
									</tr>
                                    <tr>
									<td style="background-color:#FFA500;"><font size="1">Router Status:</font></td>
									<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_ROUTER_STATUS" name="CROCS_ROUTER_STATUS" value="'.$CROCS_ROUTER_STATUS.'">
									</td>
									</tr>
                                    <tr>
									<td style="background-color:#FFA500;"><font size="1">Router Serial Number:</font></td>
									<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CE_SERIAL_NO" name="CROCS_CE_SERIAL_NO" value="'.$CROCS_CE_SERIAL_NO.'">
									</td>
									</tr>
                                    <tr>
									<td style="background-color:#FFA500;"><font size="1">Router Type:</font></td>
									<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_ROUTER_TYPE"  name="CROCS_ROUTER_TYPE" value="'.$CROCS_ROUTER_TYPE.'">
									</td>
									</tr>
                                    <tr><td style="background-color:#FFA500;"><font size="1">Router Model:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                                         id="CROCS_ROUTER_MODEL" name="CROCS_ROUTER_MODEL" value="'.$CROCS_ROUTER_MODEL.'"></td></tr>
                                     <tr><td style="background-color:#FFA500;"><font size="1">Router Package:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                                          id="CROCS_ROUTER_PACKAGE" name="CROCS_ROUTER_PACKAGE" value="'.$CROCS_ROUTER_PACKAGE.'"></td></tr>
          ';}              

/*
          if ($Role <> 'GUEST'){ ?> 
              <tr><td style="background-color:#ADD8E6;"><font size="1">Warranty Date:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" name="CROCS_WARRANTY_DATE" 
                     id="CROCS_WARRANTY_DATE" 
                     type="text" size="25" value="<?php echo $CROCS_WARRANTY_DATE; ?>"><a href="javascript:NewCal('CROCS_WARRANTY_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" 
                     border="0" alt="Pick a date"></a></td><td style="background-color:#ADD8E6;" border ="0"><font size="1">Format:DD/MM/YYYY</font></td>
          <?php } else { ?> 
              <tr><td style="background-color:#FFA500;"><font size="1">Warranty Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                     name="CROCS_WARRANTY_DATE" 
                     id="CROCS_WARRANTY_DATE" type="text" size="25" value="<?php echo $CROCS_WARRANTY_DATE; ?>"</td><td></td>

          <?php }

          if ($Role <> 'GUEST'){
					echo '<tr><td style="background-color:#ADD8E6;"><font size="1">CE Leasing Contract No :</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                        id="CROCS_CE_LEASE_CONTRACT_NO" 			
								name="CROCS_CE_LEASE_CONTRACT_NO" value="'.$CROCS_CE_LEASE_CONTRACT_NO.'"></td></tr>';
          } else {
					echo '<tr><td style="background-color:#FFA500;"><font size="1">CE Leasing Contract No :</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                       id="CROCS_CE_LEASE_CONTRACT_NO" name="CROCS_CE_LEASE_CONTRACT_NO" value="'.$CROCS_CE_LEASE_CONTRACT_NO.'"></td></tr>';
 			}

 			if ($Role <> 'GUEST'){ ?> 
  					<tr><td style="background-color:#ADD8E6;"><font size="1">CE Leasing Expiry Date:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" name="CROCS_CE_EXPIRY_DATE" 
							id="CROCS_CE_EXPIRY_DATE" type="text" size="25" value="<?php echo $CROCS_CE_EXPIRY_DATE; ?>"><a href="javascript:NewCal('CROCS_CE_EXPIRY_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" 
							width="16" height="16" border="0" alt="Pick a date"></a></td><td style="background-color:#ADD8E6;" border ="0"><font size="1">Format:DD/MM/YYYY</font></td>
  			<?php } else { ?> 
 					<tr><td style="background-color:#FFA500;"><font size="1">CE Leasing Expiry Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                     name="CROCS_CE_EXPIRY_DATE" 
							id="CROCS_CE_EXPIRY_DATE" type="text" size="25" value="<?php echo $CROCS_CE_EXPIRY_DATE; ?>"</td><td></td>
			<?php }
 
 			if ($Role <> 'GUEST'){
    				echo '<tr><td style="background-color:#ADD8E6;"><font size="1">CE Purchase Order(PO) No :</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
                        id="CROCS_CE_PO_NO" 
								name="CROCS_CE_PO_NO" value="'.$CROCS_CE_PO_NO.'"></td></tr>
    				<tr><td style="background-color:#ADD8E6;"><font size="1">CE Invoice No :</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_CE_INVOCE_NO" 
								name="CROCS_CE_INVOCE_NO" value="'.$CROCS_CE_INVOCE_NO.'"></td></tr>
    				<tr><td style="background-color:#ADD8E6;"><font size="1">TACACS :</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                     type="text" id="CROCS_TACACS" name="CROCS_TACACS" value="'.$CROCS_TACACS.'"></td>
         				<td style="background-color:#ADD8E6;"><select onchange="upd_TACACS(value)">
         				<option value="">Please select TACACS indicator</option>
         				<option value="Y">Y</option>
         				<option value="N">N</option>
         				</select></td>
                     </tr>
     				<tr><td style="background-color:#ADD8E6;"><font size="1">KIWI :</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                     type="text" id="CROCS_KIWI" name="CROCS_KIWI" value="'.$CROCS_KIWI.'"></td>
         				<td style="background-color:#ADD8E6;"><select onchange="upd_KIWI(value)">
         				<option value="">Please select KIWI indicator</option>
         				<option value="Y">Y</option>
         				<option value="N">N</option>
         				</select></td> 
					</tr>
     	';
 		} else {
    			echo '<tr><td style="background-color:#FFA500;"><font size="1">CE Purchase Order(PO) No :</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                    id="CROCS_CE_PO_NO" name="CROCS_CE_PO_NO" value="'.$CROCS_CE_PO_NO.'"></td></tr>
    			<tr><td style="background-color:#FFA500;"><font size="1">CE Invoice No :</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                    id="CROCS_CE_INVOCE_NO"  name="CROCS_CE_INVOCE_NO" value="'.$CROCS_CE_INVOCE_NO.'"></td></tr>
    			<tr><td style="background-color:#FFA500;"><font size="1">TACACS :</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_TACACS" 
                   name="CROCS_TACACS"  value="'.$CROCS_TACACS.'"></td></tr>
    			<tr><td style="background-color:#FFA500;"><font size="1">KIWI :</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_KIWI" 
                    name="CROCS_KIWI"  value="'.$CROCS_KIWI.'"></td></tr>
    	';
 		}
		*/
 			echo '</table>';
 		?>
 		<!--habis utk CPE INFO-->
      </div>
    </div>

    <div class="tabContent" id="LINE">
      <!--<h2>LINE INFO</h2>-->
      <div>
        <!--<p>Click a tab to view the tab's content. Using tabs couldn't be easier!</p>-->
      <!-- mula utk line info-->
      <?php
      echo '<table border="0">
 <tr><td style="background-color:#BDBDBD;" colspan="3" align="center">PRIMARY LINE INFO</td><td style="background-color:#BDBDBD;" colspan="3" align="center">SECONDARY LINE INFO</td></tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Primary Service ID:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_ID" name="CROCS_PS_ID" value="'.$CROCS_PS_ID.'"></td><td></td>
  <td style="background-color:#FFA500;"><font size="1">Secondary Service ID:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_ID" name="CROCS_BS_ID" value="'.$CROCS_BS_ID.'"></td>
</tr>

 <tr><td style="background-color:#FFA500;"><font size="1">Primary Service Level:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_LEVEL" name="CROCS_PS_LEVEL" value="'.$CROCS_PS_LEVEL.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Service Level:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_LEVEL" name="CROCS_BS_LEVEL" value="'.$CROCS_BS_LEVEL.'">
</tr>

 <tr><td style="background-color:#FFA500;"><font size="1">Primary Service Bandwidth:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_BANDWIDTH" name="CROCS_PS_BANDWIDTH" value="'.$CROCS_PS_BANDWIDTH.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Service Bandwidth:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_BANDWIDTH" name="CROCS_BS_BANDWIDTH" value="'.$CROCS_BS_BANDWIDTH.'"></td>
</tr>
      
 <tr><td style="background-color:#FFA500;"><font size="1">Primary Service ID Access Type:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_ACCESS_TYPE" name="CROCS_PS_ACCESS_TYPE" value="'.$CROCS_PS_ACCESS_TYPE.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Service ID Access Type:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_ACCESS_TYPE" name="CROCS_BS_ACCESS_TYPE" value="'.$CROCS_BS_ACCESS_TYPE.'"></td>
</tr>
 <tr><td style="background-color:#FFA500;"><font size="1">Primary Routing Protocol:</font></font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_ROUTING_PROTOCOL" name="CROCS_PS_ROUTING_PROTOCOL" value="'.$CROCS_PS_ROUTING_PROTOCOL.'"></td><td></td>
</td><td style="background-color:#FFA500;"><font size="1">Secondary Routing Protocol:</td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_ROUTING_PROTOCOL" name="CROCS_BS_ROUTING_PROTOCOL" value="'.$CROCS_BS_ROUTING_PROTOCOL.'"></td>
</tr> 

 <tr><td style="background-color:#FFA500;"><font size="1">Primary CE WAN IP Address:</font></font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_CE_WAN_IP" name="CROCS_PS_CE_WAN_IP" value="'.$CROCS_PS_CE_WAN_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary CE WAN IP Address:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_CE_WAN_IP" name="CROCS_BS_CE_WAN_IP" value="'.$CROCS_BS_CE_WAN_IP.'"></td>
</tr>

 <tr></td><td style="background-color:#FFA500;"><font size="1">Primary Framed IP Address:</font></font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PS_FRAMED_IP" name="CROCS_PS_FRAMED_IP" value="'.$CROCS_PS_FRAMED_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Framed IP Address:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_FRAMED_IP" name="CROCS_BS_FRAMED_IP" value="'.$CROCS_BS_FRAMED_IP.'"></td>
</tr>

 <tr>
 <td style="background-color:#FFA500;"><font size="1">Primary Profile:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PROFILE" name="CROCS_PROFILE" value="'.$CROCS_PROFILE.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Profile:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_PROFILE" name="CROCS_BS_PROFILE" value="'.$CROCS_BS_PROFILE.'"></td>
</tr> 

<tr>
 <td style="background-color:#FFA500;"><font size="1">Primary Username:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_USERNAME" name="CROCS_USERNAME" value="'.$CROCS_USERNAME.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary Username:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_USERNAME" name="CROCS_BS_USERNAME" value="'.$CROCS_BS_USERNAME.'"></td>
</tr>

<tr>
 <td style="background-color:#FFA500;"><font size="1">Primary Password:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PASSWORD" name="CROCS_PASSWORD" value="'.$CROCS_PASSWORD.'"></td><td></td>
</td><td style="background-color:#FFA500;"><font size="1">Secondary Password:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_PASSWORD" name="CROCS_BS_PASSWORD" value="'.$CROCS_BS_PASSWORD.'"></td>
</tr>

 <tr><td style="background-color:#FFA500;"><font size="1">Primary PE Node:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_NODE_PE" name="CROCS_NODE_PE" value="'.$CROCS_NODE_PE.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary PE Node:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_NODE_PE" name="CROCS_BS_NODE_PE" value="'.$CROCS_BS_NODE_PE.'"></td>
</tr>

<tr>
 <td style="background-color:#FFA500;"><font size="1">Primary QOS:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_QOS" name="CROCS_QOS" value="'.$CROCS_QOS.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary QOS:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_QOS" name="CROCS_BS_QOS" value="'.$CROCS_BS_QOS.'"></td>
</tr> 

<tr>
 <td style="background-color:#FFA500;"><font size="1">Primary PE Interface:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PE_INTERFACE_NAME" name="CROCS_PE_INTERFACE_NAME" value="'.$CROCS_PE_INTERFACE_NAME.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary PE Interface:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_PE_INTERFACE_NAME" name="CROCS_BS_PE_INTERFACE_NAME" value="'.$CROCS_BS_PE_INTERFACE_NAME.'"></td>
</tr> 
';

 if ($Role <> 'GUEST'){
 echo '
 
<tr>
 <td style="background-color:#ADD8E6;"><font size="1">HQ IP :</font></td>
 <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_HQ_IP" name="CROCS_HQ_IP" value="'.$CROCS_HQ_IP.'"></td>
 <td style="background-color:#ADD8E6;" size="30"><font size="1">Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</font></font></td>
</td><td style="background-color:#FFA500;"><font size="1">Framed Protocol:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_FRAMED_PROTOCOL" name="CROCS_FRAMED_PROTOCOL" value="'.$CROCS_FRAMED_PROTOCOL.'"></td>
</tr>

 <tr><td style="background-color:#ADD8E6;"><font size="1">Primary LAN IP:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_LAN_IP" name="CROCS_LAN_IP" value="'.$CROCS_LAN_IP.'"></td><td style="background-color:#ADD8E6;" size="30"><font size="1">Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</font></td>
<td style="background-color:#FFA500;"><font size="1">Secondary LAN IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_LAN_IP" name="CROCS_BS_LAN_IP" value="'.$CROCS_BS_LAN_IP.'"></td>
</tr> 

 <tr><td style="background-color:#ADD8E6;"><font size="1">Loopback IP:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_LOOPBACK_IP" name="CROCS_LOOPBACK_IP" value="'.$CROCS_LOOPBACK_IP.'"></td><td style="background-color:#ADD8E6;" size="30"><font size="1">Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</font></td>
<td style="background-color:#FFA500;"><font size="1">Input Policy:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_INPUT_POLICY" name="CROCS_INPUT_POLICY" value="'.$CROCS_INPUT_POLICY.'"></td>
</tr>

 <tr><td style="background-color:#ADD8E6;"><font size="1">Tunnel IP:</font></font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_TUNNEL_IP" name="CROCS_TUNNEL_IP" value="'.$CROCS_TUNNEL_IP.'"></td><td style="background-color:#ADD8E6;" size="30"><font size="1">Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</font></font></td>
<td style="background-color:#FFA500;"><font size="1">Output Policy:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_OUTPUT_POLICY" name="CROCS_OUTPUT_POLICY" value="'.$CROCS_OUTPUT_POLICY.'"></td>
</tr> 

 <tr><td style="background-color:#ADD8E6;"><font size="1">Primary UPE Loopback IP:</font></font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_UPE_LOOPBACK_IP" name="CROCS_UPE_LOOPBACK_IP" value="'.$CROCS_UPE_LOOPBACK_IP.'"></td><td style="background-color:#ADD8E6;" size="30"><font size="1">Format: Max to 5 IPs <br> Eg: 11.159.5.147/11.159.6.147/11.159.7.147/11.159.8.147</font></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Loopback IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_LOOPBACK_IP" name="CROCS_BS_UPE_LOOPBACK_IP" value="'.$CROCS_BS_UPE_LOOPBACK_IP.'"></td>
</tr>

 <tr><td style="background-color:#FFA500;"><font size="1">Primary UPE Hostname:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_HOSTNAME" name="CROCS_UPE_HOSTNAME" value="'.$CROCS_UPE_HOSTNAME.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Hostname:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_HOSTNAME" name="CROCS_BS_UPE_HOSTNAME" value="'.$CROCS_BS_UPE_HOSTNAME.'"></td>
</tr>

 <tr>
 <td style="background-color:#FFA500;"><font size="1">Primary UPE Access Port:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_ACCESS_PORT" name="CROCS_UPE_ACCESS_PORT" value="'.$CROCS_UPE_ACCESS_PORT.'"></td>
 <td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Access Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_ACCESS_PORT" name="CROCS_BS_UPE_ACCESS_PORT" value="'.$CROCS_BS_UPE_ACCESS_PORT.'"></td>
</tr> 

 <tr><td style="background-color:#FFA500;"><font size="1">Primary UPE Trunk Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_TRUNK_PORT" name="CROCS_UPE_TRUNK_PORT" value="'.$CROCS_UPE_TRUNK_PORT.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Trunk Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_TRUNK_PORT" name="CROCS_BS_UPE_TRUNK_PORT" value="'.$CROCS_BS_UPE_TRUNK_PORT.'"></td></td>
</tr>
 ';}
else {
 echo '
  
<tr>
 <td style="background-color:#FFA500;"><font size="1">HQ IP:</font></td>
 <td style="background-color:#F5F5F5;"><input style="font-size:12px" size="50" type="text" id="CROCS_HQ_IP" name="CROCS_HQ_IP" value="'.$CROCS_HQ_IP.'"></td>
 <td></td>
</td><td style="background-color:#FFA500;"><font size="1">Framed Protocol:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_FRAMED_PROTOCOL" name="CROCS_FRAMED_PROTOCOL" value="'.$CROCS_FRAMED_PROTOCOL.'"></td>
</tr>


 <tr><td style="background-color:#FFA500;"><font size="1">Primary LAN IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_LAN_IP" name="CROCS_LAN_IP" value="'.$CROCS_LAN_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary LAN IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_LAN_IP" name="CROCS_BS_LAN_IP" value="'.$CROCS_BS_LAN_IP.'">
</tr>
 
 <tr><td style="background-color:#FFA500;"><font size="1">Loopback IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_LOOPBACK_IP" name="CROCS_LOOPBACK_IP" value="'.$CROCS_LOOPBACK_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Input Policy:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_INPUT_POLICY" name="CROCS_INPUT_POLICY" value="'.$CROCS_INPUT_POLICY.'"></td>
</tr> 

 <tr><td style="background-color:#FFA500;"><font size="1">Tunnel IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_TUNNEL_IP" name="CROCS_TUNNEL_IP" value="'.$CROCS_TUNNEL_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Output Policy:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_OUTPUT_POLICY" name="CROCS_OUTPUT_POLICY" value="'.$CROCS_OUTPUT_POLICY.'"></td>
</tr>

 <tr><td style="background-color:#FFA500;"><font size="1">Primary UPE Loopback IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_LOOPBACK_IP" name="CROCS_UPE_LOOPBACK_IP" value="'.$CROCS_UPE_LOOPBACK_IP.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Loopback IP:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_LOOPBACK_IP" name="CROCS_BS_UPE_LOOPBACK_IP" value="'.$CROCS_BS_UPE_LOOPBACK_IP.'"></td>
</tr>

 <tr>
 <td style="background-color:#FFA500;"><font size="1">Primary UPE Hostname:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_HOSTNAME" name="CROCS_UPE_HOSTNAME" value="'.$CROCS_UPE_HOSTNAME.'"></td>
 <td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Hostname:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_HOSTNAME" name="CROCS_BS_UPE_HOSTNAME" value="'.$CROCS_BS_UPE_HOSTNAME.'"></td>
</tr>

 <tr>
 <td style="background-color:#FFA500;"><font size="1">Primary UPE Access Port:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_ACCESS_PORT" name="CROCS_UPE_ACCESS_PORT" value="'.$CROCS_UPE_ACCESS_PORT.'"></td>
 <td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Access Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_ACCESS_PORT" name="CROCS_BS_UPE_ACCESS_PORT" value="'.$CROCS_BS_UPE_ACCESS_PORT.'"></td>
</tr> 

 <tr>
 <td style="background-color:#FFA500;"><font size="1">Primary UPE Trunk Port:</font></td>
 <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_UPE_TRUNK_PORT" name="CROCS_UPE_TRUNK_PORT" value="'.$CROCS_UPE_TRUNK_PORT.'"></td>
 <td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Trunk Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_TRUNK_PORT" name="CROCS_BS_UPE_TRUNK_PORT" value="'.$CROCS_BS_UPE_TRUNK_PORT.'"></td></td></tr> 
 '; }

echo '<tr><td style="background-color:#FFA500;"><font size="1">Primary EPE Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_EPE_NAME" name="CROCS_EPE_NAME" value="'.$CROCS_EPE_NAME.'"></td><td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary EPE Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_EPE_NAME" name="CROCS_BS_EPE_NAME" value="'.$CROCS_BS_EPE_NAME.'"></td>
</tr>';

echo '<td style="background-color:#FFA500;"><font size="1">Primary EPE Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_EPE_PORT" name="CROCS_EPE_PORT" value="'.$CROCS_EPE_PORT.'"></td></td>
<td></td>
<td style="background-color:#FFA500;"><font size="1">Secondary EPE Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_EPE_PORT" name="CROCS_BS_EPE_PORT" value="'.$CROCS_BS_EPE_PORT.'"></td>
</tr>';

/*
echo '<tr>
<td></td>
<td></td>
<td></td>
</td>
<td style="background-color:#FFA500;"><font size="1">Secondary UPE Trunk Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_UPE_TRUNK_PORT" name="CROCS_BS_UPE_TRUNK_PORT" value="'.$CROCS_BS_UPE_TRUNK_PORT.'"></td></td>
</tr>';


echo '<tr>
<td></td>
<td></td>
<td></td>
</td>
<td style="background-color:#FFA500;"><font size="1">Secondary EPE Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_EPE_NAME" name="CROCS_BS_EPE_NAME" value="'.$CROCS_BS_EPE_NAME.'"></td>
</tr>';
*/

/*
echo '<tr>
<td></td>
<td></td>
<td></td>
</td><td style="background-color:#FFA500;"><font size="1">Secondary EPE Port:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_BS_EPE_PORT" name="CROCS_BS_EPE_PORT" value="'.$CROCS_BS_EPE_PORT.'"></td>
</tr>';
*/

echo '</table>';
?>      
      <!-habis utk line info-->
      </div>
    </div>
    
    <div class="tabContent" id="HANDOVER">
      <!--<h2>HANDOVER INFO</h2>-->
      <div>
        <!--<p>Click a tab to view the tab's content. Using tabs couldn't be easier!</p>-->
        
        <!-- mula handover info sini-->
      <?php
 			echo '<table border="0"  width="53.8%">
 						<tr><td style="background-color:#BDBDBD;" colspan="4" align="center">HANDOVER INFO</td></tr>
 						</table><table border="0">
					<tr><td style="background-color:#FFA500; "><font size="1">Handover Order Number:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                         id="CROCS_ORDER_NUMBER" name="CROCS_ORDER_NUMBER" value="'.$CROCS_ORDER_NUMBER.'"></td></tr>
						 ';
			
			if ($Role <> 'GUEST'){
                 echo ' <tr>
						<td style="background-color:#ADD8E6;"><font size="1">Handover Order Type:</font></td>
						<td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_HO_ORDER_TYPE" name="CROCS_HO_ORDER_TYPE" value="'.$CROCS_HO_ORDER_TYPE.'"></td>
						<td style="background-color:#ADD8E6;"><select onchange="upd_HandoverOrderType(value)">
						<option value="">Please select Handover Order Type</option>
						<option value="New Install">New Install</option>
						<option value="Retain Resource">Retain Resource</option>
						<option value="Modify Bandwidth">Modify Bandwidth</option>
						<option value="Modify Bandwidth Downtime (L3)">Modify Bandwidth Downtime (L3)</option>
						<option value="Relocate">Relocate</option>
						<option value="Terminate">Terminate</option>
						</select></td>
						</tr>

						<tr>
						<td style="background-color:#ADD8E6;"><font size="1">Handover Order Status:</font></td>
						<td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_HO_STATUS" name="CROCS_HO_STATUS" value="'.$CROCS_HO_STATUS.'"'.$readonly.'></td>
						<td style="background-color:#ADD8E6;"><select onchange="upd_HandoverStatus(value)">
						<option value="">Please select Handover Order Status</option>
						<option value="Completed">Completed</option>
						<option value="Processing">Processing</option>
						<option value="PONR">PONR</option>
						<option value="Cancelled">Cancelled</option>
						</select></td>
						</tr>

          ';
			}
			else
			{
				echo ' <tr><td style="background-color:#FFA500; "><font size="1">Handover Order Type:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                         id="CROCS_HO_ORDER_TYPE" name="CROCS_HO_ORDER_TYPE" value="'.$CROCS_HO_ORDER_TYPE.'"></td></tr>
                   <tr><td style="background-color:#FFA500;"><font size="1">Handover Order Status:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                        id="CROCS_HO_STATUS" name="CROCS_HO_STATUS" value="'.$CROCS_HO_STATUS.'"'.$readonly.'></td></tr>';
			}
			
 
			if ($Role <> 'GUEST'){
			 //echo 'testing1';
            echo '<tr>
				 <td style="background-color:#ADD8E6;"><font size="1">Handover Activity Status:</font></font></td>
				 <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" readonly="true" type="text" 
				 id="CROCS_HO_REMARKS" name="CROCS_HO_REMARKS" value="'.$CROCS_HO_REMARKS.'"'.$readonly.'></td>
				 <td style="background-color:#ADD8E6;"><select onchange="upd_HandoverActivityStatus(value)">
						<option value="">Please select Handover Activity Status</option>
						<option value="Done">Done</option>
						<option value="In Progress">In Progress</option>
						<option value="Returned">Returned</option>
						<option value="Cancelled">Cancelled</option>
				 </select></td>
				 
				 </tr>
				 
				 <tr>
				 <td style="background-color:#ADD8E6;"><font size="1">Handover Activity Remarks:</font></td>
				 <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" 
				 id="CROCS_HO_ACTIVITY_COMMENT" name="CROCS_HO_ACTIVITY_COMMENT" value="'.$CROCS_HO_ACTIVITY_COMMENT.'"></td>
				 </tr>
				 
				 <tr>
				 <td style="background-color:#ADD8E6;"><font size="1">Alert Remarks:</font></td>
				 <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="textarea" 
				 id="CROCS_HO_ALERT_REMARKS" name="CROCS_HO_ALERT_REMARKS" value="'.$CROCS_HO_ALERT_REMARKS.'"></td>
				 </tr>
				 ';
 			} 
			else 
			{
				//echo 'testing2';
    			echo '<tr>
				<td style="background-color:#FFA500;"><font size="1">Handover Activity Status:</font></td>
				<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_HO_REMARKS" name="CROCS_HO_REMARKS" value="'.$CROCS_HO_REMARKS.'"></td>
				</tr> 
				
				<tr>
				<td style="background-color:#FFA500;"><font size="1">Handover Activity Remarks:</font></td>
				<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_HO_ACTIVITY_COMMENT" name="CROCS_HO_ACTIVITY_COMMENT" value="'.$CROCS_HO_ACTIVITY_COMMENT.'"></td>
				</tr>
				
				<tr>
				<td style="background-color:#FFA500;"><font size="1">Alert Remarks:</font></td>
				<td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_HO_ALERT_REMARKS" name="CROCS_HO_ALERT_REMARKS" value="'.$CROCS_HO_ALERT_REMARKS.'"></td>
				</tr>';
        } 
		//echo 'test3';
      if ($Role <> 'GUEST'){
    			echo ' <tr><td style="background-color:#FFA500;"><font size="1">CDF Personnel:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                    id="CROCS_CDF_PERSONNEL" name="CROCS_CDF_PERSONNEL" value="'.$CROCS_CDF_PERSONNEL.'"></td></tr>
     '; } else {
            echo '<tr><td style="background-color:#FFA500;"><font size="1">CDF Personnel:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                     id="CROCS_CDF_PERSONNEL" name="CROCS_CDF_PERSONNEL" value="'.$CROCS_CDF_PERSONNEL.'"></td></tr>
     ';}
    
      if ($Role <> 'GUEST'){ ?> 
          <tr><td style="background-color:#ADD8E6;"><font size="1">Handover Acceptance Date:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" 
                 name="CROCS_CDF_SIGN_OFF_DATE" id="CROCS_CDF_SIGN_OFF_DATE" type="text" size="25" value="<?php echo $CROCS_CDF_SIGN_OFF_DATE; ?>"><a 
                 href="javascript:NewCal('CROCS_CDF_SIGN_OFF_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
                 <td style="background-color:#ADD8E6;" border ="0"><font size="1">Format:DD/MM/YYYY</font></td>
     <?php 
     } else { 
     ?> 
 				<tr><td style="background-color:#FFA500;"><font size="1">Handover Acceptance Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                  name="CROCS_CDF_SIGN_OFF_DATE" id="CROCS_CDF_SIGN_OFF_DATE" type="text" size="25" value="<?php echo $CROCS_CDF_SIGN_OFF_DATE; ?>" </td></tr>
	<?php 
	}
 
 		echo '
 				<tr><td style="background-color:#FFA500;"><font size="1">Last Updated Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                  id="CROCS_UPDATED_DATE" name="CROCS_UPDATED_DATE" value="'.$CROCS_UPDATED_DATE.'"></td></tr>
             <tr><td style="background-color:#FFA500;"><font size="1">Updated By:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                  id="CROCS_UPDATED_BY" name="CROCS_UPDATED_BY" value="'.$CROCS_UPDATED_BY.'"></td></tr>
      '; 
echo '</table><table border="0" width="50%">'; 

  
    if ($Role <> 'GUEST'){
    if ($testAttachment != "Y") {
        echo' <tr><td style="background-color:#ADD8E6;"><font size="1">Configuration Attachments:</font></td><td style="background-color:#ADD8E6;"></td>
        <td style="background-color:#ADD8E6;">'.$uploadattachment.'</td></tr>';
      
    }
    else{  
        echo ' <tr><td style="background-color:#ADD8E6;"><font size="1">Configuration Attachments:</font></td><td style="background-color:#ADD8E6;">
        <table border="1"><tr><td align="center" style="background-color:#ADD8E6;"><font size="1">Attachment Name</font></td>
        <td align="center" style="background-color:#ADD8E6;"><font size="1">Timestamp</font></td>
        <td align="center"><font size="1">Size</font></td>
        <td align="center" style="background-color:#ADD8E6;"><font size="1">By</font></td>
        <td align="center" style="background-color:#ADD8E6;"><font size="1">Remove?</font></td></tr>'.$attachment.'</table>
        </td><td style="background-color:#ADD8E6;"><font size="1">'.$uploadattachment.'</font></td></tr>';
     
    }
  
    if ($testAttachment1 != "Y") {
        echo' <tr><td style="background-color:#ADD8E6;"><font size="1">Handover Attachments:</font></td><td style="background-color:#ADD8E6;"></td>
        <td style="background-color:#ADD8E6;"><font size="1">'.$uploadattachment1.'</font></td>';
    }
    else{  
        echo ' <tr><td style="background-color:#ADD8E6;"><font size="1">Handover Attachments:</font></td>
                 <td style="background-color:#ADD8E6;">
                 <table border="1"><tr><td align="center" style="background-color:#ADD8E6;"><font size="1"><font size="1">Attachment Name</font></font></td>
                 <td align="center" style="background-color:#ADD8E6;"><font size="1"><font size="1">Timestamp</font></font></td>
                 <td align="center" style="background-color:#ADD8E6;"><font size="1">Size</font></td>
                 <td align="center" style="background-color:#ADD8E6;"><font size="1">By</font></td>
                 <td align="center" style="background-color:#ADD8E6;"><font size="1">Remove?</font></td>
                 </tr>'.$attachment1.'</table></td>
                 <td style="background-color:#ADD8E6;"><font size="1">'.$uploadattachment1.'</font></td>';
    } 
  }
  else{
    if ($testAttachment != "Y") {
    		echo' <tr><td style="background-color:#FFA500;"><font size="1">Configuration Attachments:</font></td><td style="background-color:#FFA500;"></td><td></td>';
    } else {  
         echo ' <tr><td style="background-color:#FFA500;"><font size="1">Configuration Attachments:</font></td>
                   <td style="font-size:10px" style="background-color:#FFA500;">
                   <table border="1"><tr><td align="center" style="background-color:#FFA500;"><font size="1">Attachment Name</font></td>
                   <td align="center" style="background-color:#FFA500;"><font size="1">Timestamp</font></td>
                   <td align="center" style="background-color:#FFA500;"><font size="1">Size</font></td>
                   <td align="center" style="background-color:#FFA500;"><font size="1">By</font></td></tr>'.$attachment.'</table></td><td></td>';
    }

    if ($testAttachment1 != "Y") {
        echo' <tr><td style="background-color:#FFA500;"><font size="1">Handover Attachments:</font></td><td style="background-color:#FFA500;"></td><td></td>';
    }  else {  
        echo ' <tr><td style="background-color:#FFA500;"><font size="1">Handover Attachments:</font></td>
                 <td style="font-size:10px" style="background-color:#FFA500;">
                 <table border="1">
                 <tr><td align="center" style="background-color:#FFA500;"><font size="1">Attachment Name</font></td>
                 <td align="center" style="background-color:#FFA500;"><font size="1">Timestamp</font></td>
                 <td align="center" style="background-color:#FFA500;"><font size="1">Size</font></td>
                 <td align="center" style="background-color:#FFA500;"><font size="1">By</font></td></tr>'.$attachment1.'</table></td><td></td>';
    }
  }

  echo '</table>';
?>

        <!--habis handover info sini-->
      </div>
    </div>
    
     <div class="tabContent" id="CTT">
      <!--<h2>LATEST CTT INFO</h2>-->
      <div>
        <!--<p>Click a tab to view the tab's content. Using tabs couldn't be easier!</p>-->
        <!--latest ctt info mula sini-->
        
  <?php
        
        echo '<table border="0"><tr><td style="background-color:#BDBDBD;" colspan="4" align="center">LATEST CTT INFO</td></tr>';
        if ($Role <> 'GUEST')
		{
    			echo '				
    					<tr>
						<td style="background-color:#FFA500;"><font size="1">CTT Number:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                        id="CROCS_CTT_NO" name="CROCS_CTT_NO" value="'.$CROCS_CTT_NO.'"></td> ';
							
                             /*<td style="background-color:#FFA500;"><font size="1">CTT Priority:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                              id="CROCS_CTT_PRIORITY" name="CROCS_CTT_PRIORITY" value="'.$CROCS_CTT_PRIORITY.'">
							  </td>
							 */
						'</tr>';
 		  } 
		  else 
		  {
    			echo '<tr>
				<td style="background-color:#FFA500;"><font size="1">CTT Number:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                            id="CROCS_CTT_NO" name="CROCS_CTT_NO" value="'.$CROCS_CTT_NO.'"></td> ';
							
							/*
							<td style="background-color:#FFA500;"><font size="1">CTT Priority:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                            id="CROCS_CTT_PRIORITY" name="CROCS_CTT_PRIORITY" value="'.$CROCS_CTT_PRIORITY.'"></td>
							*/
					'</tr>';
       } 
       if ($Role <> 'GUEST'){
            echo ' <tr><td style="background-color:#FFA500;"><font size="1">CTT Created Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                            id="CROCS_CTT_CREATED_DATE" name="CROCS_CTT_CREATED_DATE" value="'.$CROCS_CTT_CREATED_DATE.'"></td>
                            <td style="background-color:#FFA500;"><font size="1">CTT Closed Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text"               
                            id="CROCS_CTT_CLOSED_DATE" name="CROCS_CTT_CLOSED_DATE" value="'.$CROCS_CTT_CLOSED_DATE.'"></td></tr>';
     }
    else {
    echo '<tr><td style="background-color:#FFA500;"><font size="1">CTT Created Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                    id="CROCS_CTT_CREATED_DATE" name="CROCS_CTT_CREATED_DATE" value="'.$CROCS_CTT_CREATED_DATE.'"></td>
                    <td style="background-color:#FFA500;"><font size="1">CTT Closed Date:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
                    id="CROCS_CTT_CLOSED_DATE" name="CROCS_CTT_CLOSED_DATE" value="'.$CROCS_CTT_CLOSED_DATE.'"></td></tr>';
    }
    
  
 
  echo ' 
         <tr>
		 <td style="background-color:#FFA500;"><font size="1">CTT Cause Category:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
         type="text" id="CROCS_CTT_CAUSE_CAT" name="CROCS_CTT_CAUSE_CAT" value="'.$CROCS_CTT_CAUSE_CAT.'"></td>
		 
         <td style="background-color:#FFA500;"><font size="1">CTT Description:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CTT_DESC" 
         name="CROCS_CTT_DESC" value="'.$CROCS_CTT_DESC.'"></td>
         </tr>
		 
         <tr>
		 <td style="background-color:#FFA500;"><font size="1">CTT Resolution Code:</font></td>
		  <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CTT_RES_CODE" name="CROCS_CTT_RES_CODE" value="'.$CROCS_CTT_RES_CODE.'"></td>
		 
         <td style="background-color:#FFA500;"><font size="1">CTT Cause Code:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
         id="CROCS_CTT_CAUSE_CODE" name="CROCS_CTT_CAUSE_CODE" value="'.$CROCS_CTT_CAUSE_CODE.'"></td>
         </tr>'; 
   /*
   echo '
          <tr><td style="background-color:#FFA500;"><font size="1">CTT Resolution Code:</font></td>
		  <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CTT_RES_CODE" name="CROCS_CTT_RES_CODE" value="'.$CROCS_CTT_RES_CODE.'"></td>
		  </tr>'; 
	
   echo '
          <tr><td style="background-color:#FFA500;"><font size="1">CTT Closed By Name:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
          id="CROCS_CTT_CLOSED_NAME" name="CROCS_CTT_CLOSED_NAME" value="'.$CROCS_CTT_CLOSED_NAME.'"></td>
          <td style="background-color:#FFA500;"><font size="1">CTT Closed by Team:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" 
           id="CROCS_CTT_CLOSED_TEAM" name="CROCS_CTT_CLOSED_TEAM" value="'.$CROCS_CTT_CLOSED_TEAM.'"></td></tr>';
    */
  
  
  echo '</table>';
?>
        
        <!--latest ctt info habis sini-->
      </div>
    </div>
    
	<!--
     <div class="tabContent" id="CR">
      <h2>CR AND MAINTENANCE INFO</h2>
      <div>-->
        <!--<p>Click a tab to view the tab's content. Using tabs couldn't be easier!</p>-->
        <!-- CR info mula d sini-->
       <?php
	   /*
        		echo '<table  border="0">
        				<tr><td style="background-color:#BDBDBD;" colspan = "3" align="center">CR INFO</td></tr> ';
 				if ($Role <> 'GUEST'){
					echo '<tr><td style="background-color:#ADD8E6;"><font size="1">CR Order No.:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_CR_ORDER_NO" name="CROCS_CR_ORDER_NO" value="'.$CROCS_CR_ORDER_NO.'"></td></tr>
                      <tr><td style="background-color:#ADD8E6;"><font size="1">CR Description:</font></td><td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_CR_DESC" name="CROCS_CR_DESC" value="'.$CROCS_CR_DESC.'"></td></tr>';
 				}	else {
 					echo '<tr><td style="background-color:#FFA500;"><font size="1">CR Order No.:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                       type="text" id="CROCS_CR_ORDER_NO" name="CROCS_CR_ORDER_NO" value="'.$CROCS_CR_ORDER_NO.'"></td></tr>
                       <tr><td colspan="4"></td><td style="background-color:#FFA500;"><font size="1">CR Description:</font></td><td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" 
                       type="text" id="CROCS_CR_DESC" name="CROCS_CR_DESC" value="'.$CROCS_CR_DESC.'"></td></tr>';
            } 
            if ($Role <> 'GUEST'){
               ?> 
                <tr><td style="background-color:#ADD8E6;"><font size="1">CR Created Date:</font></td>
                <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" name="CROCS_CR_CREATED_DATE" id="CROCS_CR_CREATED_DATE" type="text" size="25" value="<?php echo 
                $CROCS_CR_CREATED_DATE; ?>"><a href="javascript:NewCal('CROCS_CR_CREATED_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
                <td style="background-color:#ADD8E6;" border ="0"><font size="1">Format:DD/MM/YYYY</font></td></tr>
                <?php
   
               echo '<tr><td style="background-color:#ADD8E6;"><font size="1">CR Order Type :</td>
               <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_CR_ORDER_TYPE" name="CROCS_CR_ORDER_TYPE" value="'.$CROCS_CR_ORDER_TYPE.'"></td></tr>
    				<tr><td style="background-color:#ADD8E6;"><font size="1">CR Status :</font></td>
    				<td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_CR_STATUS" name="CROCS_CR_STATUS" value="'.$CROCS_CR_STATUS.'"></td></tr>';
        } else {
            ?> 
               <tr><td style="background-color:#FFA500;"><font size="1">CR Created Date:</font></td>
               <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" name="CROCS_CR_CREATED_DATE" id="CROCS_CR_CREATED_DATE" type="text" size="25" value="<?php echo 
                $CROCS_CR_CREATED_DATE; ?>"</tr>
            <?php 
               echo '<tr><td style="background-color:#FFA500;">CR Order Type:</td>
               <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CR_ORDER_TYPE" name="CROCS_CR_ORDER_TYPE" 
                value="'.$CROCS_CR_ORDER_TYPE.'"></td></tr>
                <tr><td style="background-color:#FFA500;"><font size="1">CR Status:</font></td>
                <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_CR_STATUS" name="CROCS_CR_STATUS" value="'.$CROCS_CR_STATUS.'"></td></tr> ';
         }
       
       echo '<tr></tr>
                <tr><td style="background-color:#BDBDBD;" colspan = "3" align="center">MAINTENANCE INFO</td></tr>';
       if ($Role <> 'GUEST'){
              ?> 
                <tr><td style="background-color:#ADD8E6;"><font size="1">Latest Preventive Maintenance Date:</font></td>
                <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_LATEST_PM_DATE" name="CROCS_LATEST_PM_DATE" value="<?php echo $CROCS_LATEST_PM_DATE; ?>">
                <a href="javascript:NewCal('CROCS_LATEST_PM_DATE','ddmmyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
                <td style="background-color:#ADD8E6;"><font size="1">Format:DD/MM/YYYY</font></td></tr>
            <?php 
       } else {?> 
               <tr><td style="background-color:#FFA500;"><font size="1">Latest Preventive Maintenance Date:</font></td>
               <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_LATEST_PM_DATE" name="CROCS_LATEST_PM_DATE" value="<?php echo 
                $CROCS_LATEST_PM_DATE; ?>"></td></tr>
           <?php 
       }
       if ($Role <> 'GUEST'){
               echo '<tr></td><td style="background-color:#ADD8E6;"><font size="1">Preventive Management Description:</font></td>
               <td style="background-color:#ADD8E6;"><input style="font-size:12px" size="50" type="text" id="CROCS_PM_DESC" name="CROCS_PM_DESC" value="'.$CROCS_PM_DESC.'"></td></tr>';
       } else {
               echo '<tr></td><td style="background-color:#FFA500;"><font size="1">Preventive Management Description:</font></td>
               <td><input style="font-size:12px" size="50" style="background-color:#F5F5F5;" readonly="true" type="text" id="CROCS_PM_DESC" name="CROCS_PM_DESC" value="'.$CROCS_PM_DESC.'"></td></tr> ';
       }
 
  
     echo '</table>';
	 */
 ?> 
        
        <!--CR Info habis di sini-->
      <!--</div>
    </div> -->
<?php
    echo '<table border="0" width="100%">';
    if ($Role <> 'GUEST'){
             echo '<tr><td  align="center"><input type="submit" name="UPD_BUTTON" value="Update" /></td></tr>';
     } else {
             echo '<tr><td>&nbsp</td></tr>';    
     }
      echo '</table>';
?>

<!--tutup form-->
<?php echo '</form>'; ?>
<!--habis tutup form-->
  </body>
</html>

