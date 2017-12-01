<?php
include '../../inc/CROCSLogin.php';

$sql = "SELECT DISTINCT UPPER(CROCS_LOB) AS CROCS_LOB, COUNT(*) AS TOTAL FROM DATA_MAPPING_CROCS GROUP BY CROCS_LOB";
 
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

while (($row1 = oci_fetch_array($stid1)) != false) {
$pie_chart_data[] = array($row1['CROCS_LOB'], (int)$row1['TOTAL']);
}
//echo $pie_chart_data = json_encode($pie_chart_data);
?>