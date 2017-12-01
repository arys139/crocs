<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." AND CROCS_LOB = 'ENTERPRISE' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $totalENTJAN = 0;
    $totalENTFEB = 0;
    $totalENTMAC = 0;
    $totalENTAPR = 0;
    $totalENTMAY = 0;
    $totalENTJUN = 0;
    $totalENTJUL = 0;
    $totalENTAUG = 0;
    $totalENTSEP = 0;
    $totalENTOCT = 0;
    $totalENTNOV = 0;
    $totalENTDEC = 0;
    $totalENTALL = 0;
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalENTJAN = $totalENTJAN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalENTFEB = $totalENTFEB + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalENTMAC = $totalENTMAC + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalENTAPR = $totalENTAPR + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalENTMAY = $totalENTMAY + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalENTJUN = $totalENTJUN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalENTJUL = $totalENTJUL + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalENTAUG = $totalENTAUG + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalENTSEP = $totalENTSEP + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalENTOCT = $totalENTOCT + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalENTNOV = $totalENTNOV + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalENTDEC = $totalENTDEC + $row1['CROCS_COUNT'];
            }
            
        }
        $totalENTALL = $totalENTJAN + $totalENTFEB + $totalENTMAC + $totalENTAPR + $totalENTMAY + $totalENTJUN + $totalENTJUL + $totalENTAUG + $totalENTSEP + $totalENTOCT + $totalENTNOV + $totalENTDEC;
        $overallJAN = $overallJAN + $totalENTJAN;
        $overallFEB = $overallFEB + $totalENTFEB;
        $overallMAC = $overallMAC + $totalENTMAC;
        $overallAPR = $overallAPR + $totalENTAPR;
        $overallMAY = $overallMAY + $totalENTMAY;
        $overallJUN = $overallJUN + $totalENTJUN;
        $overallJUL = $overallJUL + $totalENTJUL;
        $overallAUG = $overallAUG + $totalENTAUG;
        $overallSEP = $overallSEP + $totalENTSEP;
        $overallOCT = $overallOCT + $totalENTOCT;
        $overallNOV = $overallNOV + $totalENTNOV;
        $overallDEC = $overallDEC + $totalENTDEC;
        $overallALL = $overallALL + $totalENTALL;
        
        if (strlen($totalENTJAN) <> 0){
                echo "<td align='center'>".$totalENTJAN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTFEB) <> 0){
                echo "<td align='center'>".$totalENTFEB."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTMAC) <> 0){
                echo "<td align='center'>".$totalENTMAC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTAPR) <> 0){
                echo "<td align='center'>".$totalENTAPR."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTMAY) <> 0){
                echo "<td align='center'>".$totalENTMAY."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTJUN) <> 0){
                echo "<td align='center'>".$totalENTJUN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTJUL) <> 0){
                echo "<td align='center'>".$totalENTJUL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTAUG) <> 0){
                echo "<td align='center'>".$totalENTAUG."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTSEP) <> 0){
                echo "<td align='center'>".$totalENTSEP."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTOCT) <> 0){
                echo "<td align='center'>".$totalENTOCT."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTNOV) <> 0){
                echo "<td align='center'>".$totalENTNOV."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTDEC) <> 0){
                echo "<td align='center'>".$totalENTDEC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalENTALL) <> 0){
                echo "<td align='center'>".$totalENTALL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
    }

?>