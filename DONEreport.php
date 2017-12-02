<?php

    $sql1 = "SELECT CROCS_LOB, CROCS_HO_REMARKS, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT, EXTRACT(MONTH FROM CROCS_CDF_SIGN_OFF_DATE) AS CROCS_MONTH FROM CROCS_HO_MONTHLY_REP WHERE EXTRACT(YEAR FROM CROCS_CDF_SIGN_OFF_DATE) = ".$YEARset." GROUP BY CROCS_LOB, CROCS_HO_REMARKS, CROCS_CDF_SIGN_OFF_DATE, CROCS_COUNT";
    $stid2 = oci_parse($cemdb, $sql1);
    oci_execute($stid2);
    $doneJAN = 0;
    $doneFEB = 0;
    $doneMAC = 0;
    $doneAPR = 0;
    $doneMAY = 0;
    $doneJUN = 0;
    $doneJUL = 0;
    $doneAUG = 0;
    $doneSEP = 0;
    $doneOCT = 0;
    $doneNOV = 0;
    $doneDEC = 0;
    $doneALL = 0;
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
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneJAN = $doneJAN + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '2'){
                $totalFEB = $totalFEB + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneFEB = $doneFEB + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '3'){
                $totalMAC = $totalMAC + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneMAC = $doneMAC + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '4'){
                $totalAPR = $totalAPR + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneAPR = $doneAPR + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '5'){
                $totalMAY = $totalMAY + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneMAY = $doneMAY + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '6'){
                $totalJUN = $totalJUN + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneJUN = $doneJUN + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '7'){
                $totalJUL = $totalJUL + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneJUL = $doneJUL + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '8'){
                $totalAUG = $totalAUG + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneAUG = $doneAUG + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '9'){
                $totalSEP = $totalSEP + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneSEP = $doneSEP + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '10'){
                $totalOCT = $totalOCT + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneOCT = $doneOCT + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '11'){
                $totalNOV = $totalNOV + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneNOV = $doneNOV + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            else if ($row1['CROCS_MONTH'] == '12'){
                $totalDEC = $totalDEC + $row1['CROCS_COUNT'];
                if ($row1['CROCS_HO_REMARKS'] == 'DONE'){
                    $doneDEC = $doneDEC + $row1['CROCS_COUNT'];
                }
                else{
                    //Do Nothing
                }
            }
            
        }
        $totalALL = $totalJAN + $totalFEB + $totalMAC + $totalAPR + $totalMAY + $totalJUN + $totalJUL + $totalAUG + $totalSEP + $totalOCT + $totalNOV + $totalDEC;
        $doneALL = $doneJAN + $doneFEB + $doneMAC + $doneAPR + $doneMAY + $doneJUN + $doneJUL + $doneAUG + $doneSEP + $doneOCT + $doneNOV + $doneDEC;
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
        
        if (($doneJAN <> 0) && ($overallJAN <> 0)){
                $donePercentJAN = ($doneJAN/$overallJAN)*100;
                $roundDoneJAN = round($donePercentJAN, 2);
                echo "<td align='center'>".round($donePercentJAN, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneJAN = 0;
            }
        if (($doneFEB <> 0) && ($overallFEB <> 0)){
                $donePercentFEB = ($doneFEB/$overallFEB)*100;
                $roundDoneFEB = round($donePercentFEB, 2);
                echo "<td align='center'>".round($donePercentFEB, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneFEB = 0;
            }
        if (($doneMAC <> 0) && ($overallMAC <> 0)){
                $donePercentMAC = ($doneMAC/$overallMAC)*100;
                $roundDoneMAC = round($donePercentMAC, 2);
                echo "<td align='center'>".round($donePercentMAC, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneMAC = 0;
            }
        if (($doneAPR <> 0) && ($overallAPR <> 0)){
                $donePercentAPR = ($doneAPR/$overallAPR)*100;
                $roundDoneAPR = round($donePercentAPR, 2);
                echo "<td align='center'>".round($donePercentAPR, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneAPR = 0;
            }
        if (($doneMAY <> 0) && ($overallMAY <> 0)){
                $donePercentMAY = ($doneMAY/$overallMAY)*100;
                $roundDoneMAY = round($donePercentMAY, 2);
                echo "<td align='center'>".round($donePercentMAY, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneMAY = 0;
            }
        if (($doneJUN <> 0) && ($overallJUN <> 0)){
                $donePercentJUN = ($doneJUN/$overallJUN)*100;
                $roundDoneJUN = round($donePercentJUN, 2);
                echo "<td align='center'>".round($donePercentJUN, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneJUN = 0;
            }
        if (($doneJUL <> 0) && ($overallJUL <> 0)){
                $donePercentJUL = ($doneJUL/$overallJUL)*100;
                $roundDoneJUL = round($donePercentJUL, 2);
                echo "<td align='center'>".round($donePercentJUL, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneJUL = 0;
            }
        if (($doneAUG <> 0) && ($overallAUG <> 0)){
                $donePercentAUG = ($doneAUG/$overallAUG)*100;
                $roundDoneAUG = round($donePercentAUG, 2);
                echo "<td align='center'>".round($donePercentAUG, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneAUG = 0;
            }
        if (($doneSEP <> 0) && ($overallSEP <> 0)){
                $donePercentSEP = ($doneSEP/$overallSEP)*100;
                $roundDoneSEP = round($donePercentSEP, 2);
                echo "<td align='center'>".round($donePercentSEP, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneSEP = 0;
            }
        if (($doneOCT <> 0) && ($overallOCT <> 0)){
                $donePercentOCT = ($doneOCT/$overallOCT)*100;
                $roundDoneOCT = round($donePercentOCT, 2);
                echo "<td align='center'>".round($donePercentOCT, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneOCT = 0;
            }
        if (($doneNOV <> 0) && ($overallNOV <> 0)){
                $donePercentNOV = ($doneNOV/$overallNOV)*100;
                $roundDoneNOV = round($donePercentNOV, 2);
                echo "<td align='center'>".round($donePercentNOV, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneNOV = 0;
            }
        if (($doneDEC <> 0) && ($overallDEC <> 0)){
                $donePercentDEC = ($doneDEC/$overallDEC)*100;
                $roundDoneDEC = round($donePercentDEC, 2);
                echo "<td align='center'>".round($donePercentDEC, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneDEC = 0;
            }
   
         if (($doneALL <> 0) && ($overallALL <> 0)){
                $donePercentALL = ($doneALL/$overallALL)*100;
                $roundDoneALL = round($donePercentALL, 2);
                echo "<td align='center'>".round($donePercentALL, 2)."</td>";
            }
        else{
                echo "<td align='center'>0</td>";
                $roundDoneALL = 0;
            }
    }

?>