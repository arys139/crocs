<?php
include '../../inc/CROCSLogin.php';

//$sql = "SELECT CROCS_LOB, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = '".$YEARset."'" GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
$sql = "SELECT CROCS_LOB, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = '2015' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
 $stid1 = oci_parse($cemdb, $sql);
 $result = oci_execute($stid1);
 if (!$stid1) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else {
oci_define_by_name($stid1, 'CROCS_LOB', $CROCS_LOB); 	
oci_define_by_name($stid1, 'CROCS_HO_REMARKS', $CROCS_HO_REMARKS);
oci_define_by_name($stid1, 'CROCS_MONTH', $CROCS_MONTH); 	
oci_define_by_name($stid1, 'CROCS_COUNT', $CROCS_COUNT);
}

while (($row1 = oci_fetch_array($stid1)) != false) {
    $MONTH = date("F", mktime(0, 0, 0, $row1['CROCS_MONTH'], 10));
    //$MONTHLY_data[] = array($row1['CROCS_MONTH'], (int)$row1['CROCS_COUNT']);
    $MONTHLY_data[] = array($MONTH, (int)$row1['CROCS_COUNT']);
  }

$MONTHLY_data = json_encode($MONTHLY_data);
?>