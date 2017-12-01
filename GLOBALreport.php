<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." AND CROCS_LOB = 'GLOBAL' GROUP BY CROCS_LOB, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $totalGLOBALJAN = 0;
    $totalGLOBALFEB = 0;
    $totalGLOBALMAC = 0;
    $totalGLOBALAPR = 0;
    $totalGLOBALMAY = 0;
    $totalGLOBALJUN = 0;
    $totalGLOBALJUL = 0;
    $totalGLOBALAUG = 0;
    $totalGLOBALSEP = 0;
    $totalGLOBALOCT = 0;
    $totalGLOBALNOV = 0;
    $totalGLOBALDEC = 0;
    $totalGLOBALALL = 0;
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalGLOBALJAN = $totalGLOBALJAN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalGLOBALFEB = $totalGLOBALFEB + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalGLOBALMAC = $totalGLOBALMAC + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalGLOBALAPR = $totalGLOBALAPR + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalGLOBALMAY = $totalGLOBALMAY + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalGLOBALJUN = $totalGLOBALJUN + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalGLOBALJUL = $totalGLOBALJUL + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalGLOBALAUG = $totalGLOBALAUG + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalGLOBALSEP = $totalGLOBALSEP + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalGLOBALOCT = $totalGLOBALOCT + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalGLOBALNOV = $totalGLOBALNOV + $row1['CROCS_COUNT'];
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalGLOBALDEC = $totalGLOBALDEC + $row1['CROCS_COUNT'];
            }
            
        }
        $totalGLOBALALL = $totalGLOBALJAN + $totalGLOBALFEB + $totalGLOBALMAC + $totalGLOBALAPR + $totalGLOBALMAY + $totalGLOBALJUN + $totalGLOBALJUL + $totalGLOBALAUG + $totalGLOBALSEP + $totalGLOBALOCT + $totalGLOBALNOV + $totalGLOBALDEC;
        $overallJAN = $overallJAN + $totalGLOBALJAN;
        $overallFEB = $overallFEB + $totalGLOBALFEB;
        $overallMAC = $overallMAC + $totalGLOBALMAC;
        $overallAPR = $overallAPR + $totalGLOBALAPR;
        $overallMAY = $overallMAY + $totalGLOBALMAY;
        $overallJUN = $overallJUN + $totalGLOBALJUN;
        $overallJUL = $overallJUL + $totalGLOBALJUL;
        $overallAUG = $overallAUG + $totalGLOBALAUG;
        $overallSEP = $overallSEP + $totalGLOBALSEP;
        $overallOCT = $overallOCT + $totalGLOBALOCT;
        $overallNOV = $overallNOV + $totalGLOBALNOV;
        $overallDEC = $overallDEC + $totalGLOBALDEC;
        $overallALL = $overallALL + $totalGLOBALALL;
        
        if (strlen($totalGLOBALJAN) <> 0){
                echo "<td align='center'>".$totalGLOBALJAN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALFEB) <> 0){
                echo "<td align='center'>".$totalGLOBALFEB."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALMAC) <> 0){
                echo "<td align='center'>".$totalGLOBALMAC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALAPR) <> 0){
                echo "<td align='center'>".$totalGLOBALAPR."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALMAY) <> 0){
                echo "<td align='center'>".$totalGLOBALMAY."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALJUN) <> 0){
                echo "<td align='center'>".$totalGLOBALJUN."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALJUL) <> 0){
                echo "<td align='center'>".$totalGLOBALJUL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALAUG) <> 0){
                echo "<td align='center'>".$totalGLOBALAUG."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALSEP) <> 0){
                echo "<td align='center'>".$totalGLOBALSEP."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALOCT) <> 0){
                echo "<td align='center'>".$totalGLOBALOCT."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALNOV) <> 0){
                echo "<td align='center'>".$totalGLOBALNOV."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALDEC) <> 0){
                echo "<td align='center'>".$totalGLOBALDEC."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
        if (strlen($totalGLOBALALL) <> 0){
                echo "<td align='center'>".$totalGLOBALALL."</td>";
            }
        else{
                echo "<td align='center'>&nbsp</td>";
            }
    }

?>