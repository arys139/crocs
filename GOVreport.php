<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." AND CROCS_LOB = 'GOVERNMENT' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $totalGOVJAN = 0;
    $totalGOVFEB = 0;
    $totalGOVMAC = 0;
    $totalGOVAPR = 0;
    $totalGOVMAY = 0;
    $totalGOVJUN = 0;
    $totalGOVJUL = 0;
    $totalGOVAUG = 0;
    $totalGOVSEP = 0;
    $totalGOVOCT = 0;
    $totalGOVNOV = 0;
    $totalGOVDEC = 0;
    $totalGOVALL = 0;
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalGOVJAN = $totalGOVJAN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalGOVFEB = $totalGOVFEB + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalGOVMAC = $totalGOVMAC + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalGOVAPR = $totalGOVAPR + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalGOVMAY = $totalGOVMAY + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalGOVJUN = $totalGOVJUN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalGOVJUL = $totalGOVJUL + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalGOVAUG = $totalGOVAUG + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalGOVSEP = $totalGOVSEP + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalGOVOCT = $totalGOVOCT + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalGOVNOV = $totalGOVNOV + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalGOVDEC = $totalGOVDEC + $row1['CROCS_COUNT'];
            }
            
        }
        $totalGOVALL = $totalGOVJAN + $totalGOVFEB + $totalGOVMAC + $totalGOVAPR + $totalGOVMAY + $totalGOVJUN + $totalGOVJUL + $totalGOVAUG + $totalGOVSEP + $totalGOVOCT + $totalGOVNOV + $totalGOVDEC;
        $overallJAN = $overallJAN + $totalGOVJAN;
        $overallFEB = $overallFEB + $totalGOVFEB;
        $overallMAC = $overallMAC + $totalGOVMAC;
        $overallAPR = $overallAPR + $totalGOVAPR;
        $overallMAY = $overallMAY + $totalGOVMAY;
        $overallJUN = $overallJUN + $totalGOVJUN;
        $overallJUL = $overallJUL + $totalGOVJUL;
        $overallAUG = $overallAUG + $totalGOVAUG;
        $overallSEP = $overallSEP + $totalGOVSEP;
        $overallOCT = $overallOCT + $totalGOVOCT;
        $overallNOV = $overallNOV + $totalGOVNOV;
        $overallDEC = $overallDEC + $totalGOVDEC;
        $overallALL = $overallALL + $totalGOVALL;
        
        if (strlen($totalGOVJAN) <> 0){
                echo "<td align='center'>".$totalGOVJAN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVFEB) <> 0){
                echo "<td align='center'>".$totalGOVFEB."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVMAC) <> 0){
                echo "<td align='center'>".$totalGOVMAC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVAPR) <> 0){
                echo "<td align='center'>".$totalGOVAPR."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVMAY) <> 0){
                echo "<td align='center'>".$totalGOVMAY."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVJUN) <> 0){
                echo "<td align='center'>".$totalGOVJUN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVJUL) <> 0){
                echo "<td align='center'>".$totalGOVJUL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVAUG) <> 0){
                echo "<td align='center'>".$totalGOVAUG."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVSEP) <> 0){
                echo "<td align='center'>".$totalGOVSEP."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVOCT) <> 0){
                echo "<td align='center'>".$totalGOVOCT."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVNOV) <> 0){
                echo "<td align='center'>".$totalGOVNOV."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVDEC) <> 0){
                echo "<td align='center'>".$totalGOVDEC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGOVALL) <> 0){
                echo "<td align='center'>".$totalGOVALL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
    }

?>