<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." AND CROCS_LOB = 'INTERNAL' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $totalINTJAN = 0;
    $totalINTFEB = 0;
    $totalINTMAC = 0;
    $totalINTAPR = 0;
    $totalINTMAY = 0;
    $totalINTJUN = 0;
    $totalINTJUL = 0;
    $totalINTAUG = 0;
    $totalINTSEP = 0;
    $totalINTOCT = 0;
    $totalINTNOV = 0;
    $totalINTDEC = 0;
    $totalINTALL = 0;
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalINTJAN = $totalINTJAN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalINTFEB = $totalINTFEB + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalINTMAC = $totalINTMAC + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalINTAPR = $totalINTAPR + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalINTMAY = $totalINTMAY + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalINTJUN = $totalINTJUN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalINTJUL = $totalINTJUL + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalINTAUG = $totalINTAUG + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalINTSEP = $totalINTSEP + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalINTOCT = $totalINTOCT + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalINTNOV = $totalINTNOV + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalINTDEC = $totalINTDEC + $row1['CROCS_COUNT'];
            }
            
        }
        $totalINTALL = $totalINTJAN + $totalINTFEB + $totalINTMAC + $totalINTAPR + $totalINTMAY + $totalINTJUN + $totalINTJUL + $totalINTAUG + $totalINTSEP + $totalINTOCT + $totalINTNOV + $totalINTDEC;
        $overallJAN = $overallJAN + $totalINTJAN;
        $overallFEB = $overallFEB + $totalINTFEB;
        $overallMAC = $overallMAC + $totalINTMAC;
        $overallAPR = $overallAPR + $totalINTAPR;
        $overallMAY = $overallMAY + $totalINTMAY;
        $overallJUN = $overallJUN + $totalINTJUN;
        $overallJUL = $overallJUL + $totalINTJUL;
        $overallAUG = $overallAUG + $totalINTAUG;
        $overallSEP = $overallSEP + $totalINTSEP;
        $overallOCT = $overallOCT + $totalINTOCT;
        $overallNOV = $overallNOV + $totalINTNOV;
        $overallDEC = $overallDEC + $totalINTDEC;
        $overallALL = $overallALL + $totalINTALL;
        
        if (strlen($totalINTJAN) <> 0){
                echo "<td align='center'>".$totalINTJAN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTFEB) <> 0){
                echo "<td align='center'>".$totalINTFEB."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTMAC) <> 0){
                echo "<td align='center'>".$totalINTMAC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTAPR) <> 0){
                echo "<td align='center'>".$totalINTAPR."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTMAY) <> 0){
                echo "<td align='center'>".$totalINTMAY."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTJUN) <> 0){
                echo "<td align='center'>".$totalINTJUN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTJUL) <> 0){
                echo "<td align='center'>".$totalINTJUL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTAUG) <> 0){
                echo "<td align='center'>".$totalINTAUG."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTSEP) <> 0){
                echo "<td align='center'>".$totalINTSEP."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTOCT) <> 0){
                echo "<td align='center'>".$totalINTOCT."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTNOV) <> 0){
                echo "<td align='center'>".$totalINTNOV."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTDEC) <> 0){
                echo "<td align='center'>".$totalINTDEC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalINTALL) <> 0){
                echo "<td align='center'>".$totalINTALL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
    }

?>