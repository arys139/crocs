<?php
include '../../inc/CROCSLogin.php'; 

$sql = 'SELECT DISTINCT UPPER(CROCS_LOB) AS CROCS_LOB, COUNT(*) AS TOTAL FROM DATA_MAPPING_CROCS GROUP BY CROCS_LOB';
 
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
$totalCE = array();
 while (($row1 = oci_fetch_array($stid1)) != false) {
    //$totalCE[$row1['CROCS_LOB']] = $row1['TOTAL']; 
        $data=array($row1['CROCS_LOB']=>$row1['TOTAL']);
    }
    
    include("phpgraphlib/phpgraphlib.php");
    include("phpgraphlib/phpgraphlib_pie.php");
    $graph=new PHPGraphLibPie(450,280);
    //$data=array($totalCE);
    $graph->addData($data);
    $graph->setTitle("Department Sales Comparison");
    $graph->setLabelTextColor("blue");
    $graph->createGraph();


?>