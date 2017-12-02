<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_HO_REMARKS, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." GROUP BY CROCS_LOB, CROCS_HO_REMARKS, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $returnedJAN = 0;
    $returnedFEB = 0;
    $returnedMAC = 0;
    $returnedAPR = 0;
    $returnedMAY = 0;
    $returnedJUN = 0;
    $returnedJUL = 0;
    $returnedAUG = 0;
    $returnedSEP = 0;
    $returnedOCT = 0;
    $returnedNOV = 0;
    $returnedDEC = 0;
    $returnedALL = 0;
    $totalJAN = 0;
    $totalFEB = 0;
    $totalMAC = 0;
    $totalAPR = 0;
    $totalMAY = 0;
    $totalJUN = 0;
    $totalJUL = 0;
    $totalAUG = 0;
    $totalSEP = 0;
    $totalOCT = 0;
    $totalNOV = 0;
    $totalDEC = 0;
    $totalALL = 0;
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
    if (!$stid2) {
       echo 'DB Error, could not query the database<br>';
       exit;
    }
    else {
        while (($row1 = oci_fetch_array($stid2)) != false) {
            if ($row1['CROCS_MONTH'] == '1'){
                $totalJAN = $totalJAN + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedJAN = $returnedJAN + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalFEB = $totalFEB + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedFEB = $returnedFEB + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalMAC = $totalMAC + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedMAC = $returnedMAC + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalAPR = $totalAPR + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedAPR = $returnedAPR + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalMAY = $totalMAY + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedMAY = $returnedMAY + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalJUN = $totalJUN + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedJUN = $returnedJUN + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalJUL = $totalJUL + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedJUL = $returnedJUL + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalAUG = $totalAUG + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedAUG = $returnedAUG + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalSEP = $totalSEP + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedSEP = $returnedSEP + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalOCT = $totalOCT + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedOCT = $returnedOCT + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalNOV = $totalNOV + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedNOV = $returnedNOV + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalDEC = $totalDEC + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'RETURNED'){
                    $returnedDEC = $returnedDEC + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            
        }
        $totalALL = $totalJAN + $totalFEB + $totalMAC + $totalAPR + $totalMAY + $totalJUN + $totalJUL + $totalAUG + $totalSEP + $totalOCT + $totalNOV + $totalDEC;
        $returnedALL = $returnedJAN + $returnedFEB + $returnedMAC + $returnedAPR + $returnedMAY + $returnedJUN + $returnedJUL + $returnedAUG + $returnedSEP + $returnedOCT + $returnedNOV + $returnedDEC;
        $overallJAN = $overallJAN + $totalJAN;
        $overallFEB = $overallFEB + $totalFEB;
        $overallMAC = $overallMAC + $totalMAC;
        $overallAPR = $overallAPR + $totalAPR;
        $overallMAY = $overallMAY + $totalMAY;
        $overallJUN = $overallJUN + $totalJUN;
        $overallJUL = $overallJUL + $totalJUL;
        $overallAUG = $overallAUG + $totalAUG;
        $overallSEP = $overallSEP + $totalSEP;
        $overallOCT = $overallOCT + $totalOCT;
        $overallNOV = $overallNOV + $totalNOV;
        $overallDEC = $overallDEC + $totalDEC;
        $overallALL = $overallALL + $totalALL;
        
        if (($returnedJAN <> 0) && ($overallJAN <> 0)){
                $returnedPercentJAN = ($returnedJAN/$overallJAN)*100;
                $roundReturnedJAN = round($returnedPercentJAN, 2);
                echo "<td align='center'>".round($returnedPercentJAN, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedJAN = 0;
            }
        if (($returnedFEB <> 0) && ($overallFEB <> 0)){
                $returnedPercentFEB = ($returnedFEB/$overallFEB)*100;
                $roundReturnedFEB = round($returnedPercentFEB, 2);
                echo "<td align='center'>".round($returnedPercentFEB, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedFEB = 0;
            }
        if (($returnedMAC <> 0) && ($overallMAC <> 0)){
                $returnedPercentMAC = ($returnedMAC/$overallMAC)*100;
                $roundReturnedMAC = round($returnedPercentMAC, 2);
                echo "<td align='center'>".round($returnedPercentMAC, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedMAC = 0;
            }
        if (($returnedAPR <> 0) && ($overallAPR <> 0)){
                $returnedPercentAPR = ($returnedAPR/$overallAPR)*100;
                $roundReturnedAPR = round($returnedPercentAPR, 2);
                echo "<td align='center'>".round($returnedPercentAPR, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedAPR = 0;
            }
        if (($returnedMAY <> 0) && ($overallMAY <> 0)){
                $returnedPercentMAY = ($returnedMAY/$overallMAY)*100;
                $roundReturnedMAY = round($returnedPercentMAY, 2);
                echo "<td align='center'>".round($returnedPercentMAY, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedMAY = 0;
            }
        if (($returnedJUN <> 0) && ($overallJUN <> 0)){
                $returnedPercentJUN = ($returnedJUN/$overallJUN)*100;
                $roundReturnedJUN = round($returnedPercentJUN, 2);
                echo "<td align='center'>".round($returnedPercentJUN, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedJUN = 0;
            }
        if (($returnedJUL <> 0) && ($overallJUL <> 0)){
                $returnedPercentJUL = ($returnedJUL/$overallJUL)*100;
                $roundReturnedJUL = round($returnedPercentJUL, 2);
                echo "<td align='center'>".round($returnedPercentJUL, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedJUL = 0;
            }
        if (($returnedAUG <> 0) && ($overallAUG <> 0)){
                $returnedPercentAUG = ($returnedAUG/$overallAUG)*100;
                $roundReturnedAUG = round($returnedPercentAUG, 2);
                echo "<td align='center'>".round($returnedPercentAUG, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedAUG = 0;
            }
        if (($returnedSEP <> 0) && ($overallSEP <> 0)){
                $returnedPercentSEP = ($returnedSEP/$overallSEP)*100;
                $roundReturnedSEP = round($returnedPercentSEP, 2);
                echo "<td align='center'>".round($returnedPercentSEP, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedSEP = 0;
            }
        if (($returnedOCT <> 0) && ($overallOCT <> 0)){
                $returnedPercentOCT = ($returnedOCT/$overallOCT)*100;
                $roundReturnedOCT = round($returnedPercentOCT, 2);
                echo "<td align='center'>".round($returnedPercentOCT, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedOCT = 0;
            }
        if (($returnedNOV <> 0) && ($overallNOV <> 0)){
                $returnedPercentNOV = ($returnedNOV/$overallNOV)*100;
                $roundReturnedNOV = round($returnedPercentNOV, 2);
                echo "<td align='center'>".round($returnedPercentNOV, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedNOV = 0;
            }
        if (($returnedDEC <> 0) && ($overallDEC <> 0)){
                $returnedPercentDEC = ($returnedDEC/$overallDEC)*100;
                $roundReturnedDEC = round($returnedPercentDEC, 2);
                echo "<td align='center'>".round($returnedPercentDEC, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedDEC = 0;
            }
   
         if (($returnedALL <> 0) && ($overallALL <> 0)){
                $returnedPercentALL = ($returnedALL/$overallALL)*100;
                $roundReturnedALL = round($returnedPercentALL, 2);
                echo "<td align='center'>".round($returnedPercentALL, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundReturnedALL = 0;
            }
    }

?>