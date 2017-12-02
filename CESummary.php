<?php 
include '../../inc/CROCSLogin.php';

 include 'inc_fn_userid_enc.php';

 //Inialize session
 session_start();

 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    $userID = decrypt($U);
      
   $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$userID."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";
      
   $stid = oci_parse($cemdb, $sql);
   
   if(!$stid) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 
   else{
    oci_define_by_name($stid, 'USERNAME', $name);
    oci_define_by_name($stid, 'ROLE', $role);
    oci_execute($stid);}
    
   if ($row = !oci_fetch($stid)){
        $name = "GUEST";
        $role = "GUEST";
   }
    }
  oci_free_statement($stid);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CE Summary</title>

<style type="text/css">

	body
	{
		font-family: 'Helvetica Neue', Helvetica, Arial;
  		-webkit-font-smoothing: antialiased;
  		font-smoothing: antialiased;
		
	}

	h3
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
	
	table
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:10px;
	}
	

</style>

</head>
<body>
<big>

<h3>Report #1: Total Number of Customer Equipment</h3>
<?php
include '../../inc/CROCSLogin.php';
/*
$sql = "SELECT DISTINCT UPPER(CROCS_LOB) AS CROCS_LOB, COUNT(*) AS TOTAL FROM DATA_MAPPING_CROCS WHERE (UPPER(CROCS_LOB) <> 'WHOLESALE' AND CROCS_LOB IS NOT NULL) GROUP BY CROCS_LOB";
 
 $stid1 = oci_parse($cemdb, $sql);
 $result = oci_execute($stid1);
 if (!$stid1) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else {
oci_define_by_name($stid1, 'CROCS_LOB', $LOB_SEGMENT); 	
oci_define_by_name($stid1, 'TOTAL', $TOTAL);
}
    
 echo '<table border="1">
  <tr>
    <th style="background-color:#FFA500;">LOB SEGMENT</th>
    <th style="background-color:#FFA500;">TOTAL EQUIPMENT</th> 
  </tr>';
$OVERALL = 0;
while (($row1 = oci_fetch_array($stid1)) != false) {
 	$LOB_SEGMENT = $row1['CROCS_LOB'];    
    $TOTAL = $row1['TOTAL'];
    $OVERALL = $OVERALL + $TOTAL;
    $LOB_data[] = array($row1['CROCS_LOB'], (int)$row1['TOTAL']);
 echo "<tr>
        <td align='center'><a href='detailSummaryLOB.php?U=".$U."&SEGMENT=".$LOB_SEGMENT."'>".$row1['CROCS_LOB']."</a></td>
        <td align='center'>".$TOTAL."</td> 
      </tr>";
  }
 echo "<tr>
    <th style='background-color:#C8C8C8;'>OVERALL</th>
    <td align='center'>".$OVERALL."</td> 
  </tr></table><br>";

$LOB_data = json_encode($LOB_data);

$HTML =<<<XYZ
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
      // Load the Visualization API and the charts package.
      google.load('visualization', '1.0', {'packages':['corechart']});
 
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
 
      function drawChart() {
 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LOB Segment');
        data.addColumn('number', 'Total');
        data.addRows({$LOB_data});
 
        // Set chart options
        var options = {title:'',
         titleTextStyle: {fontName: 'Lato', fontSize: 18, bold: true},
                       height: 350,
                       is3D: true,
         //colors:['#0F4F8D','#2B85C1','#8DA9BF','#F2C38D','#E6AC03','#F09B35', '#D94308', '#013453'],
         pieSliceTextStyle: {color: 'white',},
         //pieSliceText: 'value-and-percentage',
         pieSliceText: 'percentage',
         chartArea:{left:50,top:50,width:'100%',height:'100%'}};
 
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('LOB_data'));
        chart.draw(data, options);
      }
 
      // Make the charts responsive
      jQuery(document).ready(function(){
        jQuery(window).resize(function(){
          drawChart();
        });
      });
 
    </script>
    <div id="LOB_data"></div>
XYZ;
    echo $HTML;
*/    
    

 $sql1 = "SELECT DISTINCT UPPER(CROCS_HO_ACT_REP) AS CROCS_HO_ACT_REP, COUNT(*) AS TOTAL1 FROM DATA_MAPPING_CROCS 
WHERE (UPPER(CROCS_HO_ACT_REP) = 'IPVPN-ACCEPT LEG HANDOVER' OR UPPER(CROCS_HO_ACT_REP) = 'IPGL-ACCEPT LEG HANDOVER' OR UPPER(CROCS_HO_ACT_REP) = 'TMD-ACCEPT LEG HANDOVER')
AND (CROCS_CUST_NAME <> '' OR CROCS_CUST_NAME IS NOT NULL)
GROUP BY CROCS_HO_ACT_REP";

 $stid11 = oci_parse($cemdb, $sql1);
 $result1 = oci_execute($stid11);
 if (!$stid11) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else {
oci_define_by_name($stid11, 'CROCS_HO_ACT_REP', $PRODUCT_NAME); 	
oci_define_by_name($stid11, 'TOTAL1', $TOTAL1);
}
  
 echo '<table border="1" align="center">
  <tr>
    <th style="background-color:#FFA500;">PRODUCT NAME</th>
    <th style="background-color:#FFA500;">TOTAL EQUIPMENT</th> 
  </tr>';
$OVERALL1 = 0;
while (($row11 = oci_fetch_array($stid11)) != false) {
 	$PRODUCT_NAME = $row11['CROCS_HO_ACT_REP'];    
    $TOTAL1 = $row11['TOTAL1'];
    $OVERALL1 = $OVERALL1 + $TOTAL1;
    $PRODUCT = "";
//    $PRODUCT_DATA[] = array($row11['CROCS_HO_ACT_REP'], (int)$row11['TOTAL1']);
if ($row11['CROCS_HO_ACT_REP'] == 'IPVPN-ACCEPT LEG HANDOVER')
{
      $PRODUCT = "IPVPN";
}
else if ($row11['CROCS_HO_ACT_REP'] == 'IPGL-ACCEPT LEG HANDOVER')
{
     $PRODUCT = "GLOBAL";
}
else
{
     $PRODUCT = "TMDIRECT";    
}
echo "<tr>
<td align='center'><a href='detailSummaryProduct.php?U=".$U."&PRODUCT=".$PRODUCT_NAME."'>".$PRODUCT."</a></td>
<td align='center'>".$TOTAL1."</td> 
</tr>";
$PRODUCT_DATA[] = array($PRODUCT, (int)$row11['TOTAL1']);
  }
 echo "<tr>
    <th style='background-color:#C8C8C8;'>OVERALL</th>
    <td align='center'>".$OVERALL1."</td> 
  </tr></table><br>";
  
 
$PRODUCT_DATA = json_encode($PRODUCT_DATA);

$TEST =<<<xyz
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
      // Load the Visualization API and the charts package.
      google.load('visualization', '1.0', {'packages':['corechart']});
 
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
 
      function drawChart() {
 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LOB Segment');
        data.addColumn('number', 'Total');
        data.addRows({$PRODUCT_DATA});
 
        // Set chart options
        var options = {title:'',
         titleTextStyle: {fontName: 'Lato', fontSize: 18, bold: true},
                       height: 350,
                       is3D: true,
         //colors:['#0F4F8D','#2B85C1','#8DA9BF','#F2C38D','#E6AC03','#F09B35', '#D94308', '#013453'],
         pieSliceTextStyle: {color: 'white',},
         //pieSliceText: 'value-and-percentage',
         pieSliceText: 'percentage',
         chartArea:{left:50,top:50,width:'100%',height:'100%'}};
 
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('PRODUCT_DATA'));
        chart.draw(data, options);
      }
 
      // Make the charts responsive
      jQuery(document).ready(function(){
        jQuery(window).resize(function(){
          drawChart();
        });
      });
 
    </script>
    <div id="PRODUCT_DATA"></div>
xyz;
    echo $TEST;
?>

<h3>Report #2: Handover Activity Status According to Line of Business VS Product Name</h3>

<?php
include '../../inc/CROCSLogin.php';
    
 echo '<table border="1" align="center">
  <tr>
    <th style="background-color:#FFA500;" rowspan="2">LINE OF BUSINESS</th>
    <th style="background-color:#FFA500;" rowspan="2">ACTIVITY STATUS</th> 
    <th style="background-color:#FFFF33;" colspan="3">IPGL-Accept Leg Handover</th> 
    <th style="background-color:#FFFF33;" rowspan="2">IPGL-Accept Leg Handover Total</th>
    <th style="background-color:#99FF00;" colspan="9">IPVPN-Accept Leg Handover</th> 
    <th style="background-color:#99FF00;" rowspan="2">IPVPN-Accept Leg Handover Total</th>
    <th style="background-color:#1C86EE;" colspan="6">TMD-Accept Leg Handover</th> 
    <th style="background-color:#1C86EE;" rowspan="2">TMD-Accept Leg Handover Total</th> 
    <th style="background-color:#FFA500;" rowspan="2">GRAND TOTAL</th> 
  </tr>  
  <tr>
    <th style="background-color:#FFFF33;">Global IPVPN Domestic Leg</th>
    <th style="background-color:#FFFF33;">Global IPVPN Leg</th>
    <th style="background-color:#FFFF33;">Global IPVPN Leg with Proxy</th>
    <th style="background-color:#99FF00;">IPVPN Lite Customized Leg</th>
    <th style="background-color:#99FF00;">IPVPN Lite Leg</th>
    <th style="background-color:#99FF00;">IPVPN Lite Standard Plus Leg</th>
    <th style="background-color:#99FF00;">IPVPN Premier Customized Leg</th>
    <th style="background-color:#99FF00;">IPVPN Premier Leg</th>
    <th style="background-color:#99FF00;">IPVPN Premier Standard Plus Leg</th>
    <th style="background-color:#99FF00;">IPVPN Value Customized Leg</th>
    <th style="background-color:#99FF00;">IPVPN Value Leg</th>
    <th style="background-color:#99FF00;">IPVPN Value Standard Plus Leg</th>
    <th style="background-color:#1C86EE;">Customized Direct Package</th>
    <th style="background-color:#1C86EE;">Direct Leased Line Basic Package - DOLL</th>
    <th style="background-color:#1C86EE;">Direct Standard Plus Package</th>
    <th style="background-color:#1C86EE;">Gold Direct Package - DOME</th>
    <th style="background-color:#1C86EE;">Silver Direct Package - DOME</th>
    <th style="background-color:#1C86EE;">Standard Direct Package - DOME</th>
                                    
  </tr>';
   $PRODUCT_DATA = array("Global IPVPN Domestic Leg", "Global IPVPN Leg", "Global IPVPN Leg with Proxy", "IPVPN Lite Customized Leg", "IPVPN Lite Leg", "IPVPN Lite Standard Plus Leg", "IPVPN Premier Customized Leg", "IPVPN Premier Leg", "IPVPN Premier Standard Plus Leg", "IPVPN Value Customized Leg", "IPVPN Value Leg", "IPVPN Value Standard Plus Leg", "Customized Direct Package", "Customized Direct Package", "Direct Leased Line Basic Package - DOLL", "Direct Standard Plus Package", "Gold Direct Package - DOME", "Silver Direct Package - DOME", "Standard Direct Package - DOME");
   $counter1 = count($PRODUCT_DATA);
   
   $TOTAL1 = 0;
   $TOTAL2 = 0;
   $TOTAL3 = 0;
   $GRANDTOTAL1 = 0;
   $TOTAL4 = 0;
   $TOTAL5 = 0;
   $TOTAL6 = 0;
   $TOTAL7 = 0;
   $TOTAL8 = 0;
   $TOTAL9 = 0;
   $TOTAL10 = 0;
   $TOTAL11 = 0;
   $TOTAL12 = 0;   
   $GRANDTOTAL2 = 0;
   $TOTAL13 = 0;
   $TOTAL14 = 0;
   $TOTAL15 = 0;
   $TOTAL16 = 0;
   $TOTAL17 = 0;
   $TOTAL18 = 0;
   $GRANDTOTAL3 = 0;
   $GRANDTOTAL4 = 0;
 
  echo "<tr>
        <td style='background-color:#C8C8C8'; rowspan='3' align='center'><b>GOVERNMENT</b></td>";
  echo    "<tr style='background-color:#C8C8C8';>
            <td align='center'>Done</td>"; 
        
  include 'GOVdone.php';
  
  echo    "</tr>
            <tr>
            <td align='center'>Returned</td>";
  
  include 'GOVreturned.php';
              
  echo    "</tr>";
  
    echo "<tr>
        <td style='background-color:#C8C8C8'; rowspan='3' align='center'><b>GLOBAL</b></td>";
  echo    "<tr style='background-color:#C8C8C8';>
            <td align='center'>Done</td>"; 
        
  include 'GLOBALdone.php';
  
  echo    "</tr>
            <tr>
            <td align='center'>Returned</td>";
  
  include 'GLOBALreturned.php';
              
  echo    "</tr>";
  
    echo "<tr>
        <td style='background-color:#C8C8C8'; rowspan='3' align='center'><b>INTERNAL</b></td>";
  echo    "<tr style='background-color:#C8C8C8';>
            <td align='center'>Done</td>"; 
        
  include 'INTERNALdone.php';
  
  echo    "</tr>
            <tr>
            <td align='center'>Returned</td>";
  
  include 'INTERNALreturned.php';
              
  echo    "</tr>";
  
    echo "<tr>
        <td style='background-color:#C8C8C8'; rowspan='3' align='center'><b>ENTERPRISE</b></td>";
  echo    "<tr style='background-color:#C8C8C8';>
            <td align='center'>Done</td>"; 
        
  include 'ENTERPRISEdone.php';
  
  echo    "</tr>
            <tr>
            <td align='center'>Returned</td>";
  
  include 'ENTERPRISEreturned.php';
              
  echo    "</tr>";
  
    echo "<tr>
        <td style='background-color:#C8C8C8'; rowspan='3' align='center'><b>SME</b></td>";
  echo    "<tr style='background-color:#C8C8C8';>
            <td align='center'>Done</td>"; 
        
  include 'SMEdone.php';
  
  echo    "</tr>
            <tr>
            <td align='center'>Returned</td>";
  
  include 'SMEreturned.php';
              
  echo    "</tr>";
  
 echo "<tr>
    <th style='background-color:#C8C8C8;' colspan='2'>TOTAL</th>
    <td style='background-color:#FFFF99'; align='center'>".$TOTAL1."</td>
    <td style='background-color:#FFFF99'; align='center'>".$TOTAL2."</td>
    <td style='background-color:#FFFF99'; align='center'>".$TOTAL3."</td>
    <td style='background-color:#FFFF99'; align='center'>".$GRANDTOTAL1."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL4."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL5."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL6."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL7."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL8."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL9."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL10."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL11."</td>
    <td style='background-color:#99FF99'; align='center'>".$TOTAL12."</td>
    <td style='background-color:#99FF99'; align='center'>".$GRANDTOTAL2."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL13."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL14."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL15."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL16."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL17."</td>
    <td style='background-color:#60AFFE'; align='center'>".$TOTAL18."</td>
    <td style='background-color:#60AFFE'; align='center'>".$GRANDTOTAL3."</td>
    <td style='background-color:#FF9933'; align='center'>".$GRANDTOTAL4."</td>
  </tr></table><br>";
  
  $TOTAL_IPVPN_GLOBAL_DONE = $IPVPN_GLOBAL_GOV + $IPVPN_GLOBAL_GLOBAL + $IPVPN_GLOBAL_INT + $IPVPN_GLOBAL_ENT + $IPVPN_GLOBAL_SME;
  $TOTAL_IPVPN_LITE_DONE = $IPVPN_LITE_GOV + $IPVPN_LITE_GLOBAL + $IPVPN_LITE_INT + $IPVPN_LITE_ENT + $IPVPN_LITE_SME;
  $TOTAL_IPVPN_PREMIER_DONE = $IPVPN_PREMIER_GOV + $IPVPN_PREMIER_GLOBAL + $IPVPN_PREMIER_INT + $IPVPN_PREMIER_ENT + $IPVPN_PREMIER_SME;
  $TOTAL_IPVPN_VALUE_DONE = $IPVPN_VALUE_GOV + $IPVPN_VALUE_GLOBAL + $IPVPN_VALUE_INT + $IPVPN_VALUE_ENT + $IPVPN_VALUE_SME;
  $TOTAL_TMDIRECT_DONE = $TMDIRECT_GOV + $TMDIRECT_GLOBAL + $TMDIRECT_INT + $TMDIRECT_ENT + $TMDIRECT_SME;
  
  $TOTAL_IPVPN_GLOBAL_RETURNED = $IPVPN_GLOBAL_GOV1 + $IPVPN_GLOBAL_GLOBAL1 + $IPVPN_GLOBAL_INT1 + $IPVPN_GLOBAL_ENT1 + $IPVPN_GLOBAL_SME1;
  $TOTAL_IPVPN_LITE_RETURNED = $IPVPN_LITE_GOV1 + $IPVPN_LITE_GLOBAL1 + $IPVPN_LITE_INT1 + $IPVPN_LITE_ENT1 + $IPVPN_LITE_SME1;
  $TOTAL_IPVPN_PREMIER_RETURNED = $IPVPN_PREMIER_GOV1 + $IPVPN_PREMIER_GLOBAL1 + $IPVPN_PREMIER_INT1 + $IPVPN_PREMIER_ENT1 + $IPVPN_PREMIER_SME1;
  $TOTAL_IPVPN_VALUE_RETURNED = $IPVPN_VALUE_GOV1 + $IPVPN_VALUE_GLOBAL1 + $IPVPN_VALUE_INT1 + $IPVPN_VALUE_ENT1 + $IPVPN_VALUE_SME1;
  $TOTAL_TMDIRECT_RETURNED = $TMDIRECT_GOV1 + $TMDIRECT_GLOBAL1 + $TMDIRECT_INT1 + $TMDIRECT_ENT1 + $TMDIRECT_SME1;
  
  $HTML2 =<<<DEF
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
      // Load the Visualization API and the charts package.
      google.load('visualization', '1.0', {'packages':['corechart']});
 
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
 
      function drawChart() {
 
        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
         ['STATUS', 'GOVERNMENT', 'GLOBAL', 'INTERNAL', 'ENTERPRISE', 'SME', 'GRAND TOTAL'],
         ['DONE',  $IPVPN_GLOBAL_GOV, $IPVPN_GLOBAL_GLOBAL, $IPVPN_GLOBAL_INT, $IPVPN_GLOBAL_ENT, $IPVPN_GLOBAL_SME, $TOTAL_IPVPN_GLOBAL_DONE],
         ['RETURNED',  $IPVPN_GLOBAL_GOV1, $IPVPN_GLOBAL_GLOBAL1, $IPVPN_GLOBAL_INT1, $IPVPN_GLOBAL_ENT1, $IPVPN_GLOBAL_SME1, $TOTAL_IPVPN_GLOBAL_RETURNED],
         ['DONE',  $IPVPN_LITE_GOV, $IPVPN_LITE_GLOBAL, $IPVPN_LITE_INT, $IPVPN_LITE_ENT, $IPVPN_LITE_SME, $TOTAL_IPVPN_LITE_DONE],
         ['RETURNED',  $IPVPN_LITE_GOV1, $IPVPN_LITE_GLOBAL1, $IPVPN_LITE_INT1, $IPVPN_LITE_ENT1, $IPVPN_LITE_SME1, $TOTAL_IPVPN_LITE_RETURNED],
         ['DONE',  $IPVPN_PREMIER_GOV, $IPVPN_PREMIER_GLOBAL, $IPVPN_PREMIER_INT, $IPVPN_PREMIER_ENT, $IPVPN_PREMIER_SME, $TOTAL_IPVPN_PREMIER_DONE],
         ['RETURNED',  $IPVPN_PREMIER_GOV1, $IPVPN_PREMIER_GLOBAL1, $IPVPN_PREMIER_INT1, $IPVPN_PREMIER_ENT1, $IPVPN_PREMIER_SME1, $TOTAL_IPVPN_PREMIER_RETURNED],
         ['DONE',  $IPVPN_VALUE_GOV, $IPVPN_VALUE_GLOBAL, $IPVPN_VALUE_INT, $IPVPN_VALUE_ENT, $IPVPN_VALUE_SME, $TOTAL_IPVPN_VALUE_DONE],
         ['RETURNED',  $IPVPN_VALUE_GOV1, $IPVPN_VALUE_GLOBAL1, $IPVPN_VALUE_INT1, $IPVPN_VALUE_ENT1, $IPVPN_VALUE_SME1, $TOTAL_IPVPN_VALUE_RETURNED],
         ['DONE',  $TMDIRECT_GOV, $TMDIRECT_GLOBAL, $TMDIRECT_INT, $TMDIRECT_ENT, $TMDIRECT_SME, $TOTAL_TMDIRECT_DONE],
         ['RETURNED',  $TMDIRECT_GOV1, $TMDIRECT_GLOBAL1, $TMDIRECT_INT1, $TMDIRECT_ENT1, $TMDIRECT_SME1, $TOTAL_TMDIRECT_RETURNED]
        ]);
        
        // Set chart options
        var options = {title:'',
         titleTextStyle: {fontName: 'Lato', fontSize: 15, bold: true},
                       height: 400,
                       is3D: true,
          //vAxes: {title: 'TOTAL'},
          vAxes: [
              {
                title:'TOTAL',
                textStyle: {color: 'black'} // Axis 0
              }, 
              {
                title:'GRAND TOTAL',
                textStyle: {color: 'black'} // Axis 1
              }
            ],
          hAxis: {title: 'IPVPN GLOBAL  |  IPVPN LITE  |  IPVPN PREMIER  |  IPVPN VALUE  |  TMDIRECT'},
          seriesType: 'bars',
          series: {5: {type: 'line', targetAxisIndex:1}}
         };
 
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ComboChart(document.getElementById('ACTIVITY_data'));
        chart.draw(data, options);
      }
 
      // Make the charts responsive
      jQuery(document).ready(function(){
        jQuery(window).resize(function(){
          drawChart();
        });
      });
 
    </script>
    <div id="ACTIVITY_data"></div>
DEF;
    echo $HTML2;
  
?>

<h3>Report #3: Monthly Handover Statistics</h3>

<?php
include '../../inc/CROCSLogin.php';

//Get Existing Year
    $sql1 = "SELECT DISTINCT EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) AS CDF_YEAR FROM CROCS_HO_MONTHLY_REP";
    $stid2 = oci_parse($cemdb, $sql1);
   	oci_execute($stid2);
    $list1 = '';
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            $yearCOUNT = strlen($row1["CDF_YEAR"]);
            if ($yearCOUNT == 4){
                $list1 = $list1.'<option value="'.$row1["CDF_YEAR"].'">'.$row1["CDF_YEAR"].'</option>';                
            }
            else
            {
                //Do Nothing
            }
        }
    }
 
 echo '<table align="center"><tr><td>
 Please select the year to populate the report:
 </td><td></td><td>
 <form action ="" method="POST">
 <select name="CROCS_YEAR" onchange="submit();">
 <option value="">SELECT YEAR HERE</option>'.$list1.'
 </select>
 </form>
 </td></tr></table>';

if(isset($_POST['CROCS_YEAR']))
{
$YEARset = $_POST['CROCS_YEAR'];
$overallJAN = 0;
$overallFEB = 0;
$overallMAC = 0;
$overallAPR = 0;
$overallMAY = 0;
$overallJUN = 0;
$overallJUL = 0;
$overallAUG = 0;
$overallSEP = 0;
$overallOCT = 0;
$overallNOV = 0;
$overallDEC = 0;
$overallALL = 0;
$donePercentJAN = 0;
$donePercentFEB = 0;
$donePercentMAC = 0;
$donePercentAPR = 0;
$donePercentMAY = 0;
$donePercentJUN = 0;
$donePercentJUL = 0;
$donePercentAUG = 0;
$donePercentSEP = 0;
$donePercentOCT = 0;
$donePercentNOV = 0;
$donePercentDEC = 0;
$donePercentALL = 0;
$returnedPercentJAN = 0;
$returnedPercentFEB = 0;
$returnedPercentMAC = 0;
$returnedPercentAPR = 0;
$returnedPercentMAY = 0;
$returnedPercentJUN = 0;
$returnedPercentJUL = 0;
$returnedPercentAUG = 0;
$returnedPercentSEP = 0;
$returnedPercentOCT = 0;
$returnedPercentNOV = 0;
$returnedPercentDEC = 0;
$returnedPercentALL = 0;

echo '<table border="1" align="center">
  <tr>
    <th style="background-color:#FFA500;">LINE OF BUSINESS</th>
    <th style="background-color:#FFA500;">JAN '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">FEB '.$YEARset.'</th>
    <th style="background-color:#FFA500;">MAC '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">APR '.$YEARset.'</th>
    <th style="background-color:#FFA500;">MAY '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">JUN '.$YEARset.'</th>
    <th style="background-color:#FFA500;">JUL '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">AUG '.$YEARset.'</th>
    <th style="background-color:#FFA500;">SEP '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">OCT '.$YEARset.'</th>
    <th style="background-color:#FFA500;">NOV '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">DEC '.$YEARset.'</th>
    <th style="background-color:#FFA500;">YTD ('.$YEARset.') TOTAL</th> 
  </tr>';
    echo "<tr>
        <td align='center'><b>GOVERNMENT</b></td>";   
      
    include 'GOVreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>GLOBAL</b></td>";
    
    include 'GLOBALreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>INTERNAL</b></td>";
    
    include 'INTERNALreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>ENTERPRISE</b></td>";
    
    include 'ENTERPRISEreport.php';
    
    echo "</tr><tr>
        <td align='center'><b>SME</b></td>";
        
    include 'SMEreport.php';
    
    echo '</tr><tr>
        <th style="background-color:#FFA500;" align="center">OVERALL</th>
        <td style="background-color:#FFFF33"; align="center">'.$overallJAN.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallFEB.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallMAC.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallAPR.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallMAY.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallJUN.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallJUL.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallAUG.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallSEP.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallOCT.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallNOV.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallDEC.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallALL.'</td>
        </tr>';
    
    echo '</tr><tr>
        <th align="center">DONE(%)</th>';
        
    include 'DONEreport.php';
    
    echo '</tr><tr>
        <th align="center">RETURNED(%)</th>';
    
    include 'RETURNEDreport.php';

    echo '</tr></table><br>';
}
else{
$YEARset = date("Y");
$overallJAN = 0;
$overallFEB = 0;
$overallMAC = 0;
$overallAPR = 0;
$overallMAY = 0;
$overallJUN = 0;
$overallJUL = 0;
$overallAUG = 0;
$overallSEP = 0;
$overallOCT = 0;
$overallNOV = 0;
$overallDEC = 0;
$overallALL = 0;
$donePercentJAN = 0;
$donePercentFEB = 0;
$donePercentMAC = 0;
$donePercentAPR = 0;
$donePercentMAY = 0;
$donePercentJUN = 0;
$donePercentJUL = 0;
$donePercentAUG = 0;
$donePercentSEP = 0;
$donePercentOCT = 0;
$donePercentNOV = 0;
$donePercentDEC = 0;
$donePercentALL = 0;
$returnedPercentJAN = 0;
$returnedPercentFEB = 0;
$returnedPercentMAC = 0;
$returnedPercentAPR = 0;
$returnedPercentMAY = 0;
$returnedPercentJUN = 0;
$returnedPercentJUL = 0;
$returnedPercentAUG = 0;
$returnedPercentSEP = 0;
$returnedPercentOCT = 0;
$returnedPercentNOV = 0;
$returnedPercentDEC = 0;
$returnedPercentALL = 0;

echo '<table border="1" align="center">
  <tr>
    <th style="background-color:#FFA500;">LINE OF BUSINESS</th>
    <th style="background-color:#FFA500;">JAN '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">FEB '.$YEARset.'</th>
    <th style="background-color:#FFA500;">MAC '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">APR '.$YEARset.'</th>
    <th style="background-color:#FFA500;">MAY '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">JUN '.$YEARset.'</th>
    <th style="background-color:#FFA500;">JUL '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">AUG '.$YEARset.'</th>
    <th style="background-color:#FFA500;">SEP '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">OCT '.$YEARset.'</th>
    <th style="background-color:#FFA500;">NOV '.$YEARset.'</th> 
    <th style="background-color:#FFA500;">DEC '.$YEARset.'</th>
    <th style="background-color:#FFA500;">YTD ('.$YEARset.') TOTAL</th> 
  </tr>';
    echo "<tr>
        <td align='center'><b>GOVERNMENT</b></td>";   
      
    include 'GOVreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>GLOBAL</b></td>";
    
    include 'GLOBALreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>INTERNAL</b></td>";
    
    include 'INTERNALreport.php';
      
    echo "</tr><tr>
        <td align='center'><b>ENTERPRISE</b></td>";
    
    include 'ENTERPRISEreport.php';
    
    echo "</tr><tr>
        <td align='center'><b>SME</b></td>";
        
    include 'SMEreport.php';
    
    echo '</tr><tr>
        <th style="background-color:#FFA500;" align="center">OVERALL</th>
        <td style="background-color:#FFFF33"; align="center">'.$overallJAN.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallFEB.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallMAC.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallAPR.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallMAY.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallJUN.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallJUL.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallAUG.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallSEP.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallOCT.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallNOV.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallDEC.'</td>
        <td style="background-color:#FFFF33"; align="center">'.$overallALL.'</td>
        </tr>';
    
    echo '</tr><tr>
        <th align="center">DONE(%)</th>';
        
    include 'DONEreport.php';
    
    echo '</tr><tr>
        <th align="center">RETURNED(%)</th>';
    
    include 'RETURNEDreport.php';

    echo '</tr></table><br>';
	
    /*echo '<table border="1">
  <tr>
    <th style="background-color:#FFA500;">LINE OF BUSINESS</th>
    <th style="background-color:#FFA500;">JANUARY</th> 
    <th style="background-color:#FFA500;">FEBRUARY</th>
    <th style="background-color:#FFA500;">MARCH</th> 
    <th style="background-color:#FFA500;">APRIL</th>
    <th style="background-color:#FFA500;">MAY</th> 
    <th style="background-color:#FFA500;">JUNE</th>
    <th style="background-color:#FFA500;">JULY</th> 
    <th style="background-color:#FFA500;">AUGUST</th>
    <th style="background-color:#FFA500;">SEPTEMBER</th> 
    <th style="background-color:#FFA500;">OCTOBER</th>
    <th style="background-color:#FFA500;">NOVEMBER</th> 
    <th style="background-color:#FFA500;">DECEMBER</th>
    <th style="background-color:#FFA500;">YTD TOTAL</th> 
  </tr>
  <tr>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td> 
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>';
  echo '</table><br>';*/
}  

//include 'getComboChart.php';

$HTML1 =<<<ABC
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
      // Load the Visualization API and the charts package.
      google.load('visualization', '1.0', {'packages':['corechart']});
 
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
 
      function drawChart() {
 
        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
         ['MONTH', 'GOVERNMENT', 'GLOBAL', 'INTERNAL', 'ENTERPRISE', 'SME', 'OVERALL', 'DONE(%)', 'RETURNED(%)'],
         ['JAN',  $totalGOVJAN, $totalGLOBALJAN, $totalINTJAN, $totalENTJAN, $totalSMEJAN, $overallJAN, $roundDoneJAN, $roundReturnedJAN],
         ['FEB',  $totalGOVFEB, $totalGLOBALFEB, $totalINTFEB, $totalENTFEB, $totalSMEFEB, $overallFEB, $roundDoneFEB, $roundReturnedFEB],
         ['MAC',  $totalGOVMAC, $totalGLOBALMAC, $totalINTMAC, $totalENTMAC, $totalSMEMAC, $overallMAC, $roundDoneMAC, $roundReturnedMAC],
         ['APR',  $totalGOVAPR, $totalGLOBALAPR, $totalINTAPR, $totalENTAPR, $totalSMEAPR, $overallAPR, $roundDoneAPR, $roundReturnedAPR],
         ['MAY',  $totalGOVMAY, $totalGLOBALMAY, $totalINTMAY, $totalENTMAY, $totalSMEMAY, $overallMAY, $roundDoneMAY, $roundReturnedMAY],
         ['JUN',  $totalGOVJUN, $totalGLOBALJUN, $totalINTJUN, $totalENTJUN, $totalSMEJUN, $overallJUN, $roundDoneJUN, $roundReturnedJUN],
         ['JUL',  $totalGOVJUL, $totalGLOBALJUL, $totalINTJUL, $totalENTJUL, $totalSMEJUL, $overallJUL, $roundDoneJUL, $roundReturnedJUL],
         ['AUG',  $totalGOVAUG, $totalGLOBALAUG, $totalINTAUG, $totalENTAUG, $totalSMEAUG, $overallAUG, $roundDoneAUG, $roundReturnedAUG],
         ['SEP',  $totalGOVSEP, $totalGLOBALSEP, $totalINTSEP, $totalENTSEP, $totalSMESEP, $overallSEP, $roundDoneSEP, $roundReturnedSEP],
         ['OCT',  $totalGOVOCT, $totalGLOBALOCT, $totalINTOCT, $totalENTOCT, $totalSMEOCT, $overallOCT, $roundDoneOCT, $roundReturnedOCT],
         ['NOV',  $totalGOVNOV, $totalGLOBALNOV, $totalINTNOV, $totalENTNOV, $totalSMENOV, $overallNOV, $roundDoneNOV, $roundReturnedNOV],
         ['DEC',  $totalGOVDEC, $totalGLOBALDEC, $totalINTDEC, $totalENTDEC, $totalSMEDEC, $overallDEC, $roundDoneDEC, $roundReturnedDEC],
         ['YTD',  $totalGOVALL, $totalGLOBALALL, $totalINTALL, $totalENTALL, $totalSMEALL, $overallALL, $roundDoneALL, $roundReturnedALL],
        ]);
 
        // Set chart options
        var options = {title:'',
         titleTextStyle: {fontName: 'Lato', fontSize: 15, bold: true},
                       height: 400,
                       is3D: true,
                       isStacked: true,
          //vAxis: {title: 'TOTAL'},
          vAxes: [
              {
                title:'TOTAL',
                textStyle: {color: 'black'} // Axis 0
              }, 
              {
                title:'PERCENTAGE',
                textStyle: {color: 'black'} // Axis 1
              }
            ],
          hAxis: {title: 'MONTH ($YEARset)'},
          seriesType: 'bars', 
          series: {5: {type: 'line'}, 6: {type: 'line', targetAxisIndex:1}, 7: {type: 'line', targetAxisIndex:1}}
         };
 
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ComboChart(document.getElementById('MONTHLY_data'));
        chart.draw(data, options);
      }
 
      // Make the charts responsive
      jQuery(document).ready(function(){
        jQuery(window).resize(function(){
          drawChart();
        });
      });
 
    </script>
    <div id="MONTHLY_data"></div>
ABC;
    echo $HTML1;
?>
</big>
</body>
</html>