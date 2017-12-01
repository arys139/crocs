<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." AND CROCS_LOB = 'SME' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $totalSMEJAN = 0;
    $totalSMEFEB = 0;
    $totalSMEMAC = 0;
    $totalSMEAPR = 0;
    $totalSMEMAY = 0;
    $totalSMEJUN = 0;
    $totalSMEJUL = 0;
    $totalSMEAUG = 0;
    $totalSMESEP = 0;
    $totalSMEOCT = 0;
    $totalSMENOV = 0;
    $totalSMEDEC = 0;
    $totalSMEALL = 0;
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalSMEJAN = $totalSMEJAN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalSMEFEB = $totalSMEFEB + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalSMEMAC = $totalSMEMAC + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalSMEAPR = $totalSMEAPR + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalSMEMAY = $totalSMEMAY + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalSMEJUN = $totalSMEJUN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalSMEJUL = $totalSMEJUL + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalSMEAUG = $totalSMEAUG + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalSMESEP = $totalSMESEP + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalSMEOCT = $totalSMEOCT + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalSMENOV = $totalSMENOV + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalSMEDEC = $totalSMEDEC + $row1['CROCS_COUNT'];
            }
            
        }
        $totalSMEALL = $totalSMEJAN + $totalSMEFEB + $totalSMEMAC + $totalSMEAPR + $totalSMEMAY + $totalSMEJUN + $totalSMEJUL + $totalSMEAUG + $totalSMESEP + $totalSMEOCT + $totalSMENOV + $totalSMEDEC;
        $overallJAN = $overallJAN + $totalSMEJAN;
        $overallFEB = $overallFEB + $totalSMEFEB;
        $overallMAC = $overallMAC + $totalSMEMAC;
        $overallAPR = $overallAPR + $totalSMEAPR;
        $overallMAY = $overallMAY + $totalSMEMAY;
        $overallJUN = $overallJUN + $totalSMEJUN;
        $overallJUL = $overallJUL + $totalSMEJUL;
        $overallAUG = $overallAUG + $totalSMEAUG;
        $overallSEP = $overallSEP + $totalSMESEP;
        $overallOCT = $overallOCT + $totalSMEOCT;
        $overallNOV = $overallNOV + $totalSMENOV;
        $overallDEC = $overallDEC + $totalSMEDEC;
        $overallALL = $overallALL + $totalSMEALL;
        
        if (strlen($totalSMEJAN) <> 0){
                echo "<td align='center'>".$totalSMEJAN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEFEB) <> 0){
                echo "<td align='center'>".$totalSMEFEB."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEMAC) <> 0){
                echo "<td align='center'>".$totalSMEMAC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEAPR) <> 0){
                echo "<td align='center'>".$totalSMEAPR."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEMAY) <> 0){
                echo "<td align='center'>".$totalSMEMAY."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEJUN) <> 0){
                echo "<td align='center'>".$totalSMEJUN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEJUL) <> 0){
                echo "<td align='center'>".$totalSMEJUL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEAUG) <> 0){
                echo "<td align='center'>".$totalSMEAUG."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMESEP) <> 0){
                echo "<td align='center'>".$totalSMESEP."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEOCT) <> 0){
                echo "<td align='center'>".$totalSMEOCT."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMENOV) <> 0){
                echo "<td align='center'>".$totalSMENOV."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEDEC) <> 0){
                echo "<td align='center'>".$totalSMEDEC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalSMEALL) <> 0){
                echo "<td align='center'>".$totalSMEALL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
    }

?>